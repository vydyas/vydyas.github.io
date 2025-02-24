import React from 'react';
import Layout from '@theme/Layout';
import Header from '@site/src/components/Header';
import RouteTransition from '@site/src/components/RouteTransition';
import styles from './pages.module.css';

const skills = {
  frontend: ['React', 'TypeScript', 'Next.js', 'CSS/SASS', 'Redux', 'GraphQL'],
  backend: ['Node.js', 'Express', 'MongoDB', 'PostgreSQL', 'REST APIs', 'AWS'],
  tools: ['Git', 'Docker', 'Webpack', 'Jest', 'CI/CD', 'Agile/Scrum']
};

const interests = [
  {
    title: 'Open Source',
    description: 'Contributing to and maintaining open source projects that help the developer community.',
    icon: '🌟'
  },
  {
    title: 'Web Performance',
    description: 'Optimizing web applications for speed, accessibility, and user experience.',
    icon: '⚡'
  },
  {
    title: 'Teaching',
    description: 'Mentoring junior developers and sharing knowledge through technical writing.',
    icon: '📚'
  }
];

export default function About(): JSX.Element {
  return (
    <Layout
      title="About | Siddhu Vydyabhushana"
      description="About me - Software Engineer and Frontend Developer">
      <Header />
      <RouteTransition>
        <main className={styles.mainContainer}>
          <div className={styles.aboutWrapper}>
            <section className={styles.aboutHero}>
              <div className={styles.aboutImage}>
                <img src="/img/profile.jpg" alt="Siddhu Vydyabhushana" />
              </div>
              <div className={styles.aboutContent}>
                <h5 className={styles.aboutTitle}>About Me</h5>
                <p className={styles.aboutDescription}>
                  Hi! I'm a Senior Software Engineer with over 8 years of experience in building scalable web applications. 
                  Currently working at Salesforce, where I focus on creating enterprise-level UI components and improving developer experience.
                </p>
                <p className={styles.aboutDescription}>
                  I'm passionate about creating intuitive user interfaces and writing clean, maintainable code. 
                  When I'm not coding, you'll find me contributing to open source projects, writing technical articles, 
                  or exploring new technologies.
                </p>
              </div>
            </section>

            <section className={styles.skillsSection}>
              <h2>Skills & Expertise</h2>
              <div className={styles.skillsGrid}>
                <div className={styles.skillCategory}>
                  <h3>Frontend</h3>
                  <ul>
                    {skills.frontend.map(skill => (
                      <li key={skill}>{skill}</li>
                    ))}
                  </ul>
                </div>
                <div className={styles.skillCategory}>
                  <h3>Backend</h3>
                  <ul>
                    {skills.backend.map(skill => (
                      <li key={skill}>{skill}</li>
                    ))}
                  </ul>
                </div>
                <div className={styles.skillCategory}>
                  <h3>Tools & Practices</h3>
                  <ul>
                    {skills.tools.map(skill => (
                      <li key={skill}>{skill}</li>
                    ))}
                  </ul>
                </div>
              </div>
            </section>

            <section className={styles.interestsSection}>
              <h2>Interests & Focus Areas</h2>
              <div className={styles.interestsGrid}>
                {interests.map((interest, idx) => (
                  <div key={idx} className={styles.interestCard}>
                    <span className={styles.interestIcon}>{interest.icon}</span>
                    <h3>{interest.title}</h3>
                    <p>{interest.description}</p>
                  </div>
                ))}
              </div>
            </section>

            <section className={styles.valuesSection}>
              <h2>Values & Approach</h2>
              <div className={styles.valuesList}>
                <div className={styles.valueItem}>
                  <h3>User-Centric Design</h3>
                  <p>Building products that solve real problems and provide excellent user experiences.</p>
                </div>
                <div className={styles.valueItem}>
                  <h3>Code Quality</h3>
                  <p>Writing clean, maintainable, and well-tested code that stands the test of time.</p>
                </div>
                <div className={styles.valueItem}>
                  <h3>Continuous Learning</h3>
                  <p>Staying updated with the latest technologies and best practices in web development.</p>
                </div>
              </div>
            </section>
          </div>
        </main>
      </RouteTransition>
    </Layout>
  );
} 