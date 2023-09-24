const dashboardSection = document.getElementById('dashboard');
const myStoreSection = document.getElementById('products');
const ordersSection = document.getElementById('orders');
const messageSection = document.getElementById('message');

const dashboardLink = document.querySelector('.toggle-dashboard');
const myStoreLink = document.querySelector('.toggle-table');
const orderLink = document.querySelector('.toggle-order');
const messageLink = document.querySelector('.toggle-message');

dashboardLink.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'none';
});

myStoreLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'block';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'none';
});

orderLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'block';
    messageSection.style.display = 'none';
});

messageLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'block';
});
