import React from 'react';
import { useLocation } from '@docusaurus/router';
import { motion, AnimatePresence } from 'framer-motion';
import styles from './styles.module.css';

export default function RouteTransition({ children }) {
  const location = useLocation();
  
  return (
    <AnimatePresence mode="wait">
      <motion.div
        key={location.pathname}
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        exit={{ opacity: 0, y: -20 }}
        transition={{ duration: 0.3 }}
        className={styles.routeContainer}
      >
        {children}
      </motion.div>
    </AnimatePresence>
  );
} 