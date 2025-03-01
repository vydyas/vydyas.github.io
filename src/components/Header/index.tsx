import React, { useState } from 'react';
import Link from '@docusaurus/Link';
import { useLocation } from '@docusaurus/router';
import styles from './styles.module.css';

export default function Header() {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const location = useLocation();

  const isActive = (path: string) => {
    if (path === '/' && location.pathname === '/') return true;
    if (path !== '/' && location.pathname.startsWith(path)) return true;
    return false;
  };

  return (
    <header className={styles.header}>
      <nav className={styles.headerNav}>
        <div className={styles.logo}>
          <Link to="/">SV</Link>
        </div>
        
        <button 
          className={`${styles.menuButton} ${isMenuOpen ? styles.active : ''}`}
          onClick={() => setIsMenuOpen(!isMenuOpen)}
          aria-label="Toggle menu"
        >
          <span></span>
          <span></span>
          <span></span>
        </button>

        <div className={`${styles.menuItems} ${isMenuOpen ? styles.active : ''}`}>
          <Link 
            to="/" 
            onClick={() => setIsMenuOpen(false)}
            className={isActive('/') ? styles.activeLink : ''}
          >
            <span className={styles.emoji}>🏠&nbsp;</span>
            Home
          </Link>
          {/* <Link to="/about" onClick={() => setIsMenuOpen(false)}>About</Link> */}
          <Link 
            to="/experience" 
            onClick={() => setIsMenuOpen(false)}
            className={isActive('/experience') ? styles.activeLink : ''}
          >
            <span className={styles.emoji}>💼&nbsp;</span>
            Work Experience
          </Link>
          <Link 
            to="/projects" 
            onClick={() => setIsMenuOpen(false)}
            className={isActive('/projects') ? styles.activeLink : ''}
          >
            <span className={styles.emoji}>🚀&nbsp;</span>
            Open Source Projects
          </Link>
          {/* <Link to="/blog">Blog</Link> */}
          <a 
            href="https://www.simpleresu.me" 
            target="_blank"
            rel="noopener noreferrer"
            className={styles.resumeLink}
            onClick={() => setIsMenuOpen(false)}
          >
            <span className={styles.emoji}>📄&nbsp;</span>
            Resume
            <svg className={styles.externalIcon} viewBox="0 0 24 24" width="14" height="14">
              <path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z" />
            </svg>
          </a>
        </div>
      </nav>
    </header>
  );
} 