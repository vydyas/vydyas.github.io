"use strict";(self.webpackChunksiddhu_vydyabhushana_website=self.webpackChunksiddhu_vydyabhushana_website||[]).push([[9469],{3384:(e,t,a)=>{a.d(t,{Z:()=>c});var n=a(7294);const r="decodingText_BSeC",o="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$%&*<>[]";function c(e){let{text:t,delay:a=800,duration:c=3e3,className:i}=e;const[l,s]=(0,n.useState)(t),[m,p]=(0,n.useState)(!1),[d,h]=(0,n.useState)([]);return(0,n.useEffect)((()=>{let e;e=setInterval((()=>{s(t.split("").map((()=>o.charAt(Math.floor(Math.random()*o.length)))).join(""))}),100);const n=setTimeout((()=>{clearInterval(e),p(!0)}),a);return()=>{clearTimeout(n),clearInterval(e)}}),[t,a]),(0,n.useEffect)((()=>{if(!m)return void h(Array.from({length:t.length},((e,t)=>t)));let e,a=0;const n=2*t.length;return e=setInterval((()=>{s((n=>{const r=Math.floor(a/6);if(r>=t.length)return clearInterval(e),h([]),t;h((e=>e.filter((e=>e>=r))));const c=t.split("").map(((e,t)=>{if(t<r)return e;if(t===r){if(a%6==5)return e;return o.charAt(Math.floor(Math.random()*o.length))}return n[t]||o.charAt(Math.floor(Math.random()*o.length))})).join("");return a++,c}))}),c/n),()=>clearInterval(e)}),[t,m,c]),n.createElement("span",{className:`${r} ${i||""}`,"data-original":t,"data-decoding":d.length>0,style:{width:t.length+"ch"}},l.split("").map(((e,t)=>n.createElement("span",{key:t,style:{color:d.includes(t)?"var(--ifm-color-primary-lighter)":"var(--ifm-color-primary-darkest)",transition:"all 0.3s ease"}},e))))}},156:(e,t,a)=>{a.d(t,{Z:()=>y});var n=a(7294),r=a(9960),o=a(6775);const c="header_ZmnY",i="headerNav_jxTB",l="menuItems_JUva",s="externalIcon_gHdc",m="menuButton_hfRj",p="active_Dx2U",d="socialDropdown_kbG7",h="emoji_BDtN",u="activeLink_YXBC",_="socialDropdownButton_ZZW_",g="socialDropdownContent_qUHz",v="socialLink_Ivke",E="socialIcon_tpgU";var f=a(3384);const b="monkeyContainer_i5lh",k="rope_rlaN",C="monkey_Urx9";function I(){return n.createElement("div",{className:b},n.createElement("div",{className:k}),n.createElement("div",{className:C},"\ud83d\udc12"))}const N=[{name:"LinkedIn",url:"https://linkedin.com/in/siddhucse",icon:n.createElement("svg",{className:E,viewBox:"0 0 24 24"},n.createElement("path",{fill:"currentColor",d:"M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"}))},{name:"GitHub",url:"https://github.com/vydyas",icon:n.createElement("svg",{className:E,viewBox:"0 0 24 24"},n.createElement("path",{fill:"currentColor",d:"M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2z"}))},{name:"Email",url:"mailto:vydyas@gmail.com",icon:n.createElement("svg",{className:E,viewBox:"0 0 24 24"},n.createElement("path",{fill:"currentColor",d:"M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"}))}];function y(){const[e,t]=(0,n.useState)(!1),[a,E]=(0,n.useState)(!1),b=(0,o.TH)(),k="/"===b.pathname,[C,y]=(0,n.useState)(!1),j=(0,n.useRef)(null);(0,n.useEffect)((()=>{function e(e){j.current&&!j.current.contains(e.target)&&E(!1)}return document.addEventListener("mousedown",e),()=>{document.removeEventListener("mousedown",e)}}),[]);const Z=e=>{e.preventDefault();navigator.clipboard.writeText("vydyas@gmail.com").then((()=>{y(!0),setTimeout((()=>y(!1)),2e3)}))};return n.createElement("header",{className:c},n.createElement(I,null),n.createElement("nav",{className:i},n.createElement("button",{className:`${m} ${e?p:""}`,onClick:()=>t(!e),"aria-label":"Toggle menu"},n.createElement("span",null),n.createElement("span",null),n.createElement("span",null)),n.createElement("div",{className:`${l} ${e?p:""}`},[{title:"Home",to:"/",emoji:"\ud83c\udfe0"},{title:"Projects",to:"/projects",emoji:""},{title:"Mentorship",to:"/mentorship",emoji:""},{title:"Resume",to:"https://www.simpleresu.me",emoji:""}].map(((e,a)=>{return n.createElement(r.Z,{key:e.to,to:e.to,onClick:()=>t(!1),className:(o=e.to,"/"===o&&"/"===b.pathname||"/"!==o&&b.pathname.startsWith(o)?u:""),target:e.to.startsWith("http")?"_blank":void 0,rel:e.to.startsWith("http")?"noopener noreferrer":void 0},n.createElement("span",{className:h},e.emoji,"\xa0"),k?n.createElement(f.Z,{text:e.title,delay:800+200*a,duration:2e3}):e.title,e.to.startsWith("http")&&n.createElement("svg",{className:s,viewBox:"0 0 24 24",width:"14",height:"14"},n.createElement("path",{fill:"currentColor",d:"M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"})));var o}))),n.createElement("div",{className:d,ref:j},n.createElement("button",{className:_,onClick:()=>E(!a),"aria-label":"Toggle social links"},"Connect With Me"),a&&n.createElement("div",{className:g},N.map((e=>n.createElement("a",{key:e.name,href:e.url,onClick:"Email"===e.name?Z:void 0,target:"Email"!==e.name?"_blank":void 0,rel:"Email"!==e.name?"noopener noreferrer":void 0,className:v},e.icon,n.createElement("span",null,"Email"===e.name?C?"Copied!":"Copy Email":e.name))))))))}},1970:(e,t,a)=>{a.r(t),a.d(t,{default:()=>i});var n=a(7294),r=a(215),o=a(156),c=a(3812);function i(){return n.createElement(r.Z,{title:"Contact | Siddhu Vydyabhushana",description:"Get in touch with me"},n.createElement(o.Z,null),n.createElement("main",{className:c.Z.mainContainer},n.createElement("h1",{className:c.Z.pageTitle},"Let's Connect"),n.createElement("div",{className:c.Z.contactContainer},n.createElement("div",{className:c.Z.contactInfo},n.createElement("div",{className:c.Z.contactItem},n.createElement("span",{className:c.Z.contactIcon},"\ud83d\udce7"),n.createElement("a",{href:"mailto:your.email@example.com"},"your.email@example.com")),n.createElement("div",{className:c.Z.contactItem},n.createElement("span",{className:c.Z.contactIcon},"\ud83d\udcbc"),n.createElement("a",{href:"https://linkedin.com/in/siddhucse",target:"_blank",rel:"noopener noreferrer"},"LinkedIn")),n.createElement("div",{className:c.Z.contactItem},n.createElement("span",{className:c.Z.contactIcon},"\ud83d\udcbb"),n.createElement("a",{href:"https://github.com/vydyas",target:"_blank",rel:"noopener noreferrer"},"GitHub")),n.createElement("div",{className:c.Z.contactItem},n.createElement("span",{className:c.Z.contactIcon},"\ud83d\udc26"),n.createElement("a",{href:"https://twitter.com/siddhucse",target:"_blank",rel:"noopener noreferrer"},"Twitter"))))))}},3812:(e,t,a)=>{a.d(t,{Z:()=>n});const n={mainContainer:"mainContainer_jRJm",pageTitle:"pageTitle_qX_c",projectsGrid:"projectsGrid_a1KN",projectCard:"projectCard_pmm5",shimmerBorder:"shimmerBorder_da9Y",projectContent:"projectContent_XIMy",projectImage:"projectImage_sO57",hiddenImage:"hiddenImage_O_9Q",projectLinks:"projectLinks_grsG",githubLink:"githubLink_LHpD",liveLink:"liveLink_aZIF",projectTitle:"projectTitle_tx3s",projectDescription:"projectDescription_NiRW",blink:"blink__7s6",techStack:"techStack_MQEx",techBadge:"techBadge_AYl7",contactContainer:"contactContainer_sUZQ",contactInfo:"contactInfo_siRW",contactItem:"contactItem_ZTp6",contactIcon:"contactIcon_v49C",contentSection:"contentSection_gkkB",skillsGrid:"skillsGrid_oYaa",skillCategory:"skillCategory_GX9f",timelineContainer:"timelineContainer_T0F0",timelineItem:"timelineItem__FrF",timelineRight:"timelineRight_aYPf",timelineDot:"timelineDot_G4dG",dot:"dot_Vbdi",timelineContent:"timelineContent_VTTf",timelineHeader:"timelineHeader_D9k9",companyName:"companyName_P5zX",companyFavicon:"companyFavicon_IBli",projectsWrapper:"projectsWrapper_oh94",projectImageWrapper:"projectImageWrapper_jexl",projectOverlay:"projectOverlay_m2fh",projectLink:"projectLink_mkyq",blogList:"blogList_O4bv",blogPost:"blogPost_c1oS",blogPostImage:"blogPostImage__sHA",blogPostContent:"blogPostContent_VKHN",blogPostMeta:"blogPostMeta_mFpA",blogPostTitle:"blogPostTitle_lTpU",blogPostExcerpt:"blogPostExcerpt_dBmQ",blogPostTags:"blogPostTags_qe_i",blogPostTag:"blogPostTag_OZc9",aboutWrapper:"aboutWrapper_rJZE",introSection:"introSection_J1zt",aboutTitle:"aboutTitle_bvoR",aboutDescription:"aboutDescription_nhUh",skillsSection:"skillsSection_Iujq",interestsSection:"interestsSection_dOY2",interestsGrid:"interestsGrid_x_lA",interestCard:"interestCard_ewUm",interestIcon:"interestIcon_vfhf",experienceContainer:"experienceContainer_HEii",experienceCard:"experienceCard_Dly1",experienceHeader:"experienceHeader_NNrL",period:"period_f1rW",role:"role_FZs7",description:"description_GABZ",achievements:"achievements_eWlb"}}}]);