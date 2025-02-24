import React from 'react';
import Layout from '@theme/Layout';
import Header from '@site/src/components/Header';
import styles from './pages.module.css';

export default function Contact(): JSX.Element {
  return (
    <Layout
      title="Contact | Siddhu Vydyabhushana"
      description="Get in touch with me">
      <Header />
      <main className={styles.mainContainer}>
        <h1 className={styles.pageTitle}>Let's Connect</h1>
        <div className={styles.contactContainer}>
          <div className={styles.contactInfo}>
            <div className={styles.contactItem}>
              <span className={styles.contactIcon}>📧</span>
              <a href="mailto:your.email@example.com">your.email@example.com</a>
            </div>
            <div className={styles.contactItem}>
              <span className={styles.contactIcon}>💼</span>
              <a href="https://linkedin.com/in/siddhucse" target="_blank" rel="noopener noreferrer">
                LinkedIn
              </a>
            </div>
            <div className={styles.contactItem}>
              <span className={styles.contactIcon}>💻</span>
              <a href="https://github.com/vydyas" target="_blank" rel="noopener noreferrer">
                GitHub
              </a>
            </div>
            <div className={styles.contactItem}>
              <span className={styles.contactIcon}>🐦</span>
              <a href="https://twitter.com/siddhucse" target="_blank" rel="noopener noreferrer">
                Twitter
              </a>
            </div>
          </div>
        </div>
      </main>
    </Layout>
  );
} 