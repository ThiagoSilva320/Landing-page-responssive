'use strict';

const menuToggle = document.querySelector('[data-menu-toggle]');
const navigation = document.querySelector('[data-navigation]');
const siteHeader = document.querySelector('[data-site-header]');

if (menuToggle && navigation && siteHeader) {
    const closeMenu = (returnFocus = false) => {
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.setAttribute('aria-label', 'Abrir menu de navegação');
        navigation.classList.remove('is-open');
        document.body.classList.remove('menu-open');

        if (returnFocus) {
            menuToggle.focus();
        }
    };

    const openMenu = () => {
        menuToggle.setAttribute('aria-expanded', 'true');
        menuToggle.setAttribute('aria-label', 'Fechar menu de navegação');
        navigation.classList.add('is-open');
        document.body.classList.add('menu-open');
    };

    menuToggle.addEventListener('click', () => {
        const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

        if (isOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    navigation.addEventListener('click', (event) => {
        if (event.target.closest('a')) {
            closeMenu();
        }
    });

    document.addEventListener('click', (event) => {
        const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

        if (isOpen && !siteHeader.contains(event.target)) {
            closeMenu();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') {
            closeMenu(true);
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && menuToggle.getAttribute('aria-expanded') === 'true') {
            closeMenu();
        }
    });
}
