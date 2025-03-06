import React from 'react';
import styles from './styles.module.css';

export default function HangingMonkey() {
  return (
    <div className={styles.monkeyContainer}>
      <div className={styles.rope}></div>
      <div className={styles.monkey}>🐒</div>
    </div>
  );
} 