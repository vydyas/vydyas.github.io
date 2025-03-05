import React, { useState } from 'react';
import Link from '@docusaurus/Link';
import { useLocation } from '@docusaurus/router';
import styles from './styles.module.css';
import DecodingText from '../DecodingText';

export default function Header() {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const location = useLocation();
  const isHomePage = location.pathname === '/';

  const isActive = (path: string) => {
    if (path === '/' && location.pathname === '/') return true;
    if (path !== '/' && location.pathname.startsWith(path)) return true;
    return false;
  };

  const navigation = [
    { title: 'Home', to: '/', emoji: '🏠' },
    { title: 'Projects', to: '/projects', emoji: '' },
    { title: 'Mentorship', to: '/mentorship', emoji: '' },
    { title: 'Resume', to: 'https://www.simpleresu.me', emoji: '' }
  ];

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
          {navigation.map((item, index) => (
            <Link 
              key={item.to}
              to={item.to}
              onClick={() => setIsMenuOpen(false)}
              className={isActive(item.to) ? styles.activeLink : ''}
              target={item.to.startsWith('http') ? '_blank' : undefined}
              rel={item.to.startsWith('http') ? 'noopener noreferrer' : undefined}
            >
              <span className={styles.emoji}>{item.emoji}&nbsp;</span>
              {isHomePage ? (
                <DecodingText 
                  text={item.title}
                  delay={800 + (index * 200)}
                  duration={2000}
                />
              ) : (
                item.title
              )}
              {item.to.startsWith('http') && (
                <svg className={styles.externalIcon} viewBox="0 0 24 24" width="14" height="14">
                  <path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z" />
                </svg>
              )}
            </Link>
          ))}
        </div>
      </nav>
    </header>
  );
} 