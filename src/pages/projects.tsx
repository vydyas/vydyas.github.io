import React, { useEffect, useState } from 'react';
import Layout from '@theme/Layout';
import Header from '@site/src/components/Header';
import RouteTransition from '@site/src/components/RouteTransition';
import { motion, useInView } from 'framer-motion';
import styles from './pages.module.css';
import { ProjectShimmer } from '@site/src/components/LoadingShimmer';
import SEO from '../components/SEO';

// Gradient backgrounds for projects without images
const gradients = [
  'linear-gradient(135deg, #00A1E0 0%, #0064A0 100%)',
  'linear-gradient(135deg, #1589EE 0%, #5EB4FF 100%)',
  'linear-gradient(135deg, #6157FF 0%, #EE49FD 100%)',
  'linear-gradient(135deg, #FF5F6D 0%, #FFC371 100%)',
  'linear-gradient(135deg, #4776E6 0%, #8E54E9 100%)',
  'linear-gradient(135deg, #00cdac 0%, #8dda85 100%)'
];

const getRandomGradient = () => {
  return gradients[Math.floor(Math.random() * gradients.length)];
};

const projects = [
  {
    title: 'SimpleResu.me',
    description: 'AI-powered resume builder that helps users create professional resumes with intelligent suggestions and real-time preview.',
    image: '/img/projects/simpleresu.me.png', // Will fallback to gradient if image doesn't exist
    tech: ['Next.js', 'TypeScript', 'OpenAI', 'TailwindCSS'],
    githubUrl: 'https://github.com/vydyas/simpleresu.me',
    liveUrl: 'https://simpleresu.me',
    featured: true
  },
  {
    title: 'Portfolio Website',
    description: 'Personal portfolio website built with Docusaurus and React, featuring dark mode, animations, and responsive design.',
    image: '/img/projects/portfolio.png', // Will fallback to gradient if image doesn't exist
    tech: ['React', 'TypeScript', 'Docusaurus', 'Framer Motion'],
    githubUrl: 'https://github.com/vydyas/vydyas.github.io',
    liveUrl: 'https://vydyas.github.io',
    featured: true
  },
  {
    title: 'Online Movie Ticket Booking System',
    description: 'Online Movie Ticket Booking Script is a fully functional theatre booking system designed to allow users to book movie tickets online with ease. This script provides information about movies, theatres, and showtimes, while allowing customers to select and book their preferred seats. It includes robust features like multiple user roles',
    image: '/img/projects/movie.png', // Will fallback to gradient if image doesn't exist
    tech: ['PHP', 'Javascript', 'MySQL', 'HTML', 'CSS', 'Bootstrap'],
    githubUrl: 'https://github.com/vydyas/Online-Movie-Ticket-Booking-Script-Free',
    liveUrl: '',
    featured: true
  },
  {
    title: 'JSON Formatter',
    description: 'FormatJSON.io helps you manage and convert JSON to other formats efficiently. JSON to XML, JSON Beautifier, JSON Minifier, JSON TREE VIEW.',
    image: '/img/projects/json.png', // Will fallback to gradient if image doesn't exist
    tech: ['React', 'TypeScript'],
    githubUrl: 'https://github.com/vydyas/formatjson.io',
    liveUrl: 'https://www.formatjson.io/',
    featured: true
  },
];

const TypeWriter = ({ text, delay = 0 }) => {
  const [displayText, setDisplayText] = useState('');
  const [isTyping, setIsTyping] = useState(false);
  const [isMobile, setIsMobile] = useState(false);
  const ref = React.useRef(null);
  const isInView = useInView(ref, { once: true, margin: "-50px" }); // Adjusted margin for mobile

  useEffect(() => {
    // Check if mobile device
    const checkMobile = () => {
      setIsMobile(window.innerWidth <= 768);
    };
    
    checkMobile();
    window.addEventListener('resize', checkMobile);
    
    return () => window.removeEventListener('resize', checkMobile);
  }, []);

  useEffect(() => {
    if (isInView && !isTyping) {
      setIsTyping(true);
      let currentText = '';
      const textArray = text.split('');
      let i = 0;

      setTimeout(() => {
        const typeInterval = setInterval(() => {
          if (i < textArray.length) {
            currentText += textArray[i];
            setDisplayText(currentText);
            i++;
          } else {
            clearInterval(typeInterval);
          }
        }, isMobile ? 10 : 20); // Faster typing on mobile

        return () => clearInterval(typeInterval);
      }, isMobile ? delay / 2 : delay); // Shorter delay on mobile
    }
  }, [text, delay, isInView, isMobile]);

  // On mobile, show full text immediately if not in view
  if (isMobile && !isInView) {
    return <span>{text}</span>;
  }

  return <span ref={ref}>{displayText}</span>;
};

