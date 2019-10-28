(function($) {
  showSuccessToast = function(text) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Success',
      text: text,
      showHideTransition: 'slide',
      icon: 'success',
      position: {
        right: 3,
        top: 63
      },
      loaderBg: '#ffffff',
      hideAfter: 7000, 
    })
  };

  showErrorToast = function(text) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Error',
      text: text,
      showHideTransition: 'slide',
      icon: 'error',
      position: {
        right: 3,
        top: 63
      },
      loaderBg: '#ffffff',
      hideAfter: 7000, 
    })
  };

  resetToastPosition = function() {
    $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
    $(".jq-toast-wrap").css({
      "top": "",
      "left": "",
      "bottom": "",
      "right": ""
    }); //to remove previous position style
  }
})(jQuery);