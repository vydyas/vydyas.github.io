import React from 'react';
import Layout from '@theme/Layout';
import Header from '@site/src/components/Header';
import RouteTransition from '@site/src/components/RouteTransition';
import { motion } from 'framer-motion';
import styles from './pages.module.css';

const container = {
  hidden: { opacity: 0 },
  show: {
    opacity: 1,
    transition: {
      staggerChildren: 0.1
    }
  }
};

const item = {
  hidden: { opacity: 0, scale: 0.9 },
  show: { 
    opacity: 1, 
    scale: 1,
    transition: {
      type: "spring",
      stiffness: 100
    }
  }
};

const projects = [
  {
    title: 'Lightning Design System',
    description: 'A design system built for enterprise applications, focusing on accessibility and scalability.',
    image: '/img/projects/lds.png',
    tech: ['React', 'TypeScript', 'SCSS', 'Jest'],
    link: 'https://github.com/salesforce/design-system',
    demo: 'https://www.lightningdesignsystem.com',
    featured: true
  },
  {
    title: 'React Performance Monitor',
    description: 'A real-time performance monitoring tool for React applications with detailed metrics and insights.',
    image: '/img/projects/monitor.png',
    tech: ['React', 'D3.js', 'WebSockets', 'Node.js'],
    link: 'https://github.com/yourusername/react-performance',
    demo: 'https://react-monitor-demo.com',
    featured: true
  },
  {
    title: 'AI Code Assistant',
    description: 'An AI-powered code completion and suggestion tool built using machine learning.',
    image: '/img/projects/ai-code.png',
    tech: ['Python', 'TensorFlow', 'React', 'FastAPI'],
    link: 'https://github.com/yourusername/ai-code',
    featured: false
  },
  {
    title: 'Cloud Dashboard',
    description: 'A modern dashboard for monitoring cloud resources and infrastructure metrics.',
    image: '/img/projects/cloud.png',
    tech: ['Vue.js', 'GraphQL', 'Node.js', 'Docker'],
    link: 'https://github.com/yourusername/cloud-dashboard',
    featured: false
  }
];

export default function Projects(): JSX.Element {
  return (
    <Layout
      title="Projects | Siddhu Vydyabhushana"
      description="Featured projects and work samples">
      <Header />
      <RouteTransition>
        <main className={styles.mainContainer}>
          <h1 className={styles.pageTitle}>Featured Projects</h1>
          <motion.div 
            className={styles.projectsWrapper}
            variants={container}
            initial="hidden"
            animate="show"
          >
            {projects.map((project, idx) => (
              <motion.div 
                key={idx} 
                className={styles.projectCard}
                variants={item}
                whileHover={{ y: -8, transition: { duration: 0.2 } }}
              >
                <div className={styles.projectImageWrapper}>
                  <motion.img 
                    src={project.image} 
                    alt={project.title}
                    className={styles.projectImage}
                    whileHover={{ scale: 1.05 }}
                    transition={{ duration: 0.3 }}
                  />
                  <motion.div 
                    className={styles.projectOverlay}
                    initial={{ opacity: 0 }}
                    whileHover={{ opacity: 1 }}
                  >
                    <div className={styles.projectLinks}>
                      {project.demo && (
                        <motion.a 
                          href={project.demo}
                          target="_blank"
                          rel="noopener noreferrer"
                          className={styles.projectLink}
                          whileHover={{ scale: 1.05 }}
                          whileTap={{ scale: 0.95 }}
                        >
                          View Demo
                        </motion.a>
                      )}
                      <motion.a 
                        href={project.link}
                        target="_blank"
                        rel="noopener noreferrer"
                        className={styles.projectLink}
                        whileHover={{ scale: 1.05 }}
                        whileTap={{ scale: 0.95 }}
                      >
                        Source Code
                      </motion.a>
                    </div>
                  </motion.div>
                </div>
                <div className={styles.projectContent}>
                  <motion.h3 
                    className={styles.projectTitle}
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ delay: 0.2 * idx }}
                  >
                    {project.title}
                  </motion.h3>
                  <p className={styles.projectDescription}>{project.description}</p>
                  <div className={styles.techStack}>
                    {project.tech.map((tech, i) => (
                      <motion.span 
                        key={tech} 
                        className={styles.techBadge}
                        initial={{ opacity: 0, scale: 0.8 }}
                        animate={{ opacity: 1, scale: 1 }}
                        transition={{ delay: 0.1 * i + 0.3 * idx }}
                      >
                        {tech}
                      </motion.span>
                    ))}
                  </div>
                </div>
              </motion.div>
            ))}
          </motion.div>
        </main>
      </RouteTransition>
    </Layout>
  );
} 