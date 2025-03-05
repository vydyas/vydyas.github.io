import React from 'react';
import Layout from '@theme/Layout';
import RouteTransition from '@site/src/components/RouteTransition';
import Header from '@site/src/components/Header';
import styles from './mentorship.module.css';

const mentorshipServices = [
  {
    title: "1:1 Meeting",
    duration: "30 minutes",
    price: "FREE",
    description: "Personal one-on-one video call to discuss your career, technical challenges, or get advice on your development journey.",
    includes: [
      "Technical guidance",
      "Career path discussion",
      "Industry insights",
      "Q&A session"
    ],
    icon: "🤝",
    link: "https://topmate.io/vydyas/53230" // Replace with your Calendly link
  },
  {
    title: "Resume Review",
    duration: "Detailed feedback",
    price: "FREE",
    description: "Get your resume reviewed with actionable feedback to make it stand out to recruiters and hiring managers.",
    includes: [
      "ATS optimization tips",
      "Content improvement",
      "Format suggestions",
      "Written feedback"
    ],
    icon: "📝",
    link: "https://topmate.io/vydyas/53231" // Replace with your form link
  },
  {
    title: "Career Guidance",
    duration: "45 minutes",
    price: "FREE",
    description: "Strategic career planning session to help you navigate your professional journey in tech.",
    includes: [
      "Career planning",
      "Skill assessment",
      "Growth opportunities",
      "Industry trends"
    ],
    icon: "🎯",
    link: "https://topmate.io/vydyas/53229" // Replace with your Calendly link
  },
  // {
  //   title: "Referral Service",
  //   duration: "Application review",
  //   price: "FREE",
  //   description: "Get your profile reviewed for potential referral opportunities at my network companies.",
  //   includes: [
  //     "Application review",
  //     "Profile assessment",
  //     "Company fit analysis",
  //     "Referral if qualified"
  //   ],
  //   icon: "🎋",
  //   link: "https://forms.google.com/your-form" // Replace with your form link
  // }
];

export default function Mentorship(): JSX.Element {
  return (
    <Layout
      title="Mentorship | Siddhu Vydyabhushana"
      description="Book a mentorship session for career guidance, resume review, or get referred to top tech companies."
    >
      <Header />
      <RouteTransition>
        <div className={styles.container}>
          <div className={styles.servicesGrid}>
            {mentorshipServices.map((service, idx) => (
              <div key={idx} className={styles.serviceCard}>
                <div className={styles.ribbon}>
                  <span className={styles.ribbonText}>{service.price}</span>
                </div>
                <div className={styles.serviceCardInner}>
                  <span className={styles.serviceIcon}>{service.icon}</span>
                  <h2 className={styles.serviceTitle}>{service.title}</h2>
                  <div className={styles.duration}>{service.duration}</div>
                  <p className={styles.description}>{service.description}</p>
                  <div className={styles.includes}>
                    <h3>What's included:</h3>
                    <ul>
                      {service.includes.map((item, i) => (
                        <li key={i}>{item}</li>
                      ))}
                    </ul>
                  </div>
                  <a 
                    href={service.link}
                    target="_blank"
                    rel="noopener noreferrer"
                    className={styles.bookButton}
                  >
                    Book Now
                  </a>
                </div>
              </div>
            ))}
          </div>
        </div>
      </RouteTransition>
    </Layout>
  );
} 