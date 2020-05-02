$( document ).ready(function() {

// Header Functions

const header_menu_link = document.querySelector('#header-menu-link');
const header_help_link = document.querySelector('#header-help-link');

const welcome_menu_okay_button = document.querySelector('.welcome-menu-okay-button-button');
const welcome_wframe_button = document.querySelector('.welcome-wframe-button');

const logoText = document.querySelectorAll('.logoText');
const cards = document.querySelector('#cards');
const card = document.querySelectorAll('.card');
const title = document.querySelector('#title');

for (let i = 0; i < 2; i++) {
    
    logoText[i].addEventListener('click', () => {
        location.reload();
        return false;
    });
};

header_menu_link.addEventListener('click', () => {
    showModal();
    modal_welcome.hidden = false;
});

welcome_menu_okay_button.addEventListener('click', closeAllModals);

header_help_link.addEventListener('click', () => {
    showModal();
    modal_help.hidden = false;
    document.querySelector('main').style.overflow = 'hidden';
});

welcome_wframe_button.addEventListener('click', () => {
    window.open('wframe-&-styles.html', '_blank');
});

// Modal

const modal = document.querySelector('.modal');
const modal_close_button = document.querySelector('.modal-close');

const modal_content = document.querySelector('.modal-content');
const modal_welcome = document.querySelector('#modal-welcome');
const modal_recipe = document.querySelector('#modal-recipe');
const modal_help = document.querySelector('#modal-help');

function closeAllModals() {
    hideModal();
    modal_close_button.removeAttribute('id');
    modal_welcome.hidden = true;
    modal_recipe.hidden = true;
    modal_help.hidden = true;
};

modal_close_button.addEventListener('click', () => {
    closeAllModals();
});

// Show & Hide Modal

function hideModal() {
    document.body.style.overflowY = 'auto';
    modal.hidden = true;
}

function showModal() {
    document.body.style.overflow = 'hidden';
    modal.hidden = false;
}

// modal.addEventListener('click', () => {
//     closeAllModals();
// });

// Need to get rid of behind modal clicking

for (let i = 0; i < 6; i++) {
    card[i].addEventListener('click', () => {
        modal_help.hidden = true;
        modal_recipe.hidden = true;
        showModal();
        modal_recipe.hidden = false;
    });
};

function toggleModal() {
    if (modal.hidden = false) {
        modal.hidden = true;
    }
    else {
        showModal();
    }
};

// Search

const search_input = document.querySelector('#search-input');
const search_button = document.querySelector('#submit');

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

// Replace "With"

function replaceString() {
    document.body.innerHTML = document.body.innerHTML.replace(/with/g, 'w/');
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
        console.log('Wide viewport, adjusting footer.');
        footer.style.position = '';
        footer.style.bottom = '';
        footer.style.left = '';
}

// End of JS

});