import './bootstrap';
import Alpine from 'alpinejs';

// Make Alpine globally available
window.Alpine = Alpine;

// Body scroll lock utilities
window.lockBodyScroll = () => {
    const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
    document.body.style.overflow = 'hidden';
    document.body.style.paddingRight = `${scrollbarWidth}px`;
};

window.unlockBodyScroll = () => {
    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
};

// Start Alpine
Alpine.start();