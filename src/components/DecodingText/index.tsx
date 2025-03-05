import React, { useState, useEffect } from 'react';
import styles from './styles.module.css';

// More readable characters for smoother effect
const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$%&*<>[]';

interface DecodingTextProps {
  text: string;
  delay?: number;
  duration?: number;
  className?: string;
}

export default function DecodingText({ 
  text, 
  delay = 800,
  duration = 3000,
  className 
}: DecodingTextProps) {
  const [displayText, setDisplayText] = useState(text);
  const [isDecoding, setIsDecoding] = useState(false);
  const [scrambledIndices, setScrambledIndices] = useState<number[]>([]);

  useEffect(() => {
    // Initial scramble animation
    let scrambleInterval: NodeJS.Timeout;
    const startScramble = () => {
      scrambleInterval = setInterval(() => {
        setDisplayText(
          text.split('')
            .map(() => characters.charAt(Math.floor(Math.random() * characters.length)))
            .join('')
        );
      }, 100);
    };

    startScramble();

    const startTimeout = setTimeout(() => {
      clearInterval(scrambleInterval);
      setIsDecoding(true);
    }, delay);

    return () => {
      clearTimeout(startTimeout);
      clearInterval(scrambleInterval);
    };
  }, [text, delay]);

  useEffect(() => {
    if (!isDecoding) {
      setScrambledIndices(Array.from({ length: text.length }, (_, i) => i));
      return;
    }

    let interval: NodeJS.Timeout;
    let iteration = 0;
    const totalIterations = text.length * 2; // 6 iterations per character
    const iterationDuration = duration / totalIterations; // Distribute duration evenly

    interval = setInterval(() => {
      setDisplayText(prev => {
        const charIndex = Math.floor(iteration / 6);
        
        if (charIndex >= text.length) {
          clearInterval(interval);
          setScrambledIndices([]);
          return text;
        }

        setScrambledIndices(prev => 
          prev.filter(i => i >= charIndex)
        );

        const result = text.split('')
          .map((char, idx) => {
            if (idx < charIndex) return char;
            if (idx === charIndex) {
              if (iteration % 6 === 5) return char;
              const randomChar = characters.charAt(Math.floor(Math.random() * characters.length));
              return randomChar;
            }
            return prev[idx] || characters.charAt(Math.floor(Math.random() * characters.length));
          })
          .join('');

        iteration++;
        return result;
      });
    }, iterationDuration);

    return () => clearInterval(interval);
  }, [text, isDecoding, duration]);

  return (
    <span 
      className={`${styles.decodingText} ${className || ''}`}
      data-original={text}
      data-decoding={scrambledIndices.length > 0}
      style={{
        width: text.length + 'ch'
      }}
    >
      {displayText.split('').map((char, index) => (
        <span
          key={index}
          style={{
            color: scrambledIndices.includes(index)
              ? 'var(--ifm-color-primary-lighter)'
              : 'var(--ifm-color-primary-darkest)',
            transition: 'all 0.3s ease'
          }}
        >
          {char}
        </span>
      ))}
    </span>
  );
} 