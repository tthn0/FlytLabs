let flag = true;
document.querySelector('#menu').addEventListener('click', () => {
    if (flag) {
        document.querySelector('header.mobile ul').classList.toggle('slide-in');
        document.querySelector('main').classList.toggle('slide-down');
        document.querySelector('footer').classList.toggle('slide-down');
        document.querySelector('header #menu').classList.toggle('open');
        flag = false;
    } else {
        document.querySelector('header.mobile ul').classList.toggle('slide-out');
        document.querySelector('main').classList.toggle('slide-up');
        document.querySelector('footer').classList.toggle('slide-up');
        document.querySelector('header #menu').classList.toggle('open');
        document.querySelector('header #menu').classList.toggle('close');
    }
})