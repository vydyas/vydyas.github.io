/*
* © 2011 D MALAM
* MIT License
* Responsly.js Accordly jQuery Plugin
* Edit as needed
*/

/*jshint
            browser:  true,
            eqeqeq:   true,
            eqnull:   true,
            immed:    false,
            newcap:   true,
            nomen:    false,
            onevar:   false,
            plusplus: true,
            regexp:    true,
            undef:    true,
            white:    false */
  /*global  window, document, jQuery, $ */

(function( $ ){

  $.fn.accordy = function( options ) {
    var settings = $.extend({}, $.fn.accordy.defaults, options);

    return this.each(function(index, container) {
      //Add callback to (un)collpase
      $(container).find('section hgroup').click(function(e) {
        $(this).parent().siblings('section').removeClass('accordion_current');
        $(this).parent().toggleClass('accordion_current');
        e.preventDefault();
      });

      //Add the pointer before the header
      $(container).find('hgroup').each(function(index, container) {
          $(container).prepend('<span class="pointer">&#9654;</span>');
      });

      // Bind to keybord
      if (settings.useKeybord){

        var bind = function(e){
          var target = $(container);
          var current = target.find('section.accordion_current');

          if (e.keyCode === settings.keyPressUp){ //Up
            if (! target.find('section:eq(0)').hasClass('accordion_current') ){
              current.removeClass('accordion_current');
              current.prev().addClass('accordion_current');
              e.preventDefault();
            }
          }
          if (e.keyCode === settings.keyPressDown){ //Down
            if (! target.find('section:last').hasClass('accordion_current') ){
              current.removeClass('accordion_current');
              current.next().addClass('accordion_current');
              e.preventDefault();
            }
          }
        };

        if (settings.throttle)
          $(document).keydown($.throttle(settings.throttleTime, bind));
        else
          $(document).keydown(bind);
      }

    });
  };

  /* Options*/
  $.fn.accordy.defaults = {
      throttle: false, // Set to true, and include jQuery throttle plugin (http://benalman.com/projects/jquery-throttle-debounce-plugin/)
      throttleTime: 500, // number of ms to wait for throttling
      useKeybord: true, // use keys defined below to expand / collapse sections
      keyPressUp: 75, //K
      keyPressDown: 74 //J
      };
})( jQuery );
