jQuery(document).ready(function() {

  jQuery('.home-carousel').owlCarousel({
    items: 1,
    loop: true,
    animateOut: 'fadeOut',
    autoplay: true
  });

  jQuery('.entry-slippry').slippry({
    pager: false,
    transition: 'fade'
  });

});


