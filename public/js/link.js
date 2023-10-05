const dashboardSection = document.getElementById('dashboard');
const myStoreSection = document.getElementById('my-store');
const deliverSection = document.getElementById('delivar');
const totalSection = document.getElementById('totalsells');
const analytics = document.getElementById('analytics');


// Get references to the links that trigger the toggle
const dashboardLink = document.querySelector('.toggle-dashboard');
const dashboardLink2 = document.querySelector('.toggle-dashboard2');
const dashboardLink3 = document.querySelector('.toggle-dashboard3');
const myStoreLink = document.querySelector('.toggle-table');
const deliverLink = document.querySelector('.toggle-deliver');
const totalsellsLink = document.querySelector('.toggle-sells');
const analyticsLink = document.querySelector('.toggle-analytics');

dashboardLink3.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'none';
    analytics.style.display='none';
});

dashboardLink2.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'none';
    analytics.style.display='none';
});

// Add click event listeners to the links
dashboardLink.addEventListener('click', () => {
    dashboardSection.style.display = 'block';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'none';
    analytics.style.display='none';
});

myStoreLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'block';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'none';
    analytics.style.display='none';
});

deliverLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'block';
    totalSection.style.display = 'none';
    analytics.style.display='none';
});

totalsellsLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'block';
    analytics.style.display='none';
});

analyticsLink.addEventListener('click', () => {
    dashboardSection.style.display = 'none';
    myStoreSection.style.display = 'none';
    deliverSection.style.display = 'none';
    totalSection.style.display = 'none';
    analytics.style.display='block';
});
