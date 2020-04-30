// Header Functions

const menuBtn = document.querySelector('#menuBtn');
const helpBtn = document.querySelector('#helpBtn');

const menuOkayBtn = document.querySelector('.okay-button');
const wframeBtn = document.querySelector('.wframe-button');

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

menuBtn.addEventListener('click', () => {
    modal.hidden = false;
    modal_welcome.hidden = false;
    modal_content.setAttribute('class', 'modal-content-small');
    modal_close_button.setAttribute('id', 'modal-close-small');
});

menuOkayBtn.addEventListener('click', closeAllModals);

helpBtn.addEventListener('click', () => {
    modal.hidden = false;
    modal_help.hidden = false;
    document.querySelector('main').style.overflow = 'hidden';
});

wframeBtn.addEventListener('click', () => {
    window.open('wframe-&-styles.html', '_blank');
});

// Modal

const modal = document.querySelector('.modal');
const modal_close_button = document.querySelector('.modalClose');

const modal_content = document.querySelector('.modal-content');
const modal_welcome = document.querySelector('#modal-welcome');
const modal_recipe = document.querySelector('#modal-recipe');
const modal_help = document.querySelector('#modal-help');

function closeAllModals() {
    modal.hidden = true;
    modal_close_button.removeAttribute('id');
    modal_welcome.hidden = true;
    modal_recipe.hidden = true;
    modal_help.hidden = true;
};

modal_close_button.addEventListener('click', () => {
    closeAllModals();
});

// modal.addEventListener('click', () => {
//     closeAllModals();
// });

// Need to get rid of behind modal clicking

for (let i = 0; i < 6; i++) {
    card[i].addEventListener('click', () => {
        modal_help.hidden = true;
        modal_recipe.hidden = true;
        modal.hidden = false;
        modal_recipe.hidden = false;
    });
};

function toggleModal() {
    if (modal.hidden = false) {
        modal.hidden = true;
    }
    else {
        modal.hidden = false;
    }
};

// Search

const searchInput = document.querySelector('#searchInput');
const searchButton = document.querySelector('#submit');

const noResults = document.querySelector('#noResults');
const searchOkayBtn = document.querySelector('#noResults-button');

searchButton.addEventListener('click', nullSearchQuery);
searchOkayBtn.addEventListener('click', clearSearch);

function toggleSearch() {
    if (noResults.hidden = true) {
        noResults.hidden = false;
        console.log('showing search');
    }
    else {
        console.log('running clearSearch function');
    }
};

function nullSearchQuery() {
    noResults.hidden = false;
    cards.hidden = true;
    title.innerHTML = 'Search Results';
};

function clearSearch() {
    noResults.hidden = true;
    cards.hidden = false;
    title.innerHTML = 'All Recipes';
    searchInput.value = '';
};

// Filter

const filterMenu = document.querySelector('.filter');
const filterBtn = document.querySelector('#filter-button');
const filter_content = document.querySelector('#filter-content');

filterBtn.addEventListener('click', toggleFilter);

function toggleFilter() {
    clearSearch();
    if (filterMenu.hasAttribute('id')) {
        filterMenu.removeAttribute('id');
        filter_content.hidden = true;
    }
    else {
        clearFilter();
    }
};

function clearFilter() {
    filterMenu.setAttribute('id', 'filter-open');
    filter_content.removeAttribute('hidden');
};

// Replace "With"

function replaceString() {
    document.body.innerHTML = document.body.innerHTML.replace(/with/g, 'w/');
};