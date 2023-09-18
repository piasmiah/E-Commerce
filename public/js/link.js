const dashboardSection = document.getElementById('dashboard');
const myStoreSection = document.getElementById('my-store');
const deliverSection = document.getElementById('delivar');
const totalSection = document.getElementById('totalsells');

// Get references to the links that trigger the toggle
const dashboardLink = document.querySelector('.toggle-dashboard');
const dashboardLink2 = document.querySelector('.toggle-dashboard2');
const dashboardLink3 = document.querySelector('.toggle-dashboard3');
const myStoreLink = document.querySelector('.toggle-table');
const deliverLink = document.querySelector('.toggle-deliver');
const totalsellsLink = document.querySelector('.toggle-sells');

dashboardLink3.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'none';
});

dashboardLink2.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'none';
});

// Add click event listeners to the links
dashboardLink.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'none';
});

myStoreLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'block';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'none';
});

deliverLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'block';
    totalSection.style.display = 'none';
});

totalsellsLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'block';
});
