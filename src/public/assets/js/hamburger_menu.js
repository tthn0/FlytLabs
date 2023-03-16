let open = true;
document.querySelector('#hamburger-menu').addEventListener('click', () => {
    if (open) {
        document.querySelector('header.mobile ul').classList.toggle('slide-in');
        document.querySelector('main').classList.toggle('slide-down');
        document.querySelector('footer').classList.toggle('slide-down');
        document.querySelector('header #hamburger-menu').classList.toggle('open');
        open = false;
    } else {
        document.querySelector('header.mobile ul').classList.toggle('slide-out');
        document.querySelector('main').classList.toggle('slide-up');
        document.querySelector('footer').classList.toggle('slide-up');
        document.querySelector('header #hamburger-menu').classList.toggle('open');
        document.querySelector('header #hamburger-menu').classList.toggle('close');
    }
})