const ProjectCard = ({ project, index }) => {
  const [imageError, setImageError] = React.useState(false);
  const backgroundStyle = project.image && !imageError
    ? {
        backgroundImage: `url(${project.image})`,
        backgroundSize: 'cover',
        backgroundPosition: 'center'
      }
    : {
        background: project.gradient || getRandomGradient(),
        backgroundSize: 'cover',
        backgroundPosition: 'center'
      };

  return (
    <motion.div 
      className={styles.projectCard}
      initial={{ opacity: 0, y: 20 }}
      animate={{ opacity: 1, y: 0 }}
      transition={{ duration: 0.5, delay: index * 0.1 }}
    >
      <div className={styles.projectImage} style={backgroundStyle}>
        {project.image && !imageError && (
          <img 
            src={project.image}
            alt={project.title}
            className={styles.hiddenImage}
            onError={() => setImageError(true)}
          />
        )}
        <div className={styles.projectLinks}>
          <a 
            href={project.githubUrl} 
            target="_blank" 
            rel="noopener noreferrer"
            className={styles.githubLink}
            aria-label="View source on GitHub"
          >
            <svg viewBox="0 0 24 24" width="24" height="24">
              <path fill="currentColor" d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
            </svg>
          </a>
          {project.liveUrl && (
            <a 
              href={project.liveUrl} 
              target="_blank" 
              rel="noopener noreferrer"
              className={styles.liveLink}
              aria-label="View live demo"
            >
              <svg viewBox="0 0 24 24" width="24" height="24">
                <path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
              </svg>
            </a>
          )}
        </div>
      </div>
      <div className={styles.projectContent}>
        <motion.h3 
          className={styles.projectTitle}
          initial={{ filter: 'blur(8px)', opacity: 0 }}
          animate={{ filter: 'blur(0px)', opacity: 1 }}
          transition={{ duration: 0.8, delay: index * 0.2 }}
        >
          {project.title}
        </motion.h3>
        <p className={styles.projectDescription}>
          <TypeWriter 
            text={project.description} 
            delay={index * 200 + 500}
          />
        </p>
        <motion.div 
          className={styles.techStack}
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ duration: 0.5, delay: index * 0.2 + 1 }}
        >
          {project.tech.map((tech, i) => (
            <span key={i} className={styles.techBadge}>{tech}</span>
          ))}
        </motion.div>
      </div>
    </motion.div>
  );
};

export default function Projects(): JSX.Element {
  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    const timer = setTimeout(() => {
      setIsLoading(false);
    }, 1000);
    return () => clearTimeout(timer);
  }, []);

  return (
    <Layout
      title="Open Source Projects | Siddhu Vydyabhushana"
      description="Open source projects and contributions">
      <SEO 
        title="Projects - Siddhu Vydyabhushana"
        description="Explore my portfolio of full-stack development projects using React, Node.js, and cloud technologies. View live demos and source code."
        keywords={[
          "Siddhu Vydyabhushana projects",
          "React projects",
          "Full stack projects",
          "Web development portfolio",
          "Software engineering projects"
        ]}
      />
      <Header />
      <RouteTransition>
        <main className={styles.mainContainer}>
          {isLoading ? (
            <div className={styles.projectsGrid}>
              {[1, 2, 3].map((i) => (
                <ProjectShimmer key={i} />
              ))}
            </div>
          ) : (
            <div className={styles.projectsGrid}>
              {projects.map((project, idx) => (
                <ProjectCard key={idx} project={project} index={idx} />
              ))}
            </div>
          )}
        </main>
      </RouteTransition>
    </Layout>
  );
} 