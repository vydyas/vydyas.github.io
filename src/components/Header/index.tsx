import React from 'react';
import Link from '@docusaurus/Link';
import styles from './styles.module.css';

export default function Header() {
  return (
    <header className={styles.header}>
      <nav className={styles.headerNav}>
        <Link to="/">Home</Link>
        <Link to="/about">About</Link>
        <Link to="/experience">Experience</Link>
        <Link to="/projects">Projects</Link>
        {/* <Link to="/blog">Blog</Link> */}
        <a 
          href="https://www.simpleresu.me/your-resume-url" 
          target="_blank" 
          rel="noopener noreferrer"
          className={styles.resumeLink}
        >
          Resume
          <svg className={styles.externalIcon} viewBox="0 0 24 24" width="14" height="14">
            <path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z" />
          </svg>
        </a>
      </nav>
    </header>
  );
} 