import React, { useEffect, useState } from 'react';
import styles from './styles.module.css';

type ContributionDay = {
  date: string;
  count: number;
  level: 0 | 1 | 2 | 3 | 4;
  isPrivate?: boolean;
};

type GitHubResponse = {
  total: string;
  private: string;
  contributions: Array<{
    date: string;
    count: string;
    color: string;
    isPrivate?: boolean;
  }>;
};

export default function GitHubGraph() {
  const [data, setData] = useState<{
    total: number,
    private: number,
    contributions: ContributionDay[]
  } | null>(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchContributions = async () => {
      try {
        const response = await fetch('https://github-contributions-api.jogruber.de/v4/vydyas?y=last&private=true');
        const jsonData: GitHubResponse = await response.json();
        
        if (jsonData && Array.isArray(jsonData.contributions)) {
          const processedData = {
            total: parseInt(jsonData.total) || 0,
            private: parseInt(jsonData.private) || 0,
            contributions: jsonData.contributions.map(day => ({
              date: day.date,
              count: parseInt(day.count) || 0,
              level: calculateLevel(parseInt(day.count) || 0),
              isPrivate: day.isPrivate
            }))
          };
          setData(processedData);
        }
      } catch (error) {
        console.error('Error fetching GitHub contributions:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchContributions();
  }, []);

  const calculateLevel = (count: number): 0 | 1 | 2 | 3 | 4 => {
    if (count === 0) return 0;
    if (count <= 3) return 1;
    if (count <= 6) return 2;
    if (count <= 9) return 3;
    return 4;
  };

  const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
      weekday: 'short',
      year: 'numeric',
      month: 'short',
      day: 'numeric'
    });
  };

  if (loading) {
    return (
      <div className={styles.loading}>
        <div className={styles.loadingPulse} />
      </div>
    );
  }

  if (!data || !data.contributions.length) {
    return null;
  }

  const groupByMonth = () => {
    if (!data) return [];
    
    const months = Array(12).fill(null).map(() => []);
    const contributions = [...data.contributions];

    contributions.forEach((day) => {
      if (day.date) {
        const date = new Date(day.date);
        const month = date.getMonth();
        months[month].push(day);
      }
    });

    // Pad each month's contributions to complete weeks
    months.forEach((month, index) => {
      const firstDay = month[0] ? new Date(month[0].date).getDay() : 0;
      
      // Add padding at start of month
      for (let i = 0; i < firstDay; i++) {
        month.unshift({ date: '', count: 0, level: 0 });
      }

      // Add padding at end of month to complete the week
      while (month.length % 7 !== 0) {
        month.push({ date: '', count: 0, level: 0 });
      }
    });

    return months;
  };

  return (
    <div className={styles.container}>
      <div className={styles.header}>
        <h2 className={styles.title}>GitHub Contributions</h2>
        <div className={styles.stats}>
          <span>
            {data.total.toLocaleString()} total contributions 
            {data.private > 0 && (
              <span className={styles.privateStats}>
                • {data.private.toLocaleString()} private
              </span>
            )}
          </span>
        </div>
      </div>
      <div className={styles.graphWrapper}>
        <div className={styles.monthLabels}>
          {['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'].map(month => (
            <span key={month}>{month}</span>
          ))}
        </div>
        <div className={styles.graph}>
          <div className={styles.weekLabels}>
            <span>Mon</span>
            <span>Wed</span>
            <span>Fri</span>
          </div>
          <div className={styles.days}>
            {groupByMonth().map((month, monthIndex) => (
              <div key={monthIndex} className={styles.monthGroup}>
                {getWeeksForMonth(month).map((week, weekIndex) => (
                  <div key={`${monthIndex}-${weekIndex}`} className={styles.week}>
                    {week.map((day, dayIndex) => (
                      <div
                        key={`${monthIndex}-${weekIndex}-${dayIndex}`}
                        className={styles.day}
                        data-level={day.level}
                        data-tooltip={day.date ? `${day.count} contributions on ${formatDate(day.date)}` : 'No contributions'}
                      />
                    ))}
                  </div>
                ))}
              </div>
            ))}
          </div>
        </div>
        <div className={styles.legend}>
          <span>Less</span>
          <div className={styles.legendItems}>
            {[0, 1, 2, 3, 4].map(level => (
              <div key={level} className={styles.day} data-level={level} />
            ))}
          </div>
          <span>More</span>
        </div>
      </div>
    </div>
  );
}

function getWeeksForMonth(days: ContributionDay[]) {
  const weeks = [];
  for (let i = 0; i < days.length; i += 7) {
    weeks.push(days.slice(i, i + 7));
  }
  return weeks;
} 