$(document).foundation();


$('#slider').nivoSlider({
    effect: 'random',               // Specify sets like: 'fold,fade,sliceDown'
    slices: 15,                     // For slice animations
    boxCols: 8,                     // For box animations
    boxRows: 4,                     // For box animations
    animSpeed: 500,                 // Slide transition speed
    pauseTime: 3000,                // How long each slide will show
    startSlide: 0,                  // Set starting Slide (0 index)
    directionNav: true,             // Next & Prev navigation
    controlNav: false,               // 1,2,3... navigation
    controlNavThumbs: false,        // Use thumbnails for Control Nav
    pauseOnHover: true,             // Stop animation while hovering
    manualAdvance: true,           // Force manual transitions
    prevText: 'Prev',               // Prev directionNav text
    nextText: 'Next',               // Next directionNav text
    randomStart: false,             // Start on a random slide
    beforeChange: function(){},     // Triggers before a slide transition
    afterChange: function(){},      // Triggers after a slide transition
    slideshowEnd: function(){},     // Triggers after all slides have been shown
    lastSlide: function(){},        // Triggers when last slide is shown
    afterLoad: function(){}         // Triggers when slider has loaded
});


$(window).scroll(function(){
    if ($(window).scrollTop() >= 60) {
       $('.sticky-header').addClass('fixed');
       $('.sticky-header').removeClass('display');
    }
    else {
       $('.sticky-header').removeClass('fixed');
       $('.sticky-header').addClass('display');
    }
});

$(document).ready(function() {
    // Using default configuration

    // Using custom configuration
    $('#carousel').carouFredSel({
        items               : 2,
        direction           : "right",
        auto : false,
        prev : "#prev",
        next : "#next",
        scroll : {
            items           : 2,
            duration    : 1000,
            imeoutDuration : 2000,                   
            pauseOnHover    : true
        }                   
    });

    if ($(window).width() < 600) {

           // Using custom configuration
    $('#carousel').carouFredSel({
        items               : 1,
        direction           : "right",
        auto : false,
        prev : "#prev",
        next : "#next",
        scroll : {
            items           : 1,
            duration    : 1000,
            imeoutDuration : 2000,                   
            pauseOnHover    : true
        }                   
    });

}
else {
  
}

    $('.fancybox a').fancybox({
                        openEffect  : 'elastic',
                            closeEffect : 'elastic',
                            helpers     : {
                                title: {
                                    type: 'inside'
                                }
                            }
                    });

});

$(document).ready(function(){
 
        $(".slidingDiv").hide();
        $(".show_hide").show();
        $(".arrow-up").hide();
 
    $('.faqcontent').click(function(){
    $(this).next(".slidingDiv").slideToggle(500);
    $(this).find(".arrow-up, .arrow-down").toggle();
    return false;
    
    });
  
});


$('.bxslider').bxSlider({
  mode: 'fade',
});

