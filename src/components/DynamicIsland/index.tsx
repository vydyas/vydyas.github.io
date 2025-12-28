import React, { useState, useEffect, useRef } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import styles from './styles.module.css';

interface DynamicIslandProps {
  message?: string;
  icon?: string;
  isVisible?: boolean;
  onClose?: () => void;
}

export default function DynamicIsland({ 
  message = "Welcome to my portfolio! 👋", 
  icon = "🏝️",
  isVisible = true,
  onClose 
}: DynamicIslandProps) {
  const [expanded, setExpanded] = useState(false);
  const islandRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    if (isVisible) {
      const timer = setTimeout(() => {
        onClose?.();
      }, 5000);

      // Handle outside clicks
      const handleClickOutside = (event: MouseEvent) => {
        if (islandRef.current && !islandRef.current.contains(event.target as Node)) {
          onClose?.();
        }
      };

      document.addEventListener('mousedown', handleClickOutside);

      return () => {
        clearTimeout(timer);
        document.removeEventListener('mousedown', handleClickOutside);
      };
    }
  }, [isVisible, onClose]);

  return (
    <AnimatePresence>
      {isVisible && (
        <motion.div 
          ref={islandRef}
          className={styles.islandContainer}
          initial={{ x: -100, opacity: 0 }}
          animate={{ x: 0, opacity: 1 }}
          exit={{ x: -100, opacity: 0 }}
          onClick={() => setExpanded(!expanded)}
        >
          <motion.div 
            className={`${styles.island} ${expanded ? styles.expanded : ''}`}
            layout
          >
            <motion.div className={styles.content} layout>
              <span className={styles.icon}>{icon}</span>
              <motion.span 
                className={styles.message}
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ delay: 0.2 }}
              >
                {message}
              </motion.span>
            </motion.div>
          </motion.div>
        </motion.div>
      )}
    </AnimatePresence>
  );
} 