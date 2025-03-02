"use strict";(self.webpackChunksiddhu_vydyabhushana_website=self.webpackChunksiddhu_vydyabhushana_website||[]).push([[6059],{6794:(e,t,i)=>{i.d(t,{Z:()=>g});var n=i(7294),a=i(9960),o=i(6775);const r="header_ZmnY",c="headerNav_jxTB",l="logo_M6bd",s="menuItems_JUva",m="externalIcon_gHdc",p="menuButton_hfRj",d="active_Dx2U",_="emoji_BDtN",u="activeLink_YXBC";function g(){const[e,t]=(0,n.useState)(!1),i=(0,o.TH)();return n.createElement("header",{className:r},n.createElement("nav",{className:c},n.createElement("div",{className:l},n.createElement(a.Z,{to:"/"},"SV")),n.createElement("button",{className:`${p} ${e?d:""}`,onClick:()=>t(!e),"aria-label":"Toggle menu"},n.createElement("span",null),n.createElement("span",null),n.createElement("span",null)),n.createElement("div",{className:`${s} ${e?d:""}`},[{title:"Home",to:"/",emoji:"\ud83c\udfe0"},{title:"Projects",to:"/projects",emoji:""},{title:"Mentorship",to:"/mentorship",emoji:""},{title:"Resume",to:"https://www.simpleresu.me",emoji:""}].map(((e,o)=>{return n.createElement(a.Z,{key:o,to:e.to,onClick:()=>t(!1),className:(r=e.to,"/"===r&&"/"===i.pathname||"/"!==r&&i.pathname.startsWith(r)?u:""),target:e.to.startsWith("http")?"_blank":void 0,rel:e.to.startsWith("http")?"noopener noreferrer":void 0},n.createElement("span",{className:_},e.emoji,"\xa0"),e.title,e.to.startsWith("http")&&n.createElement("svg",{className:m,viewBox:"0 0 24 24",width:"14",height:"14"},n.createElement("path",{fill:"currentColor",d:"M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"})));var r})))))}},2002:(e,t,i)=>{i.d(t,{Z:()=>l});var n=i(7294),a=i(6775),o=i(1190),r=i(8716);const c="routeContainer_IEe8";function l(e){let{children:t}=e;const i=(0,a.TH)();return n.createElement(o.M,{mode:"wait"},n.createElement(r.E.div,{key:i.pathname,initial:{opacity:0,y:20},animate:{opacity:1,y:0},exit:{opacity:0,y:-20},transition:{duration:.3},className:c},t))}},6876:(e,t,i)=>{i.r(t),i.d(t,{default:()=>p});var n=i(7294),a=i(215),o=i(6794),r=i(2002),c=i(8716),l=i(3812);const s={frontend:["React","TypeScript","Next.js","CSS/SASS","Redux","GraphQL"],backend:["Node.js","Express","MongoDB","PostgreSQL","REST APIs","AWS"],tools:["Git","Docker","Webpack","Jest","CI/CD","Agile/Scrum"]},m=[{title:"Open Source",description:"Contributing to and maintaining open source projects that help the developer community.",icon:"\ud83c\udf1f"},{title:"Web Performance",description:"Optimizing web applications for speed, accessibility, and user experience.",icon:"\u26a1"},{title:"Teaching",description:"Mentoring junior developers and sharing knowledge through technical writing.",icon:"\ud83d\udcda"}];function p(){return n.createElement(a.Z,{title:"About | Siddhu Vydyabhushana",description:"About me - Software Engineer and Frontend Developer"},n.createElement(o.Z,null),n.createElement(r.Z,null,n.createElement("main",{className:l.Z.mainContainer},n.createElement("div",{className:l.Z.aboutWrapper},n.createElement(c.E.section,{className:l.Z.introSection,initial:{opacity:0,y:20},animate:{opacity:1,y:0},transition:{duration:.5}},n.createElement("h1",{className:l.Z.aboutTitle},"About Me"),n.createElement("div",{className:l.Z.aboutContent},n.createElement("p",{className:l.Z.aboutDescription},"Hi! I'm a Senior Software Engineer with over 8 years of experience in building scalable web applications. Currently working at Salesforce, where I focus on creating enterprise-level UI components and improving developer experience."),n.createElement("p",{className:l.Z.aboutDescription},"I'm passionate about creating intuitive user interfaces and writing clean, maintainable code. When I'm not coding, you'll find me contributing to open source projects, writing technical articles, or exploring new technologies."))),n.createElement(c.E.section,{className:l.Z.skillsSection,initial:{opacity:0,y:20},animate:{opacity:1,y:0},transition:{duration:.5,delay:.2}},n.createElement("h2",null,"Skills & Expertise"),n.createElement("div",{className:l.Z.skillsGrid},Object.entries(s).map(((e,t)=>{let[i,a]=e;return n.createElement(c.E.div,{key:i,className:l.Z.skillCategory,initial:{opacity:0,x:-20},animate:{opacity:1,x:0},transition:{delay:.1*t+.3}},n.createElement("h3",null,i.charAt(0).toUpperCase()+i.slice(1)),n.createElement("ul",null,a.map(((e,i)=>n.createElement(c.E.li,{key:e,initial:{opacity:0},animate:{opacity:1},transition:{delay:.05*i+.1*t+.4}},e)))))})))),n.createElement(c.E.section,{className:l.Z.interestsSection,initial:{opacity:0,y:20},animate:{opacity:1,y:0},transition:{duration:.5,delay:.4}},n.createElement("h2",null,"Interests & Focus Areas"),n.createElement("div",{className:l.Z.interestsGrid},m.map(((e,t)=>n.createElement(c.E.div,{key:t,className:l.Z.interestCard,initial:{opacity:0,scale:.95},animate:{opacity:1,scale:1},transition:{delay:.1*t+.5},whileHover:{y:-5}},n.createElement("span",{className:l.Z.interestIcon},e.icon),n.createElement("h3",null,e.title),n.createElement("p",null,e.description))))))))))}},3812:(e,t,i)=>{i.d(t,{Z:()=>n});const n={mainContainer:"mainContainer_jRJm",pageTitle:"pageTitle_qX_c",projectsGrid:"projectsGrid_a1KN",projectCard:"projectCard_pmm5",projectImage:"projectImage_sO57",hiddenImage:"hiddenImage_O_9Q",projectLinks:"projectLinks_grsG",githubLink:"githubLink_LHpD",liveLink:"liveLink_aZIF",projectContent:"projectContent_XIMy",projectTitle:"projectTitle_tx3s",projectDescription:"projectDescription_NiRW",blink:"blink__7s6",techStack:"techStack_MQEx",techBadge:"techBadge_AYl7",contactContainer:"contactContainer_sUZQ",contactInfo:"contactInfo_siRW",contactItem:"contactItem_ZTp6",contactIcon:"contactIcon_v49C",contentSection:"contentSection_gkkB",skillsGrid:"skillsGrid_oYaa",skillCategory:"skillCategory_GX9f",timelineContainer:"timelineContainer_T0F0",timelineItem:"timelineItem__FrF",timelineRight:"timelineRight_aYPf",timelineDot:"timelineDot_G4dG",dot:"dot_Vbdi",timelineContent:"timelineContent_VTTf",timelineHeader:"timelineHeader_D9k9",companyName:"companyName_P5zX",companyFavicon:"companyFavicon_IBli",projectsWrapper:"projectsWrapper_oh94",projectImageWrapper:"projectImageWrapper_jexl",projectOverlay:"projectOverlay_m2fh",projectLink:"projectLink_mkyq",blogList:"blogList_O4bv",blogPost:"blogPost_c1oS",blogPostImage:"blogPostImage__sHA",blogPostContent:"blogPostContent_VKHN",blogPostMeta:"blogPostMeta_mFpA",blogPostTitle:"blogPostTitle_lTpU",blogPostExcerpt:"blogPostExcerpt_dBmQ",blogPostTags:"blogPostTags_qe_i",blogPostTag:"blogPostTag_OZc9",aboutWrapper:"aboutWrapper_rJZE",introSection:"introSection_J1zt",aboutTitle:"aboutTitle_bvoR",aboutDescription:"aboutDescription_nhUh",skillsSection:"skillsSection_Iujq",interestsSection:"interestsSection_dOY2",interestsGrid:"interestsGrid_x_lA",interestCard:"interestCard_ewUm",interestIcon:"interestIcon_vfhf",experienceContainer:"experienceContainer_HEii",experienceCard:"experienceCard_Dly1",experienceHeader:"experienceHeader_NNrL",period:"period_f1rW",role:"role_FZs7",description:"description_GABZ",achievements:"achievements_eWlb"}}}]);