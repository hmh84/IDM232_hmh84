$( document ).ready(function() {

        // CMS Form

        // const form_clear = document.querySelector('#form-clear');
        // const form_inputs = document.getElementsByTagName('label');
        // console.log(form_inputs);
    
        // form_clear.addEventListener('click', () => {
        //     for (let i = 0; i < form_inputs.length; i++) {
        //         form_inputs[i].value = null;
        //     };
        // })

    // Header Functions
    
    const header_menu_link = document.querySelector('#header-menu-link');
    
    const menu_continue_button = document.querySelector('#menu-continue-button');
    
    const logo_text = document.querySelectorAll('.logo-text');
    const cards = document.querySelector('#cards');
    const card = document.querySelectorAll('.card');
    const title = document.querySelector('#title');
    
    for (let i = 0; i < logo_text.length; i++) {
        logo_text[i].addEventListener('click', () => {
            location.reload();
            return false;
        });
    };
    
    header_menu_link.addEventListener('click', () => {
        showModal();
        modal_menu.style.display = "flex";
        modal_close_button.style.display = "none";
        setTimeout(function(){
            modal_menu.style.top = "50vh"
            },250);
    });
    
    // Modal
    
    const modal_backdrop = document.querySelector('#modal-backdrop');
    const modal_container = document.querySelector('#modal-container');
    const modal_close_button = document.querySelector('.modal-close');
    
    const modal_menu = document.querySelector('#modal-menu');
    
    function closeAllModals() {
        modal_menu.style.top = "-20vh"
        hideModal();
        setTimeout(function(){
            modal_menu.style.display = "none";
            modalCloseButtonCheck();
        },250);
    };
    
    function showModal() {
        modal_backdrop.style.display = "flex";
        modal_container.style.display = "flex";
        modal_close_button.style.display = "flex";
        document.querySelector('#html').style.overflowY = "hidden";
        setTimeout(function(){
            modal_backdrop.style.opacity = ".9";
            modal_close_button.style.top = "1rem";
            modal_container.style.top = "0";
            modalCloseButtonCheck();
        },250);
    }
    
    function hideModal() {
        modal_backdrop.style.opacity = "0";
        modal_close_button.style.top = "105%";
        modal_container.style.top = "100%";
        setTimeout(function(){
            modal_backdrop.style.display = "none";
            modal_container.style.display = "none";
            modal_close_button.style.display = "none";
            document.querySelector('#html').style.overflowY = "auto";
            },250);
    }
    
    menu_continue_button.addEventListener('click', closeAllModals);
    modal_close_button.addEventListener('click', closeAllModals);
    // modal_recipe.addEventListener('click', closeAllModals);
    // Need to get rid of behind modal clicking
    
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
            footer.style.position = 'fixed';
            footer.style.bottom = '0';
            footer.style.left = '0';
        }
    }
    
    window.onresize = modalCloseButtonCheck;
    window.onresize = footerCheck_pushDown;
    
    function modalCloseButtonCheck() {
        if (viewportWidth <= 848) {
            modal_close_button.style.top = "1rem";
            modal_close_button.style.right = "1rem";
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
        if (evt.keyCode == 27) {
            // Keys (27 = ESC)
                event.preventDefault();
                closeAllModals();
        }
    };
    
    document.onkeyup = function(evt) {
        evt = evt || window.event;
        if (evt.keyCode == 90) {
            // Keys (27 = P)
                // event.preventDefault();
        }
    };
    
    // Range Slider
    
    function getVals(){
        // Get slider values
        var parent = this.parentNode.parentNode;
        var slides = parent.getElementsByTagName("input");
        var slide1 = parseFloat( slides[0].value );
        var slide2 = parseFloat( slides[1].value );
        // Neither slider will clip the other, so make sure we determine which is larger
        if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
        
        var displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "Cook Times: "+slide1+" - "+ slide2+" mins";
    }
    
    window.onload = function(){
        // Initialize Sliders
        var sliderSections = document.getElementsByClassName("range-slider");
        for( var x = 0; x < sliderSections.length; x++ ){
            var sliders = sliderSections[x].getElementsByTagName("input");
            for( var y = 0; y < sliders.length; y++ ){
                if( sliders[y].type ==="range" ){
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    }
    
    // End of JS
    
    });