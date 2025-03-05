import React, { useState, useRef, useEffect } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { findBestResponse } from '@site/src/data/chatbot-data';
import styles from './styles.module.css';

const suggestedQuestions = [
  "How can I book a session?",
  "What are your skills?",
  "Tell me about your experience",
  "Educational background",
  "Current role",
  "Projects worked on",
];

export default function AIChatButton() {
  const [isOpen, setIsOpen] = useState(false);
  const [messages, setMessages] = useState<Array<{type: 'user' | 'ai', content: string}>>([]);
  const [input, setInput] = useState('');
  const [isLoading, setIsLoading] = useState(false);
  
  const messageContainerRef = useRef<HTMLDivElement>(null);
  const inputRef = useRef<HTMLInputElement>(null);

  // Auto scroll to bottom when messages change
  useEffect(() => {
    if (messageContainerRef.current) {
      messageContainerRef.current.scrollTop = messageContainerRef.current.scrollHeight;
    }
  }, [messages]);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    if (!input.trim()) return;

    const userMessage = input.trim();
    setInput('');
    setMessages(prev => [...prev, { type: 'user', content: userMessage }]);
    setIsLoading(true);

    setTimeout(() => {
      const response = findBestResponse(userMessage);
      setMessages(prev => [...prev, { type: 'ai', content: response }]);
      setIsLoading(false);
    }, 500);
  };

  const handleQuestionClick = (question: string) => {
    setInput(question);
    // Focus the input
    inputRef.current?.focus();
    // Submit the form programmatically
    setTimeout(() => {
      handleSubmit(new Event('submit') as any);
    }, 100);
  };

  return (
    <>
      <motion.button
        className={styles.chatButton}
        onClick={() => setIsOpen(true)}
        whileHover={{ scale: 1.05 }}
        whileTap={{ scale: 0.95 }}
      >
        <span className={styles.buttonText}>Ask Siddhu</span>
        <svg className={styles.buttonIcon} viewBox="0 0 24 24">
          <path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z"/>
        </svg>
      </motion.button>

      <AnimatePresence>
        {isOpen && (
          <motion.div
            className={styles.chatWindow}
            initial={{ scale: 0.9, opacity: 0, y: 20 }}
            animate={{ scale: 1, opacity: 1, y: 0 }}
            exit={{ scale: 0.9, opacity: 0, y: 20 }}
          >
            <div className={styles.chatHeader}>
              <div className={styles.headerTitle}>
                <svg className={styles.headerIcon} viewBox="0 0 24 24">
                  <path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z"/>
                </svg>
                <h3>Chat with Siddhu's AI Assistant</h3>
              </div>
              <button 
                className={styles.closeButton}
                onClick={() => setIsOpen(false)}
              >
                ×
              </button>
            </div>

            <div className={styles.messageContainer} ref={messageContainerRef}>
              {messages.length === 0 && (
                <div className={styles.welcomeMessage}>
                  👋 Hi! I'm Siddhu's AI assistant. Ask me anything about his work, experience, or skills!
                </div>
              )}
              {messages.map((msg, idx) => (
                <div 
                  key={idx} 
                  className={`${styles.message} ${msg.type === 'user' ? styles.userMessage : styles.aiMessage}`}
                  dangerouslySetInnerHTML={{ __html: msg.content }}
                />
              ))}
              {isLoading && (
                <div className={styles.loadingIndicator}>
                  <span>•</span><span>•</span><span>•</span>
                </div>
              )}
            </div>

            <div className={styles.suggestedQuestions}>
              {suggestedQuestions.map((question, idx) => (
                <motion.button
                  key={idx}
                  className={styles.questionPill}
                  onClick={() => handleQuestionClick(question)}
                  whileHover={{ scale: 1.05 }}
                  whileTap={{ scale: 0.95 }}
                >
                  {question}
                </motion.button>
              ))}
            </div>

            <form onSubmit={handleSubmit} className={styles.inputForm}>
              <input
                ref={inputRef}
                type="text"
                value={input}
                onChange={(e) => setInput(e.target.value)}
                placeholder="Ask me anything..."
                className={styles.input}
              />
              <button 
                type="submit" 
                className={styles.sendButton}
                disabled={isLoading || !input.trim()}
              >
                <svg viewBox="0 0 24 24" className={styles.sendIcon}>
                  <path fill="currentColor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                </svg>
              </button>
            </form>
          </motion.div>
        )}
      </AnimatePresence>
    </>
  );
} 