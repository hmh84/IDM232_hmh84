$( document ).ready(function() {

// Header Functions

const header_menu_link = document.querySelector('#header-menu-link');
const header_help_link = document.querySelector('#header-help-link');

const menu_cms_button = document.querySelector('#menu-cms-button');
const menu_continue_button = document.querySelector('#menu-continue-button');

const logo_text = document.querySelectorAll('.logo-text');
const cards = document.querySelector('#cards');
const card = document.querySelectorAll('.card');
const title = document.querySelector('#title');

for (let i = 0; i < 2; i++) {
    
    logo_text[i].addEventListener('click', () => {
        location.reload();
        return false;
    });
};

header_menu_link.addEventListener('click', () => {
    showModal();
    modal_menu.style.display = "flex";
});


header_help_link.addEventListener('click', () => {
    showModal();
    modal_help.style.display = "flex";
});

menu_cms_button.addEventListener('click', () => {
    window.open('cms.php', '_blank');
});

// Modal

const modal_backdrop = document.querySelector('#modal-backdrop');
const modal_container = document.querySelector('#modal-container');
const modal_close_button = document.querySelector('#modal-close');

const modal_content = document.querySelector('.modal-content');
const modal_menu = document.querySelector('#modal-menu');
const modal_recipe = document.querySelector('#modal-recipe');
const modal_help = document.querySelector('#modal-help');

function closeAllModals() {
    modal_menu.style.display = "none";
    modal_recipe.style.display = "none";
    modal_help.style.display = "none";
    
    modal_backdrop.style.display = "none";
    modal_container.style.display = "none";
    modal_close_button.style.display = "none";
    
    document.querySelector('#html').style.overflowY = "auto";
};

menu_continue_button.addEventListener('click', closeAllModals);
modal_close_button.addEventListener('click', closeAllModals);
// modal_recipe.addEventListener('click', closeAllModals);
// Need to get rid of behind modal clicking

for (let i = 0; i < 37; i++) {
    
    card[i].addEventListener('click', () => {
        modal_menu.style.display = "none";
        modal_help.style.display = "none";
        modal_recipe.style.display = "flex";
        
        modal_backdrop.style.display = "flex";
        modal_container.style.display = "flex";
        modal_close_button.style.display = "flex";

        document.querySelector('#html').style.overflowY = "hidden";
    });
};

// Search

const search_input = document.querySelector('#search-input');
const search_button = document.querySelector('#search-button');

const no_results = document.querySelector('#no-results');
const search_okay_button = document.querySelector('#no-results-button');

search_button.addEventListener('click', nullSearchQuery);
search_okay_button.addEventListener('click', clearSearch);

function toggleSearch() {
    if (no_results.hidden = true) {
        no_results.hidden = false;
    }
    else {
        no_results.hidden = true
    }
};

function nullSearchQuery() {
    no_results.hidden = false;
    cards.style.display = 'none';
    title.innerHTML = 'Search Results';
    footerCheck_pushDown();
};

function clearSearch() {
    no_results.hidden = true;
    cards.style.display = 'flex';
    title.innerHTML = 'All Recipes';
    search_input.value = '';
    footerCheck_revert();
};

// Filter

const filter_menu = document.querySelector('.filter');
const filter_whole_button = document.querySelector('.filter');
// const filter_button = document.querySelector('#filter-button');
const filter_content = document.querySelector('#filter-content');

filter_whole_button.addEventListener('click', toggleFilter);
// filter_button.addEventListener('click', nullSearchQuery);

function toggleFilter() {
    clearSearch();
    if (filter_menu.hasAttribute('id')) {
        filter_menu.removeAttribute('id');
        filter_content.hidden = true;
    }
    else {
        clearFilter();
    }
};

function clearFilter() {
    filter_menu.setAttribute('id', 'filter-open');
    filter_content.removeAttribute('hidden');
};

// Slideshow

$("#slideshow > img:gt(0)").hide();

setInterval(function() {
    $('#slideshow > img:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 12000);

var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
const footer = document.querySelector('footer');

function footerCheck_pushDown() {
    if (viewportWidth >= 1100 && viewportHeight >= 640) {
        console.log('Wide viewport, adjusting footer.');
        footer.style.position = 'fixed';
        footer.style.bottom = '0';
        footer.style.left = '0';
    } else {
        console.log('Small viewport, no footer changes made.');
    }
}

function footerCheck_revert() {
        footer.style.position = '';
        footer.style.bottom = '';
        footer.style.left = '';
}

// KeyUp Events

document.onkeyup = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27 || evt.keyCode == 32) {
        // Keys (27 = ESC, 32 = SpaceBar)
            event.preventDefault();
            closeAllModals();
    }
};

// End of JS

});