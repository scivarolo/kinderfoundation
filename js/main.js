jQuery(document).ready(function() {
  
  jQuery('.home-slippry').slippry({
    pager: false,
    controls: false,
    transition: 'fade',
    autoHover: false,
    speed: 1750,
    start: 'random'
  });
  
  jQuery('.entry-slippry').slippry({
    pager: false,
    transition: 'fade'
  });

});