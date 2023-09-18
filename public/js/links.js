const dashboardSection = document.getElementById('dashboard');
const myStoreSection = document.getElementById('products');
const ordersSection = document.getElementById('orders');

const dashboardLink = document.querySelector('.toggle-dashboard');
const myStoreLink = document.querySelector('.toggle-table');
const orderLink = document.querySelector('.toggle-order');

dashboardLink.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
});

myStoreLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'block';
    ordersSection.style.display = 'none';
});

orderLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'block';
});
