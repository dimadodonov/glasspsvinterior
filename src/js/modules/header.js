export default () => {
    document.querySelector('.header-mob__btn').addEventListener('click', () => {
        document.querySelector('body').classList.add('is-fixed');
        document.querySelector('.header-mob').classList.add('active');
        document.querySelector('.header-mob__overlay').classList.add('active');
    });
    document
        .querySelector('.header-mob__close')
        .addEventListener('click', () => {
            document.querySelector('body').classList.remove('is-fixed');
            document.querySelector('.header-mob').classList.remove('active');
            document
                .querySelector('.header-mob__overlay')
                .classList.remove('active');
        });
};
