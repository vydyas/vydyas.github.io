import React from 'react';
import styles from './styles.module.css';

interface ShimmerProps {
  width?: string;
  height?: string;
  borderRadius?: string;
  className?: string;
}

export const Shimmer: React.FC<ShimmerProps> = ({ 
  width = '100%', 
  height = '20px',
  borderRadius = '4px',
  className = ''
}) => (
  <div 
    className={`${styles.shimmer} ${className}`}
    style={{ width, height, borderRadius }}
  />
);

export const ProjectShimmer = () => (
  <div className={styles.projectCard}>
    <div className={styles.imageShimmer} />
    <div className={styles.content}>
      <Shimmer height="28px" width="70%" />
      <Shimmer height="60px" className={styles.mt} />
      <div className={styles.techStack}>
        <Shimmer width="60px" height="24px" borderRadius="12px" />
        <Shimmer width="80px" height="24px" borderRadius="12px" />
        <Shimmer width="70px" height="24px" borderRadius="12px" />
      </div>
    </div>
  </div>
);

export const ExperienceShimmer = () => (
  <div className={styles.experienceCard}>
    <div className={styles.header}>
      <Shimmer width="120px" height="24px" />
      <Shimmer width="100px" height="24px" />
    </div>
    <Shimmer width="150px" height="20px" className={styles.mt} />
    <Shimmer height="40px" className={styles.mt} />
    <div className={styles.achievements}>
      <Shimmer height="16px" className={styles.mt} />
      <Shimmer height="16px" className={styles.mt} />
      <Shimmer height="16px" className={styles.mt} />
    </div>
  </div>
);

export const ProfileShimmer = () => (
  <div className={styles.profile}>
    <div className={styles.imageContainer}>
      <div className={styles.profileImageShimmer} />
    </div>
    <div className={styles.content}>
      <Shimmer width="150px" height="24px" />
      <Shimmer width="300px" height="48px" className={styles.mt} />
      <Shimmer width="200px" height="32px" className={styles.mt} />
      <Shimmer height="80px" className={styles.mt} />
      <div className={styles.socialLinks}>
        <Shimmer width="120px" height="36px" borderRadius="6px" />
        <Shimmer width="120px" height="36px" borderRadius="6px" />
        <Shimmer width="120px" height="36px" borderRadius="6px" />
      </div>
    </div>
  </div>
); 