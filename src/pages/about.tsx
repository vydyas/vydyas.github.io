import React from 'react';
import Layout from '@theme/Layout';
import Header from '@site/src/components/Header';
import RouteTransition from '@site/src/components/RouteTransition';
import { motion } from 'framer-motion';
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
            <motion.section 
              className={styles.introSection}
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.5 }}
            >
              <h1 className={styles.aboutTitle}>About Me</h1>
              <div className={styles.aboutContent}>
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
            </motion.section>

            <motion.section 
              className={styles.skillsSection}
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.5, delay: 0.2 }}
            >
              <h2>Skills & Expertise</h2>
              <div className={styles.skillsGrid}>
                {Object.entries(skills).map(([category, items], idx) => (
                  <motion.div 
                    key={category} 
                    className={styles.skillCategory}
                    initial={{ opacity: 0, x: -20 }}
                    animate={{ opacity: 1, x: 0 }}
                    transition={{ delay: 0.1 * idx + 0.3 }}
                  >
                    <h3>{category.charAt(0).toUpperCase() + category.slice(1)}</h3>
                    <ul>
                      {items.map((skill, i) => (
                        <motion.li 
                          key={skill}
                          initial={{ opacity: 0 }}
                          animate={{ opacity: 1 }}
                          transition={{ delay: 0.05 * i + 0.1 * idx + 0.4 }}
                        >
                          {skill}
                        </motion.li>
                      ))}
                    </ul>
                  </motion.div>
                ))}
              </div>
            </motion.section>

            <motion.section 
              className={styles.interestsSection}
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.5, delay: 0.4 }}
            >
              <h2>Interests & Focus Areas</h2>
              <div className={styles.interestsGrid}>
                {interests.map((interest, idx) => (
                  <motion.div 
                    key={idx} 
                    className={styles.interestCard}
                    initial={{ opacity: 0, scale: 0.95 }}
                    animate={{ opacity: 1, scale: 1 }}
                    transition={{ delay: 0.1 * idx + 0.5 }}
                    whileHover={{ y: -5 }}
                  >
                    <span className={styles.interestIcon}>{interest.icon}</span>
                    <h3>{interest.title}</h3>
                    <p>{interest.description}</p>
                  </motion.div>
                ))}
              </div>
            </motion.section>
          </div>
        </main>
      </RouteTransition>
    </Layout>
  );
} 