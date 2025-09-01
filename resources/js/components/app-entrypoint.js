// Laravel Equipment Management System Entry Point
// This file will load Alpine.js and other dependencies when properly installed

console.log('Equipment Management System loaded');

// Basic Alpine.js initialization (when available)
document.addEventListener('DOMContentLoaded', () => {
  // Hero section basic fade-in animation
  const hero = document.querySelector('[data-hero]');
  if (hero) {
    hero.style.opacity = '0';
    hero.style.transform = 'translateY(-12px)';
    
    setTimeout(() => {
      hero.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
      hero.style.opacity = '1';
      hero.style.transform = 'translateY(0)';
    }, 100);
  }
  
  // Theme toggle functionality
  const themeButtons = document.querySelectorAll('[data-theme-toggle]');
  themeButtons.forEach(button => {
    button.addEventListener('click', () => {
      const html = document.documentElement;
      const isDark = html.classList.contains('dark');
      
      if (isDark) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      } else {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      }
    });
  });
});

// When Alpine.js, Motion, and Flatpickr are properly installed, this will be:
/*
import Alpine from 'alpinejs';
import { animate } from 'motion';
import flatpickr from 'flatpickr';

window.Alpine = Alpine;
Alpine.start();

window.addEventListener('DOMContentLoaded', () => {
  const hero = document.querySelector('[data-hero]');
  if (hero) animate(hero, { opacity: [0, 1], y: [-12, 0] }, { duration: 0.6, easing: 'ease-out' });
});

window.flatpickr = flatpickr;
*/