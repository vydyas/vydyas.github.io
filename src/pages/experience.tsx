import React from 'react';
import Layout from '@theme/Layout';
import Header from '@site/src/components/Header';
import RouteTransition from '@site/src/components/RouteTransition';
import { motion } from 'framer-motion';
import styles from './pages.module.css';

const experiences = [
  {
    company: 'Salesforce',
    favicon: 'https://www.salesforce.com/favicon.ico',
    role: 'Senior Software Engineer',
    period: '2020 - Present',
    description: 'Leading frontend development for the Lightning Design System team.',
    achievements: [
      'Building and maintaining Lightning Web Components framework',
      'Improving component library performance and accessibility',
      'Mentoring junior developers and conducting technical interviews',
      'Contributing to design system documentation and best practices'
    ]
  },
  {
    company: 'SimpleResume',
    role: 'Founder & Developer',
    period: '2023 - Present',
    description: 'Building an AI-powered resume builder platform.',
    achievements: [
      'Developed the entire platform from scratch using Next.js and AI',
      'Implemented real-time resume editing and preview',
      'Created AI-powered content suggestions and formatting',
      'Optimized performance and user experience'
    ]
  },
  {
    company: 'Microsoft',
    favicon: 'https://www.microsoft.com/favicon.ico',
    role: 'Software Engineer II',
    period: '2018 - 2020',
    description: 'Worked on Azure Portal team, developing cloud management interfaces.',
    achievements: [
      'Developed real-time monitoring dashboard used by 100k+ users',
      'Reduced page load time by 60% through code optimization',
      'Implemented automated testing reducing bugs by 45%',
      'Collaborated with UX team for accessibility improvements'
    ]
  },
  {
    company: 'Amazon',
    role: 'Frontend Developer',
    period: '2016 - 2018',
    description: 'Part of the Amazon Prime Video team, working on streaming platform UI.',
    achievements: [
      'Built new video player controls increasing user engagement by 25%',
      'Implemented responsive design for multiple devices',
      'Created reusable component library used across teams',
      'Optimized video loading performance reducing buffer time'
    ]
  },
  {
    company: 'Google',
    role: 'Software Engineer Intern',
    period: '2015 - 2016',
    description: 'Internship with the Chrome DevTools team.',
    achievements: [
      'Developed new debugging features for Chrome DevTools',
      'Created documentation for new API implementations',
      'Contributed to open source projects in Chrome ecosystem',
      'Received full-time offer after successful internship'
    ]
  }
];

const container = {
  hidden: { opacity: 0 },
  show: {
    opacity: 1,
    transition: {
      staggerChildren: 0.2
    }
  }
};

const item = {
  hidden: { opacity: 0, x: -50 },
  show: { opacity: 1, x: 0 }
};

const ExperienceCard = ({ experience, index }) => (
  <motion.div 
    className={`${styles.timelineItem} ${index % 2 === 1 ? styles.timelineRight : ''}`}
    variants={item}
  >
    <div className={styles.timelineDot}>
      <span className={styles.dot}></span>
      <span className={styles.line}></span>
    </div>
    <motion.div 
      className={styles.timelineContent}
      whileHover={{ x: index % 2 === 1 ? -10 : 10 }}
      transition={{ type: "spring", stiffness: 300 }}
    >
      <div className={styles.timelineHeader}>
        <motion.h2 
          className={styles.companyName}
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ delay: 0.2 * index }}
        >
          {experience.favicon && (
            <img 
              src={experience.favicon} 
              alt={`${experience.company} logo`} 
              className={styles.companyFavicon}
              onError={(e) => e.currentTarget.style.display = 'none'}
            />
          )}
          {experience.company}
        </motion.h2>
        <motion.span 
          className={styles.period}
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ delay: 0.3 * index }}
        >
          {experience.period}
        </motion.span>
      </div>
      <motion.h3 
        className={styles.role}
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ delay: 0.4 * index }}
      >
        {experience.role}
      </motion.h3>
      <motion.p 
        className={styles.description}
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ delay: 0.5 * index }}
      >
        {experience.description}
      </motion.p>
      <motion.ul 
        className={styles.achievements}
        initial="hidden"
        animate="show"
        variants={{
          hidden: { opacity: 0 },
          show: {
            opacity: 1,
            transition: {
              staggerChildren: 0.1,
              delayChildren: 0.6 * index
            }
          }
        }}
      >
        {experience.achievements.map((achievement, i) => (
          <motion.li 
            key={i}
            variants={{
              hidden: { opacity: 0, x: -20 },
              show: { opacity: 1, x: 0 }
            }}
          >
            {achievement}
          </motion.li>
        ))}
      </motion.ul>
    </motion.div>
  </motion.div>
);

export default function Experience(): JSX.Element {
  return (
    <Layout
      title="Experience | Siddhu Vydyabhushana"
      description="Work experience and career journey">
      <Header />
      <RouteTransition>
        <main className={styles.mainContainer}>
          <motion.div 
            className={styles.timelineContainer}
            variants={container}
            initial="hidden"
            animate="show"
          >
            {experiences.map((exp, idx) => (
              <ExperienceCard key={idx} experience={exp} index={idx} />
            ))}
          </motion.div>
        </main>
      </RouteTransition>
    </Layout>
  );
} 