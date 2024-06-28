jQuery(document).ready(function($){
  
    document.addEventListener('load', startNavs());

    function startNavs() {
      startJs();
      mainNavToggle();
      initiateNavSubmenuEventListener();
    }

    function startJs() {
      $('body').removeClass('no-js');  
    }

    function mainNavToggle() {
      var obj = {
        onClick: function() {
          $("#main-navigation").toggleClass("menu-open");
          $("#main-navigation").attr('aria-expanded', function(i, attr) {
              return attr == 'true' ? 'false' : 'true'
          });
          document.activeElement.blur();  
        }
      };
      $("button#nav-toggle").on("click", obj.onClick);
    }
    document.addEventListener('load', setNavAttr());
    window.addEventListener('resize', debounce(function(e) {
        setNavAttr();
    }, 200));

    function setNavAttr() {
        if (!checkNav()) {
            $("#main-navigation").removeAttr('aria-expanded');
        } else {
            if ($("#main-navigation").hasClass("menu-open")) {
                $("#main-navigation").attr('aria-expanded', 'true');
            } else {
                $("#main-navigation").attr('aria-expanded', 'false');
            }
        }
    };

    function checkNav() {
        var navStyle = $("#nav-toggle").css('display');
        if (navStyle == 'block') {
            return true;
        } else {
            return false;
        }
    }

    function initiateNavSubmenuEventListener() {
        var checkboxes = document.querySelectorAll("input[type=checkbox].toggle-sub-menu");
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener("click", navClick);
        }
    }

    function navClick(e) {
        if (e.target.checked) {
            $(".toggle-sub-menu").change(function() {
                $(".toggle-sub-menu").not(this).prop('checked', false);
            });
        }
    };

    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this,
                args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait || 200);
            if (callNow) func.apply(context, args);
        };
    };

    // prevent transistions during window resize
    // to stop nav menu randomly appearing and disappearing
    (function() { 
      const classes = document.body.classList;
      let timer = 0;
      window.addEventListener( 'resize', function () {
        if ( timer ) {
          clearTimeout( timer );
          timer = null;
        }
        else
          classes.add( 'stop-transitions' );

        timer = setTimeout( () => {
          classes.remove( 'stop-transitions' );
          timer = null;
        }, 100);
      });
    })();
});