vid = document.getElementById("vid");
vid.disablePictureInPicture = true;

const hero_itself = document.querySelector('#hero');
const hero_img = document.querySelector('#hero-img');

window.onresize = headerCheck;
window.onload = initCheck;

function initCheck() {
    headerCheck();
    window.scrollTo(0, 0);
}

function headerCheck() {
    var x = hero_img.clientHeight;
    hero_itself.style.height = x+'px';
    console.log(hero_itself.style.height);
}