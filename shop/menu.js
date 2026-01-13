document.addEventListener('DOMContentLoaded', () => {
    const burgerBtn = document.querySelector('#burger-menu');
    const menu = document.querySelector('.header-nav');

    burgerBtn.addEventListener('click', () => {
        burgerBtn.classList.toggle('active');
        menu.classList.toggle('active');
        document.body.classList.toggle('no-scroll');
    });
});