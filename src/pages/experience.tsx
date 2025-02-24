import React from 'react';
import Layout from '@theme/Layout';
import Header from '@site/src/components/Header';
import RouteTransition from '@site/src/components/RouteTransition';
import { motion } from 'framer-motion';
import styles from './pages.module.css';

const experiences = [
  {
    company: 'Salesforce',
    role: 'Senior Software Engineer',
    period: '2020 - Present',
    description: 'Leading frontend development for the Lightning Design System team, focusing on building scalable and accessible UI components.',
    achievements: [
      'Led the development of the new Lightning Web Components framework',
      'Improved component library performance by 40%',
      'Mentored 5+ junior developers and conducted technical interviews',
      'Contributed to the design system documentation and best practices'
    ]
  },
  {
    company: 'Microsoft',
    role: 'Software Engineer II',
    period: '2018 - 2020',
    description: 'Worked on the Azure Portal team, developing cloud management interfaces and monitoring tools.',
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
    description: "Part of the Amazon Prime Video team, working on the streaming platform's user interface.",
    achievements: [
      'Built new video player controls increasing user engagement by 25%',
      'Implemented responsive design for multiple devices and platforms',
      'Created reusable component library used across teams',
      'Optimized video loading performance reducing buffer time by 30%'
    ]
  },
  {
    company: 'Google',
    role: 'Software Engineer Intern',
    period: '2015 - 2016',
    description: 'Internship with the Chrome DevTools team, focusing on developer experience improvements.',
    achievements: [
      'Developed new debugging features for Chrome DevTools',
      'Created documentation for new API implementations',
      'Contributed to open source projects in the Chrome ecosystem',
      'Received full-time offer after successful internship completion'
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
  hidden: { opacity: 0, y: 20 },
  show: { opacity: 1, y: 0 }
};

export default function Experience(): JSX.Element {
  return (
    <Layout
      title="Experience | Siddhu Vydyabhushana"
      description="Work experience and career journey">
      <Header />
      <RouteTransition>
        <main className={styles.mainContainer}>
          <h1 className={styles.pageTitle}>Work Experience</h1>
          <motion.div 
            className={styles.timelineContainer}
            variants={container}
            initial="hidden"
            animate="show"
          >
            {experiences.map((exp, idx) => (
              <motion.div 
                key={idx} 
                className={styles.timelineItem}
                variants={item}
                whileHover={{ x: 10, transition: { duration: 0.2 } }}
              >
                <div className={styles.timelineContent}>
                  <motion.h2 
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    transition={{ delay: 0.2 * idx }}
                  >
                    {exp.company}
                  </motion.h2>
                  <h3>{exp.role}</h3>
                  <p className={styles.period}>{exp.period}</p>
                  <p>{exp.description}</p>
                  <ul className={styles.achievements}>
                    {exp.achievements.map((achievement, i) => (
                      <motion.li 
                        key={i}
                        initial={{ opacity: 0, x: -20 }}
                        animate={{ opacity: 1, x: 0 }}
                        transition={{ delay: 0.1 * i + 0.3 * idx }}
                      >
                        {achievement}
                      </motion.li>
                    ))}
                  </ul>
                </div>
              </motion.div>
            ))}
          </motion.div>
        </main>
      </RouteTransition>
    </Layout>
  );
} 