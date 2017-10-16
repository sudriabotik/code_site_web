(function ($) {
  $(document).ready(function(){
    
  // hide .navbar first
  $('.navbar').addClass('shrink');
    // fade in .navbar
  $(function () {
    $(window).scroll(function () {
            // set distance user needs to scroll before we fadeIn navbar
      if ($(this).scrollTop() > 5) {
        $('.navbar').removeClass('shrink');
      } else {
        $('.navbar').addClass('shrink');
      }
    });

  
  });

});
  }(jQuery));