import React from 'react';
import { motion } from 'framer-motion';
import styles from './styles.module.css';

const shapes = [
  {
    className: styles.circle,
    variants: {
      animate: {
        x: [0, 50, 0],
        y: [0, -50, 0],
        transition: {
          duration: 15,
          repeat: Infinity,
          ease: "easeInOut"
        }
      }
    }
  },
  {
    className: styles.square,
    variants: {
      animate: {
        rotate: [0, 360],
        scale: [1, 1.2, 1],
        transition: {
          duration: 25,
          repeat: Infinity,
          ease: "linear"
        }
      }
    }
  },
  {
    className: styles.triangle,
    variants: {
      animate: {
        x: [0, -60, 0],
        y: [0, 60, 0],
        rotate: [0, -360],
        transition: {
          duration: 20,
          repeat: Infinity,
          ease: "easeInOut"
        }
      }
    }
  },
  {
    className: styles.donut,
    variants: {
      animate: {
        scale: [1, 1.3, 1],
        rotate: [0, 180, 0],
        transition: {
          duration: 18,
          repeat: Infinity,
          ease: "easeInOut"
        }
      }
    }
  }
];

export default function AnimatedBackground() {
  return (
    <div className={styles.background}>
      {shapes.map((shape, index) => (
        <motion.div
          key={index}
          className={shape.className}
          initial={{ opacity: 0 }}
          animate={{ 
            opacity: 1,
            ...shape.variants.animate
          }}
          transition={{
            opacity: { duration: 1, ease: "easeInOut" }
          }}
        />
      ))}
    </div>
  );
} 