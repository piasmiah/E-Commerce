const dashboardSection = document.getElementById('dashboard');
const myStoreSection = document.getElementById('products');
const ordersSection = document.getElementById('orders');
const messageSection = document.getElementById('message');
const categorySection = document.getElementById('addcategory');

const dashboardLink = document.querySelector('.toggle-dashboard');
const myStoreLink = document.querySelector('.toggle-table');
const orderLink = document.querySelector('.toggle-order');
const messageLink = document.querySelector('.toggle-message');
const categoryLink = document.querySelector('.category');

dashboardLink.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'none';
    categorySection.style.display = 'none';
});

myStoreLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'block';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'none';
    categorySection.style.display = 'none';
});

orderLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'block';
    messageSection.style.display = 'none';
    categorySection.style.display = 'none';
});

messageLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'block';
    categorySection.style.display = 'none';
});

categoryLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    ordersSection.style.display = 'none';
    messageSection.style.display = 'none';
    categorySection.style.display = 'block';
});
