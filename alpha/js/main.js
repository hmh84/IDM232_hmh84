// Init

const modal = document.querySelector('.modal');
const modalWrap = document.querySelector('.modal-content');
const modalClose = document.querySelector('.modalClose');

const modal_welcome = document.querySelector('#modal-welcome');
const modal_recipe = document.querySelector('#modal-recipe');
const modal_help = document.querySelector('#modal-help');

const menuBtn = document.querySelector('#menuBtn');
const helpBtn = document.querySelector('#helpBtn');

const okayBtn = document.querySelector('.okay-button');
const wframeBtn = document.querySelector('.wframe-button');

const searchInput = document.querySelector('#searchInput');
const searchButton = document.querySelector('#submit');
const noResults = document.querySelector('#noResults');
const noResultsBtn = document.querySelector('#noResults-button');

const logoText = document.querySelectorAll('.logoText');
const cards = document.querySelector('#cards');
const card = document.querySelectorAll('.card');
const title = document.querySelector('#title');

// Header Functions

for (let i = 0; i < 2; i++) {
    
    logoText[i].addEventListener('click', () => {
        location.reload();
        return false;
    });
};

menuBtn.addEventListener('click', () => {
    modal.hidden = false;
    modal_welcome.hidden = false;
    modalWrap.setAttribute('class', 'modal-content-small');
    modalClose.setAttribute('id', 'modalCloseSmall');
});

okayBtn.addEventListener('click', closeAllModals);

helpBtn.addEventListener('click', () => {
    modal.hidden = false;
    modal_help.hidden = false;
    document.querySelector('main').style.overflow = 'hidden';
});

wframeBtn.addEventListener('click', () => {
    window.open('wframe-&-styles.html', '_blank');
})

// Close all Modals

function closeAllModals() {
    modal.hidden = true;
    modalClose.removeAttribute('id');
    modal_welcome.hidden = true;
    modal_recipe.hidden = true;
    modal_help.hidden = true;
};

modalClose.addEventListener('click', () => {
    closeAllModals();
});

modalWrap.addEventListener('click', () => {
    closeAllModals();
});

for (let i = 0; i < 6; i++) {
    
    card[i].addEventListener('click', () => {
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


searchButton.addEventListener('click', nullSearchQuery);

function nullSearchQuery() {
    noResults.hidden = false;
    cards.hidden = true;
    title.innerHTML = 'Search Results';
}

noResultsBtn.addEventListener('click', () => {
    noResults.hidden = true;
    cards.hidden = false;
    title.innerHTML = 'All Recipes';
    searchInput.value = '';
});

function replaceString() {
    document.body.innerHTML = document.body.innerHTML.replace(/with/g, 'w/');
}