// public/js/navbar.js
document.addEventListener('DOMContentLoaded', () => {
    const navToggle = document.getElementById('navToggle');
    const navLinks = document.getElementById('navLinks');

    navToggle.addEventListener('click', () => {
        navLinks.classList.toggle('nav-active');
        navToggle.setAttribute('aria-expanded', navLinks.classList.contains('nav-active'));
    });

    navLinks.addEventListener('click', (e) => {
        if (e.target.tagName === 'A') {
            navLinks.classList.remove('nav-active');
            navToggle.setAttribute('aria-expanded', false);
        }
    });

    // Close the menu when clicking outside of it
    document.addEventListener('click', (e) => {
        if (!navLinks.contains(e.target) && !navToggle.contains(e.target)) {
            navLinks.classList.remove('nav-active');
            navToggle.setAttribute('aria-expanded', false);
        }
    });
});
