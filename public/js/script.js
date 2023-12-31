'use strict';

// modal variables



    const modal = document.querySelector('[data-modal]');
    const modalCloseBtn = document.querySelector('[data-modal-close]');
    const modalCloseOverlay = document.querySelector('[data-modal-overlay]');

// modal function
    const modalCloseFunc = function () {
        modal.classList.add('closed')
    }

// modal eventListener
    modalCloseOverlay.addEventListener('click', modalCloseFunc);
    modalCloseBtn.addEventListener('click', modalCloseFunc);


// notification toast variables
    const notificationToast = document.querySelector('[data-toast]');
    const toastCloseBtn = document.querySelector('[data-toast-close]');

// notification toast eventListener
    toastCloseBtn.addEventListener('click', function () {
        notificationToast.classList.add('closed');
    });


// mobile menu variables
    const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
    const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
    const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
    const overlay = document.querySelector('[data-overlay]');

    for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

        // mobile menu function
        const mobileMenuCloseFunc = function () {
            mobileMenu[i].classList.remove('active');
            overlay.classList.remove('active');
        }

        mobileMenuOpenBtn[i].addEventListener('click', function () {
            mobileMenu[i].classList.add('active');
            overlay.classList.add('active');
        });

        mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
        overlay.addEventListener('click', mobileMenuCloseFunc);

    }


// accordion variables
    const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
    const accordion = document.querySelectorAll('[data-accordion]');

    for (let i = 0; i < accordionBtn.length; i++) {

        accordionBtn[i].addEventListener('click', function () {

            const clickedBtn = this.nextElementSibling.classList.contains('active');

            for (let i = 0; i < accordion.length; i++) {

                if (clickedBtn) break;

                if (accordion[i].classList.contains('active')) {

                    accordion[i].classList.remove('active');
                    accordionBtn[i].classList.remove('active');

                }

            }

            this.nextElementSibling.classList.toggle('active');
            this.classList.toggle('active');

        });

    }


// Set the date you're counting down to



//     const main = document.getElementById('main');
//     const aboutus = document.getElementById('about');
//
//     const myStoreLink = document.querySelector('.toggle');
//     const aboutlink = document.querySelector('.toggle2');
//
//     myStoreLink.addEventListener('click', () => {
//     main.style.display = 'block';
//     aboutus.style.display = 'none';
// });
//
//     aboutlink.addEventListener('click', () => {
//     main.style.display = 'none';
//     aboutus.style.display = 'block';
// });

function startCountdown(targetDate, element) {
    let countdownInterval = setInterval(function() {
        let now = new Date().getTime();
        let distance = targetDate - now;

        // Calculations for days, hours, minutes, and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        element.innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        if (distance < 0) {
            clearInterval(countdownInterval);
            element.innerHTML = "Countdown expired";
        }
    }, 1000);
}

// Example: Set the target date/time for the countdown (adjust this as needed)
let countdownElements = document.querySelectorAll('.countdown');

countdownElements.forEach(function(element) {
    let endDate = new Date(element.getAttribute('data-end-date')).getTime();
    startCountdown(endDate, element);
});

