export const chatbotData = {
  name: "Siddhu Vydyabhushana",
  role: "Senior Software Engineer at Salesforce",
  skills: [
    "React", 
    "TypeScript",
    "JavaScript",
    "Node.js",
    "Lightning Web Components",
    "Web Development",
    "UI/UX Design"
  ],
  experience: [
    {
      company: "Salesforce",
      role: "Senior Software Engineer",
      period: "2020 - Present",
      description: "Working on Einstein Copilot and Lightning Design System",
      highlights: [
        "Building and maintaining Lightning Web Components framework",
        "Leading frontend development initiatives",
        "Developing UI components and design systems"
      ]
    },
    // Add other experience entries...
  ],
  education: {
    degree: "Bachelor of Technology",
    field: "Computer Science",
    university: "JNTU Hyderabad",
    year: "2016-2020"
  },
  about: "Senior Software Engineer with expertise in frontend development, currently working at Salesforce on Einstein Copilot. Passionate about creating intuitive user interfaces and building scalable web applications.",
  // Add more relevant information...
};

export type ChatResponse = {
  keywords: string[];
  response: string;
};

export const chatResponses: Record<string, ChatResponse> = {
  "skills": {
    keywords: ["skills", "tech", "technology", "stack", "programming", "languages", "frameworks"],
    response: `<p>I specialize in frontend development with expertise in:</p>
<ul>
  <li>React & TypeScript</li>
  <li>Lightning Web Components</li>
  <li>JavaScript/Node.js</li>
  <li>UI/UX Design</li>
  <li>Web Development</li>
</ul>`
  },
  "experience": {
    keywords: ["experience", "work", "job", "career", "company", "salesforce", "position"],
    response: "I'm currently working as a Senior Software Engineer at Salesforce, focusing on Einstein Copilot. I have extensive experience in frontend development and building UI components."
  },
  "education": {
    keywords: ["education", "university", "college", "degree", "study", "qualification"],
    response: "I completed my Bachelor of Technology in Computer Science from JNTU Hyderabad (2016-2020)."
  },
  "projects": {
    keywords: ["projects", "work", "portfolio", "built", "created", "developed"],
    response: "I've worked on various projects including Lightning Web Components framework, Einstein Copilot, and several open-source contributions."
  },
  "mentorship": {
    keywords: ["mentor", "mentorship", "guidance", "session", "book", "meeting", "help"],
    response: `<p>I offer several mentorship services to help you grow in your tech career:</p>

<h3>1. 1:1 Meeting (30 mins)</h3>
<ul>
  <li>Personal video call for technical guidance</li>
  <li>Career path discussion</li>
  <li>Industry insights</li>
  <li>Live Q&A session</li>
</ul>

<h3>2. Resume Review</h3>
<ul>
  <li>ATS optimization tips</li>
  <li>Content improvement suggestions</li>
  <li>Format recommendations</li>
  <li>Detailed written feedback</li>
</ul>

<h3>3. Career Guidance (45 mins)</h3>
<ul>
  <li>Strategic career planning</li>
  <li>Skill assessment</li>
  <li>Growth opportunities discussion</li>
  <li>Industry trends insights</li>
</ul>

<h3>4. Referral Service</h3>
<ul>
  <li>Application review</li>
  <li>Profile assessment</li>
  <li>Company fit analysis</li>
  <li>Referral if qualified</li>
</ul>

<p><a href="https://topmate.io/vydyas" target="_blank" class="book-link">Book a session here →</a></p>`
  },
  "booking": {
    keywords: ["book", "schedule", "appointment", "session", "meet", "call"],
    response: `<p>You can book a mentorship session with me through Topmate:</p>

<ul class="booking-links">
  <li>1:1 Meeting (30 mins): <a href="https://topmate.io/vydyas/53230" target="_blank" class="book-link">Book Now →</a></li>
  <li>Resume Review: <a href="https://topmate.io/vydyas/53231" target="_blank" class="book-link">Book Now →</a></li>
  <li>Career Guidance (45 mins): <a href="https://topmate.io/vydyas/53229" target="_blank" class="book-link">Book Now →</a></li>
</ul>

<p>Choose the session that best fits your needs and schedule a time that works for you.</p>`
  },
  "pricing": {
    keywords: ["cost", "price", "fee", "charges", "paid", "free"],
    response: `<p>My mentorship services are reasonably priced to ensure accessibility:</p>

<ul class="pricing-list">
  <li>1:1 Meeting (30 mins): <strong>₹999</strong></li>
  <li>Resume Review: <strong>₹1499</strong></li>
  <li>Career Guidance (45 mins): <strong>₹1499</strong></li>
  <li>Referral Service: <em>Case by case basis</em></li>
</ul>

<p><a href="https://topmate.io/vydyas" target="_blank" class="book-link">Book a session here →</a></p>`
  },
  "referral": {
    keywords: ["refer", "referral", "company", "job", "opportunity"],
    response: `<p>I can help with referrals to companies in my network. The process involves:</p>

<ol>
  <li>Profile review to ensure fit</li>
  <li>Company culture alignment check</li>
  <li>Position suitability assessment</li>
  <li>Direct referral if qualified</li>
</ol>

<p><strong>Note:</strong> Referrals are based on merit and current openings. Let's discuss your profile in a 1:1 session first.</p>`
  },
  "default": {
    keywords: [],
    response: `<p>👋 I'm Siddhu's AI assistant. I can tell you about his experience, projects, and mentorship services.</p>
<p>Try asking about:</p>
<ul>
  <li>Mentorship services</li>
  <li>Booking a session</li>
  <li>Skills and experience</li>
  <li>Referral process</li>
</ul>`
  }
};

export function findBestResponse(input: string): string {
  const lowercaseInput = input.toLowerCase();
  
  // Find matching response based on keywords
  for (const [_, data] of Object.entries(chatResponses)) {
    if (data.keywords.some(keyword => lowercaseInput.includes(keyword))) {
      return data.response;
    }
  }
  
  return chatResponses.default.response;
} 