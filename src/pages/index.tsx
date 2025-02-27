import React, { useState, useEffect } from 'react';
import useDocusaurusContext from '@docusaurus/useDocusaurusContext';
import Layout from '@theme/Layout';
import Header from '@site/src/components/Header';
import RouteTransition from '@site/src/components/RouteTransition';
import { TypeAnimation } from 'react-type-animation';
import { motion, AnimatePresence } from 'framer-motion';
import styles from './index.module.css';

const socialLinks = [
  {
    name: 'LinkedIn',
    url: 'https://linkedin.com/in/siddhucse',
    icon: (
      <svg className={styles.socialIcon} viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/>
      </svg>
    ),
    className: styles.linkedinLink
  },
  {
    name: 'Twitter',
    url: 'https://twitter.com/siddhucse',
    icon: (
      <svg className={styles.socialIcon} viewBox="0 0 24 24">
        <path fill="currentColor" d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
      </svg>
    ),
    className: styles.twitterLink
  },
  {
    name: 'GitHub',
    url: 'https://github.com/vydyas',
    icon: (
      <svg className={styles.socialIcon} viewBox="0 0 24 24">
        <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2z"/>
      </svg>
    ),
    className: styles.githubLink
  }
];

function MainSection() {
  const {siteConfig} = useDocusaurusContext();
  const [startTyping, setStartTyping] = useState(false);

  useEffect(() => {
    const timer = setTimeout(() => {
      setStartTyping(true);
    }, 1000); // Start typing after 1 second

    return () => clearTimeout(timer);
  }, []);

  return (
    <div className={styles.mainContainer}>
      <div className={styles.profileSection}>
        <motion.img 
          className={styles.profileImage} 
          src="https://avatars.githubusercontent.com/u/2999586?v=4" 
          alt="Profile"
          initial={{ opacity: 0, scale: 0.5 }}
          animate={{ opacity: 1, scale: 1 }}
          transition={{ duration: 0.5 }}
        />
        <div className={styles.headerContent}>
          <motion.span 
            className={styles.greeting}
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
          >
            Hello 👋 , I'm
          </motion.span>
          <motion.h1 
            className={styles.name}
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.2 }}
          >
            {siteConfig.title}
          </motion.h1>
          <motion.div 
            className={styles.roleWrapper}
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ delay: 0.4 }}
          >
            <span className={styles.rolePrefix}>I'm a </span>
            <AnimatePresence>
              {startTyping && (
                <TypeAnimation
                  sequence={[
                    'Senior Software Engineer',
                    2000,
                    'Frontend Developer',
                    2000,
                    'UI/UX Enthusiast',
                    2000,
                    'Problem Solver',
                    2000,
                  ]}
                  wrapper="span"
                  speed={50}
                  className={styles.typeAnimation}
                  repeat={Infinity}
                />
              )}
            </AnimatePresence>
          </motion.div>
          <motion.p 
            className={styles.brief}
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.4 }}
          >
            <ul className={styles.briefList}>
              <li>
                Senior Software Engineer at <a href="https://www.salesforce.com" target="_blank" rel="noopener noreferrer" className={styles.salesforceLink}>Salesforce</a>
              </li>
              <li>
                Building <a href="https://simpleresu.me" target="_blank" rel="noopener noreferrer" className={styles.salesforceLink}>simpleresu.me</a>, 
                an AI-powered resume builder
              </li>
            </ul>
          </motion.p>
          <motion.div 
            className={styles.socialLinks}
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.8 }}
          >
            {socialLinks.map((social, index) => (
              <motion.a
                key={social.name}
                href={social.url}
                target="_blank"
                rel="noopener noreferrer"
                className={`${styles.socialLink} ${social.className}`}
                whileHover={{ y: -4 }}
                whileTap={{ scale: 0.95 }}
              >
                {social.icon}
                {social.name}
              </motion.a>
            ))}
          </motion.div>
        </div>
      </div>
    </div>
  );
}

export default function Home(): JSX.Element {
  return (
    <Layout
      title="Frontend Developer Portfolio | Siddhu Vydyabhushana"
      description="Personal portfolio website showcasing my work and experience as a Frontend Developer">
      <Header />
      <RouteTransition>
        <main className={styles.main}>
          <MainSection />
        </main>
      </RouteTransition>
    </Layout>
  );
}
