const dashboardSection = document.getElementById('dashboard');
const myStoreSection = document.getElementById('my-store');
const deliverSection = document.getElementById('delivar');
const totalSection = document.getElementById('totalsells');
const analytics = document.getElementById('analytics');
const visitor = document.getElementById('visiotr');


// Get references to the links that trigger the toggle
const dashboardLink = document.querySelector('.toggle-dashboard');
const dashboardLink2 = document.querySelector('.toggle-dashboard2');
const dashboardLink3 = document.querySelector('.toggle-dashboard3');
const myStoreLink = document.querySelector('.toggle-table');
const deliverLink = document.querySelector('.toggle-deliver');
const totalsellsLink = document.querySelector('.toggle-sells');
const analyticsLink = document.querySelector('.toggle-analytics');
const visitorLink = document.querySelector('.toggle-visitors');

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

$(document).ready(function() {
    $(".nav-link").click(function() {
        // Remove the "active" class from all links
        $(".nav-link").removeClass("active");

        // Add the "active" class to the clicked link
        $(this).addClass("active");
    });
});

$(document).ready(function() {
    $(".nav-link").click(function() {
        // Remove the "active" class from all links
        $(".nav-link").removeClass("active");

        // Add the "active" class to the clicked link
        $(this).addClass("active");

        // Hide all sections
        $("#dashboard, #my-store, #delivar").removeClass("active-section");

        // Determine which section to show based on the clicked link
        var sectionId = $(this).data("section");
        $("#" + sectionId).addClass("active-section");
    });
});

$(document).ready(function() {

    $('.edit-button').on('click', function() {
        var $row = $(this).closest('.row');
        var $categoryName = $row.find('.category-name');
        var $editInput = $row.find('.edit-input');
        var $editButton = $row.find('.edit-button');
        var $closeButton = $row.find('.close-button');

        $categoryName.toggle();
        $editInput.toggle();
        $editButton.hide();
        $closeButton.show();
        $editInput.val($categoryName.text());
    });

    $('.close-button').on('click', function() {
        var $row = $(this).closest('.row');
        var $categoryName = $row.find('.category-name');
        var $editInput = $row.find('.edit-input');
        var $editButton = $row.find('.edit-button');
        var $closeButton = $row.find('.close-button');

        $categoryName.toggle();
        $editInput.toggle();
        $closeButton.hide();
        $editButton.show();

    });
});


// function showEditField() {
//     var nameElement = document.getElementById("name");
//     var editButton = document.querySelector(".edit-button");
//     var editInput = document.querySelector(".edit-input");
//     var cancelIcon = document.querySelector(".fa-xmark");
//
//     nameElement.style.display = "none";
//     editButton.style.display = "none";
//     editInput.style.display = "inline";
//     cancelIcon.style.display = "inline";
//
//     editInput.value = '{{$id->name}}';
// }
//
// function cancelEdit() {
//     var nameElement = document.getElementById("name");
//     var editButton = document.querySelector(".edit-button");
//     var editInput = document.querySelector(".edit-input");
//     var cancelIcon = document.querySelector(".fa-xmark");
//
//     nameElement.style.display = "block";
//     editButton.style.display = "inline";
//     editInput.style.display = "none";
//     cancelIcon.style.display = "none";
// }
