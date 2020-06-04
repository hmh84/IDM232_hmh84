$( document ).ready(function() {

const modal_close_button = document.querySelector('.modal-close');
const modal_video = document.querySelector('#modal-video');
const how_to_img = document.querySelector('#how-to-img');
const how_to_card = document.querySelector('#how-to-info');

if (modal_close_button) {
    modal_close_button.addEventListener('click', hide_video_modal);
}

function hide_video_modal() {
    modal_close_button.style.display = "none";
    modal_video.style.display = "none";
}


function show_video_modal() {
    modal_close_button.style.display = "block";
    modal_video.style.display = "flex";
}

const video_icon = document.querySelector('#video-icon');

if (video_icon) {
    how_to_img.addEventListener('click', show_video_modal);
    video_icon.addEventListener('click', show_video_modal);
    
    function video_icon_check() {
        var w = (how_to_img.offsetWidth) /2;
        var h = (how_to_img.offsetHeight) /2;
        
        var w_offset = (w - 40);
        var h_offset = (h - 40);
        
        video_icon.style.transform = "translate("+w_offset+"px,"+h_offset+"px)";
    }
    
    window.onload = video_icon_check;
    window.onresize = video_icon_check;
}

    // End of JS
    
});