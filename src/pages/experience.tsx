import React from 'react';
import Layout from '@theme/Layout';
import Header from '@site/src/components/Header';
import RouteTransition from '@site/src/components/RouteTransition';
import { motion } from 'framer-motion';
import styles from './pages.module.css';

const experiences = [
  {
    company: 'ServiceNow',
    favicon: 'https://www.servicenow.com/favicon.ico',
    role: 'Staff Engineer',
    period: 'Present',
    description: 'Staff Engineer leading Agent Chat team and driving AI innovation',
    achievements: [
      'Agent Chat Ownership - Leading the development and strategy for Agent Chat platform',
      'Adding AI features to Agent Chat - Integrating cutting-edge AI capabilities to enhance user experience',
      'Managing 12 members of team - Leading and mentoring a team of talented engineers',
      'ServiceNow is 20 years old company - Taking care of legacy code and managing customer investigations',
      'Reviewing code and Architecting new solutions - Driving technical excellence through code reviews and system design'
    ]
  },
  {
    company: 'Salesforce',
    favicon: 'https://www.salesforce.com/favicon.ico',
    role: 'Senior Software Engineer',
    period: 'Apr2021 - Present',
    description: 'Senior Software Engineer working for Einstein Copilot',
    achievements: [
      'Building and maintaining Lightning Web Components framework',
      'Improving component library performance and accessibility',
      'Mentoring junior developers and conducting technical interviews'
    ]
  },
  {
    company: 'Pega',
    favicon: 'https://www.pega.com/themes/custom/pega_bolt_theme/images/favicons/favicon.ico',
    role: 'Senior Software Engineer',
    period: 'Feb 2020 - Mar 2021',
    description: 'Worked on pega cloud management interfaces',
    achievements: [
      'Took full ownership of the micro front-end architecture',
      'Wrote extensive unit test cases and end-to-end test cases using Jasmine, Playwright, Jest, and Enzyme',
      'Built a scalable React data table component that efficiently handles 100k rows without freezing'
    ]
  },
  {
    company: 'SS&C EZE Software',
    favicon: 'https://www.ezesoft.com/hubfs/favicon-96x96.png',
    role: 'Full Stack Javascript Developer',
    period: 'Apr 2017 - Jan 2020',
    description: 'Part of platform team, working on cloud management interfaces',
    achievements: [
      'Architected and developed microservices in Node.js and Python',
      'Took ownership of pipeline setup to improve scaling during building and deployment',
      'Worked with front-end technologies such as Angular, TypeScript, JavaScript ES6, HTML5, and CSS3. Developed back-end services using Node.js, Sequelize, and GraphQL',
      'Wrote behavior-driven tests using Cucumber and set up build pipelines as part of the build process'
    ]
  },
  {
    company: 'Tata Consultancy Services',
    favicon: 'https://www.tcs.com/etc.clientlibs/tcs/clientlibs/clientlib-site/resources/images/tcs_favicon_48.png',
    role: 'Software Engineer',
    period: 'Mar 2015 - Mar 2017',
    description: 'Part of the Amazon Prime Video team, working on streaming platform UI.',
    achievements: [
      'Written RESTFUL web services using java Springs framework, setup and written end to end test with selenium I awarded star performer for my contrubution and innovation in work',
      'I awarded star performer for my contrubution and innovation in work'
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
          <motion.h1 
            className={styles.pageTitle}
            initial={{ opacity: 0, y: -20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6 }}
          >
            Work Experience
          </motion.h1>
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