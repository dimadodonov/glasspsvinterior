export default () => {
    function popup() {
        const initPopup = document.querySelectorAll('.initpopup'),
            popup = document.querySelectorAll('.popup'),
            closePopup = document.querySelectorAll('.popup__close'),
            overlayPopup = document.querySelectorAll('.popup__overlay');

        if (initPopup) {
            for (let i = 0; i < initPopup.length; i++) {
                const dataPopup = initPopup[i].dataset.popup;

                initPopup[i].addEventListener('click', function () {
                    const el = document.querySelector('.popup');

                    document.querySelector(
                        '.popup.popup-' + dataPopup
                    ).style.display = 'block';
                    document
                        .querySelector('.popup.popup-' + dataPopup)
                        .classList.add('is_active');
                    document.querySelector(
                        '.popup-' + dataPopup + ' .popup__overlay'
                    ).style.display = 'block';
                    document.querySelector('body').style.overflowY = 'hidden';
                });
            }
        }

        if (closePopup) {
            for (let i = 0; i < closePopup.length; i++) {
                const cp = closePopup[i];

                cp.addEventListener('click', function () {
                    for (
                        let allCloseBtn = 0;
                        allCloseBtn < popup.length;
                        allCloseBtn++
                    ) {
                        popup[allCloseBtn].style.display = 'none';
                        popup[allCloseBtn].classList.remove('is_active');
                    }
                    document.querySelector('body').style.overflowY = 'auto';
                });
            }
        }

        if (overlayPopup) {
            overlayPopup.forEach((overlayPopup) => {
                overlayPopup.addEventListener('click', () => {
                    for (
                        let allCloseBtn = 0;
                        allCloseBtn < popup.length;
                        allCloseBtn++
                    ) {
                        popup[allCloseBtn].style.display = 'none';
                        popup[allCloseBtn].classList.remove('is_active');
                    }
                    document.querySelector('body').style.overflowY = 'auto';
                });
            });
        }
    }

    popup();
};
