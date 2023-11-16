const dashboardSection = document.getElementById('dashboard');
const myStoreSection = document.getElementById('products');
const ordersSection = document.getElementById('orders');
const messageSection = document.getElementById('message');
const categorySection = document.getElementById('addcategory');
const discountSection = document.getElementById('creatediscount');

const dashboardLink = document.querySelector('.toggle-dashboard');
const myStoreLink = document.querySelector('.toggle-table');
const orderLink = document.querySelector('.toggle-order');
const messageLink = document.querySelector('.toggle-message');
const categoryLink = document.querySelector('.category');
const discountLink = document.querySelector('.discount');

dashboardLink.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'none';
    categorySection.style.display = 'none';
    discountSection.style.display = 'none';
});

myStoreLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'block';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'none';
    categorySection.style.display = 'none';
    discountSection.style.display = 'none';
});

orderLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'block';
    messageSection.style.display = 'none';
    categorySection.style.display = 'none';
    discountSection.style.display = 'none';
});

messageLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'block';
    categorySection.style.display = 'none';
    discountSection.style.display = 'none';
});

categoryLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'none';
    categorySection.style.display = 'block';
    discountSection.style.display = 'none';
});

discountLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'none';
    categorySection.style.display = 'none';
    discountSection.style.display = 'block';
});


document.addEventListener('DOMContentLoaded', function() {
    const countDownDate = new Date("Nov 30, 2023 00:00:00").getTime();

    // Update the countdown every second
    const countdownFunction = setInterval(function() {
        // Get the current date and time
        const now = new Date().getTime();

        // Calculate the time remaining between now and the countdown date
        const distance = countDownDate - now;

        // Calculate days, hours, minutes, and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the countdown result in the specified td element
        const countdownElement = document.getElementById("{{$pro->upcoming_date}}");
        countdownElement.innerHTML = `Countdown: ${days}d ${hours}h ${minutes}m ${seconds}s`;

        // If the countdown is finished, display a message
        if (distance < 0) {
            clearInterval(countdownFunction);
            countdownElement.innerHTML = "Countdown expired";
        }
    }, 1000);
});
