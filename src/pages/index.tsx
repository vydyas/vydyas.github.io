import React from 'react';
import clsx from 'clsx';
import Link from '@docusaurus/Link';
import useDocusaurusContext from '@docusaurus/useDocusaurusContext';
import Layout from '@theme/Layout';

import styles from './index.module.css';

function HomepageHeader() {
  const {siteConfig} = useDocusaurusContext();
  return (
    <header className={clsx('hero hero--primary', styles.heroBanner)}>
      <div className="container">
        <div className='bottom__30px avatar'>
          <img className="profilePic topToBottom" src="https://avatars.githubusercontent.com/u/2999586?v=4" alt="" width="256" height="256"/>
        </div>
        <h1 className="hero__title">{siteConfig.title}</h1>
        <p className="hero__subtitle">{siteConfig.tagline}</p>
        <p className="hero__subtitle">Working 💻 as an <b>Engineer</b> at <span className="salesforce">Salesforce ☁️</span></p>
        <div className={styles.buttons}>
          <Link
            className="button button--cut special">
            Javascript
          </Link>
          <Link
            className="button button--cut special">
            ReactJS
          </Link>
          <Link
            className="button button--cut special">
            NodeJS
          </Link>
          <Link
            className="button button--cut special">
            HTML5
          </Link>
          <Link
            className="button button--cut special">
            CSS3
          </Link>
        </div>
        <div className="bottom__30px"></div>
        <div>
            <p>Connect with me @ <a href="https://www.linkedin.com/in/siddhucse/" target="_blank">Linkedin</a></p>
        </div>
      </div>
    </header>
  );
}

export default function Home(): JSX.Element {
  const {siteConfig} = useDocusaurusContext();
  return (
    <Layout
      title="Front end developer portfolio | Siddhu Vydyabhushana"
      description="Description will go into a meta tag in <head />">
      <HomepageHeader />
      <main>
      </main>
    </Layout>
  );
}
