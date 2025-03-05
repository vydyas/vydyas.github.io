import React, { useState, useEffect } from 'react';
import styles from './styles.module.css';

export default function ScrollButton() {
  const [isAtBottom, setIsAtBottom] = useState(false);
  const [hasScroll, setHasScroll] = useState(false);

  useEffect(() => {
    const checkScroll = () => {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      const scrollHeight = document.documentElement.scrollHeight;
      const clientHeight = document.documentElement.clientHeight;
      
      // Check if page has scrollable content
      setHasScroll(scrollHeight > clientHeight + 100);
      
      // Check if we're near the bottom (within 100px)
      setIsAtBottom(scrollHeight - scrollTop - clientHeight < 100);
    };

    // Initial check
    checkScroll();
    
    // Check on scroll
    window.addEventListener('scroll', checkScroll);
    
    // Check on window resize
    window.addEventListener('resize', checkScroll);

    return () => {
      window.removeEventListener('scroll', checkScroll);
      window.removeEventListener('resize', checkScroll);
    };
  }, []);

  const scrollTo = () => {
    window.scrollTo({
      top: isAtBottom ? 0 : document.documentElement.scrollHeight,
      behavior: 'smooth'
    });
  };

  if (!hasScroll) return null;

  return (
    <button 
      className={`${styles.scrollButton} ${isAtBottom ? styles.up : styles.down}`}
      onClick={scrollTo}
      aria-label={isAtBottom ? 'Scroll to top' : 'Scroll to bottom'}
    >
      <svg 
        viewBox="0 0 24 24" 
        width="24" 
        height="24" 
        className={styles.icon}
      >
        <path 
          fill="currentColor" 
          d={isAtBottom 
            ? "M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"
            : "M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"
          }
        />
      </svg>
    </button>
  );
} 