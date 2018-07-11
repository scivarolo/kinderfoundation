jQuery(document).ready(function() {

  jQuery('.home-carousel').owlCarousel({
    items: 1,
    loop: true,
    animateOut: 'fadeOut',
    autoplay: true,
    lazyLoad: true,
    lazyLoadEager: 1
  });
  jQuery('.block-carousel').owlCarousel({
    items: 1,
    loop: true,
    animateOut: 'fadeOut',
    autoplay: true,
    lazyLoad: true,
    lazyLoadEager: 1,
    nav: true,
    dots: false
  });
  jQuery('.sg__signature-slider').owlCarousel({
    items: 1,
    loop: true,
    animateOut: 'fadeOut',
    autoplay: true,
    lazyLoad: true,
    lazyLoadEager: 1,
    nav: true,
    dots: false
  });

  jQuery('.entry-slippry').slippry({
    pager: false,
    transition: 'fade'
  });

});

var videoiFrames = document.querySelectorAll('.sg__text-block iframe');

videoiFrames.forEach(function(videoiFrame){
  videoiFrame.parentElement.style.textAlign = "center";
});