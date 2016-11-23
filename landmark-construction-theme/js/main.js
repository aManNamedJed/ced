(function($) {
    "use strict";
 
  // Header Fixed
  // ---------------

  function fixedhead() {
    
    if ( $('.header-fixed').length) {
      $('.bliccaThemes-waypoint').css('marginTop', $('.bliccaThemes-header').outerHeight(true) );
    }  
    var head = $( '#landmark_construction_theme_header' );
    var wayoffset = '-1px';
    
    $( '.bliccaThemes-waypoint' ).each( function(i) {
        var el = jQuery( this ),
            animClassDown = el.data( 'animateDown' ),
            animClassUp = el.data( 'animateUp' );
     
        el.waypoint( function( direction ) {
            if( direction === 'down' && animClassDown ) {
                
                $( "#landmark_construction_theme_header" ).toggleClass( "off-sticky on-sticky");
                
            }
            else if( direction === 'up' && animClassUp ){
                $( "#landmark_construction_theme_header" ).toggleClass( "on-sticky off-sticky");
            }
        }, { offset: wayoffset } );
    } );

    }
  
   // Google Maps Enable On Click
  // ====================== 
  
  $('.maps').click(function () {
    $('.maps iframe').css("pointer-events", "auto");
  });
  $('.maps').mouseleave(function() { $('.maps iframe').css("pointer-events", "none"); });

  // Dropdown
  //----------
  function landmark_construction_theme_themes_dropdown() {
      var browser_width = $( window ).width();
      
      $( '.menu-item-has-children' ).each( function() {
          $(this).addClass('dropdown');
      });
      if ( browser_width > 992 ) {
        $('ul.nav li.dropdown').hover(function() {
          $(this).find('>.dropdown-menu').stop(true, true).delay(0).fadeIn(150);
        }, function() {
          $(this).find('>.dropdown-menu').stop(true, true).delay(0).fadeOut(150);
        });
      }
    
      $('.responsive-navigation-button').click(function () {
        $('.responsive-menu-container').toggleClass("open-responsive-menu");
      });
    
      $('.responsive-menu-container .dropdown-icon').click(function (event) {
        event.preventDefault();
        $(this).parent().next(".sub-menu").toggle();
      });     
  }
  // Mega Menu
  //----------
  function landmark_construction_theme_megamenu() {
    $( ".multi .dropdown-menu .dropdown-menu" ).removeClass( "dropdown-menu" );
  
    $( '.multi' ).each( function() {
       var mcolor = $(this).data('mega-bc');
       var mbackground = $(this).data('mega-bg');
       if ( mbackground == "" ) { mbackground = "none"; }
       else { mbackground = 'url(' + mbackground + ')'; }
       var mrepeat = $(this).data('mega-br');
       var mposition = $(this).data('mega-bp');
       var mpadding = $(this).data('mega-padding');
       if ( mpadding == "" ) { mpadding = 0; }
       $( this ).children("ul").css({
         "background-color": mcolor,
         "background-image": mbackground,
         "background-repeat": mrepeat,
         "background-position": mposition,
         "padding-bottom": mpadding
       });

    });
  }
  
  //
  // Minimal Menu 
  //
  
  $('.minimal-menu-button').click(function () {
    $('.minimal-menu-button .fa-bars').toggle();
    $('.minimal-menu-button .fa-times').toggle();
    $('.header-minimal').toggleClass("opened-minimal-menu");
  }); 

  //
  // Extra Menu
  //
  $('.extra-menu-nav').click(function () {
    $('.extra-menu-container').fadeToggle();
  }); 

  $('.extra-close').click(function () {
    $('.extra-menu-container').fadeToggle();
  });
  //
  // Header Widget Fix
  //
  
  function landmark_construction_theme_header_widget_fix() {
    if ( $(".bliccaThemes-header.header-classic").length>0 ) {
    var header_height = $(".bliccaThemes-header .collapse").outerHeight();
    $(".bt-after-navigation").css("height", header_height);
    }
    else {
      $(".center-logo-area").imagesLoaded( function(){                  
      var header_height = $(".bliccaThemes-header .nav.navbar-nav").outerHeight();
      var logoarea = $(".center-logo-area .logo").outerHeight(); 
      $(".bt-after-navigation").css("height", header_height);
      $(".bt-before-logo").css("height", logoarea); 
      $(".bt-after-logo").css("height", logoarea); 
      }); 
    }
  }
  
  // 
  // Post Slider
  // ======================
  function landmark_construction_theme_themes_postslider() {
    $(".bt-blog-gallery .slides").each( function() {  
      var bt_arrow=true;
      var bt_dots =false;
      if ( $(this).data('slide-style') == true ) {
        bt_arrow=false;
        bt_dots = true;
      }
      $(this).slick({
          autoplay: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: bt_arrow,
          speed: 500,
          dots: bt_dots,
          infinite: true,
          adaptiveHeight: true
     });
      
    });
  }
  

  // Instagram
  
  function landmark_construction_theme_themes_instagram() {
    $('.instagram-slider').flexslider({
        selector: ".instagram-pics > .instagram-pic", 
        controlNav: false,             
        directionNav: true,
        smoothHeight: true, 
        animation: "fade",
        animationLoop: true,
        itemWidth: 250,
        itemMargin: 0,
        minItems: 1,
        maxItems: 1,
        move: 1,
        prevText: "",
        nextText: ""
    });    
    
  }

  function landmark_construction_theme_themes_testimonial() {
    $(".bt_testimonials_slider_wrap").each( function() {  
    var datawidth = $(this).data('width');
    var datacontrol = $(this).data('control');
    var datanav = $(this).data('nav');    

      $(this).slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: datanav,
          speed: 500,
          dots: datacontrol,
          infinite: true,  
          autoplay: true,
          adaptiveHeight: true
     });
      
    });
  }  

  function landmark_construction_theme_demo_slider() {
     

      $(".demos-container").slick({
          slidesToShow: 8,
          slidesToScroll: 8,
          arrows: false,
          speed: 500,
          dots: false,
          infinite: true,  
          autoplay: true,
          adaptiveHeight: true,
          variableWidth: true,
          swipeToSlide: true,
          autoplaySpeed: 1000
     });
      
   
  }    
  
  function landmark_construction_theme_new_clients() {
      $(".bt_clients_slider.aktif_slider").each( function() {
        var btslidesToScroll = $(this).data('btslidesToScroll');
        var btslidesToShow = $(this).data('btslidesToShow'); 
        var btarrows = $(this).data('btarrows');
        var btdots = $(this).data('btdots');
        var sliderClass = $(this).find(".slides");
        if ( btslidesToShow != 0 ) {
          sliderClass.slick({
          slidesToShow: btslidesToShow,
          slidesToScroll: 6,
          arrows: btarrows,
          dots: btdots, 
          variableWidth:true,
          infinite: true,  
          autoplay: true
          });
          }
      });   
  }
  
  function landmark_construction_theme_related_posts() {
     $(".bt-related-1 .related-box").slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
          infinite: true,  
          variableWidth: true,
          autoplay: true
          });    
     $(".bt-related-2 .related-box").slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true,
          dots: false,
          infinite: true,  
          variableWidth: true,
          autoplay: true
          });     
  }
  function landmark_construction_theme_countdown() {
  if ( $(".count-down").length ) {
  
    $(".bt-event .count-down").each( function() {
        
        // set the date we're counting down to
        var target_date = new Date($(this).data('countdown')).getTime();
         
        // variables for time units
        var days, hours, minutes, seconds, counttext;
        
        
        // get tag element
        var countdown = $(this);
         
        // update the tag with id "countdown" every 1 second
        setInterval(function () {
         
            // find the amount of "seconds" between now and target
            var current_date = new Date().getTime();
            var seconds_left = (target_date - current_date) / 1000;
         
            // do some time calculations
            days = parseInt(seconds_left / 86400);
            seconds_left = seconds_left % 86400;
             
            hours = parseInt(seconds_left / 3600);
            seconds_left = seconds_left % 3600;
             
            minutes = parseInt(seconds_left / 60);
            seconds = parseInt(seconds_left % 60);
             
            // format countdown string + set tag value
            countdown.html('<div class="count-box"><p>' + days + ' <span>days</span> ' + hours + ' <span>hours</span> '
            + minutes + ' <span>minutes</span> ' + seconds + '</p></div>');
         
        }, 1000);     
    });
    
  }
  }  
  // Masonry Portfolio
  // ======================
function portfolio_masonry() {
    var container = $ ( "#portfolio-style13" );
  
    container.imagesLoaded( function(){ 
          container.isotope({
            // main isotope options
            itemSelector: '.portfolio-item',
            percentPosition: true,        
            // options for masonry layout mode
            masonry: {
                columnWidth: '.portfolio-sizer',
                transitionDuration: '0.8s',
                gutter: '.portfolio13-gutter'
                }
            });
          }); 
} 
  
function portfolio_masonry2() {
  
    var container = $("#portfolio-style21");
  
    container.imagesLoaded( function(){ 
          container.isotope({
            // main isotope options
            itemSelector: '.portfolio-item',
            percentPosition: true,        
            // options for masonry layout mode
            masonry: {
                columnWidth: '.portfolio21-sizer',
                transitionDuration: '0.8s',
                gutter: 0
                }
            });
          }); 
}  
  
  // IMAGE GALLERY
  // ======================
function bt_image_gal() {  
    var container = $ ( "#bt_image_masonry_gal" );
  
    container.imagesLoaded( function(){ 
          container.isotope({
            // main isotope options
            itemSelector: '.bt_image_masonry-item',
            percentPosition: true,        
            // options for masonry layout mode
            masonry: {
                columnWidth: '.bt_image_masonry-sizer',
                transitionDuration: '0.8s',
                gutter: '.bt_image_masonry-gutter'
                }
            });
          });
}   
  // SOCIAL SHARE
  // ======================
  function landmark_construction_theme_themes_share() {
 
  $('.blog-widget-share').click(function() {
  var socialsdiv = $(this).children(".socials-share");
        
  socialsdiv.toggle("fast");
  });
    
  $( document ).on("click", ".facebook-share", function(){
      var url = $(this).attr('data-url');
      window.open( 'https://www.facebook.com/sharer/sharer.php?u='+url, "Facebook", "height=400,width=680,scrollbars=0,resizable=0,menubar=0,toolbar=0,status=0,location=0" );
      return false;
  });
  
  $( document ).on("click", ".twitter-share", function(){
      var url = $(this).attr('data-url'),
      title = $(this).attr('data-title');
      window.open( 'http://twitter.com/home?status='+title+' '+url, "Twitter", "height=400,width=680,scrollbars=0,resizable=0,menubar=0,toolbar=0,status=0,location=0" );
      return false;
  });
  
  $( document ).on("click", ".google-share", function(){
      var url = $(this).attr('data-url');
      window.open( 'https://plus.google.com/share?url='+url, "GooglePlus", "height=600,width=680,scrollbars=0,resizable=0,menubar=0,toolbar=0,status=0,location=0" );
      return false;
  });
    
  $( document ).on("click", ".pinterest-share", function(){
      var url = $(this).attr('data-url'),
      image = $(this).attr('data-img'),
      title = $(this).attr('data-title');
      window.open( 'http://pinterest.com/pin/create/button/?url=' + url + '&media=' + image + '&description=' + title, "Pinterest", "height=320,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" );
      return false;
  });
    
  $( document ).on("click", ".tumblr-share", function(){
      var url = $(this).attr('data-url'),
          title = $(this).attr('data-title');
      var newurl = url.split("http://");
      window.open( 'http://tumblr.com/share?s=&v=3&t=' + title + '&u=' + newurl[1] );
      return false;
  });

  $( document ).on("click", ".stumbleupon-share", function(){
      var url = $(this).attr('data-url'),
          title = $(this).attr('data-title');

      window.open( 'http://www.stumbleupon.com/submit?url=' + url + '&title=' + title );
      return false;
  });

  $( document ).on("click", ".linkedin-share", function(){
      var url = $(this).attr('data-url'),
          title = $(this).attr('data-title');

      window.open( 'http://www.linkedin.com/shareArticle?url=' + url + '&title=' + title );
      return false;
  });     
    
  } 


  // ANIMATION
  // ======================
  function landmark_construction_theme_animation() {
     var myclasses;
     var myclass;
     var ekclass;
     $('.blind').waypoint(function() {
     myclasses = this.className;
     myclass = myclasses.split(" ");
     ekclass = myclass[0].split("-");
      if ( ekclass[0] !== "no_animation" && myclass[1] === "blind") {
                  $(this).addClass('v '+ekclass[0]);
                                                     }
  }, { offset: '70%' });
  }


  // Counter
  // =======
  
  function landmark_construction_theme_counter() {

       $('.bliccaThemes-count>.timer').waypoint(function() {
       $('.timer').countTo();
       }, { offset: '90%', triggerOnce: true });
      
  }

  // Tooltip
  $( ".bt_tooltip" ).each(function() {    
    var btwidth = $(this).children(".bt_tooltip_hover").outerWidth();
    btwidth = -(btwidth/2);
    $(this).children(".bt_tooltip_hover").css("margin-left",btwidth);
  });   
  // Meet Team Tabs and Toggle
  function landmark_construction_theme_meet_team () {
  $( ".bt_meet_team_tabs_content" ).each(function() {    
    $(this).children(":first").addClass("aktif");
  });  
  $( ".bt_meet_team_tabs .bt_team_member" ).click(function() {
    var tab_id = $(this).attr("ID");
    var content = tab_id.split("-tab");
    $(this).closest(".bt_meet_team_tabs_photos").find(".bt_team_member.aktif").removeClass("aktif");
    $(this).addClass("aktif");
    $(this).closest(".bt_meet_team_tabs").find(".bt_team_tab_content.aktif").removeClass("aktif").css("display", "none");
    $( ".bt_meet_team_tabs_content .bt_team_tab_content:nth-child("+content[1]+")" ).show( "slow", function() {
      $(this).addClass("aktif");
    });
  });

  var $team_overlay = $(".team_overlay").hide();
  $(".socialbutton").on("click", function(e){
    $(this).toggleClass("expanded");
    $(this).prev(".team_overlay").fadeToggle(300);
  });

  }
  
  // Progress Bar 

  $( '.bt_progress_1 .vc_single_bar' ).each( function() {
     var pheight = $(this).find(".vc_bar").data("value");
     var pcolor = $(this).find(".vc_bar").css("backgroundColor");
     $(this).find(".vc_label_units").css({
       "left":pheight+"%",
       "border-color":pcolor,
       "color":pcolor
     });
  });

  $( '.bt_progress_2 .vc_single_bar' ).each( function() {
     var pheight = $(this).find(".vc_bar").data("value");

     $(this).find(".vc_label_units").css({
       "left":pheight+"%"
     });
  });

  $( '.bt_progress_3 .vc_single_bar' ).each( function() {
     var pheight = $(this).find(".vc_bar").data("value");

     $(this).find(".vc_label_units").css({
       "left":pheight+"%"
     });
  });

  $( '.bt_progress_7 .vc_single_bar' ).each( function() {
     var pheight = $(this).find(".vc_bar").data("value");

     $(this).find(".vc_label_units").css({
       "left":pheight+"%"
     });
  });
  
  // Twitter Slider
  // ==============
  
    function landmark_construction_theme_twitter_slider() {
    $(".twitter_slider").each( function() {      

      $(this).slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          speed: 500,
          autoplay: true,
          dots: false,
          infinite: true
     });
      
    });
   }
 
  //
  // WoocommerceQuantiy
    $( document ).on( 'click', '.plus, .minus', function() {

    // Get values
    var $qty    = $( this ).closest( '.quantity' ).find( '.qty' ),
      currentVal  = parseFloat( $qty.val() ),
      max     = parseFloat( $qty.attr( 'max' ) ),
      min     = parseFloat( $qty.attr( 'min' ) ),
      step    = $qty.attr( 'step' );

    // Format values
    if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
    if ( max === '' || max === 'NaN' ) max = '';
    if ( min === '' || min === 'NaN' ) min = 0;
    if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

    // Change the value
    if ( $( this ).is( '.plus' ) ) {

      if ( max && ( max == currentVal || currentVal > max ) ) {
        $qty.val( max );
      } else {
        $qty.val( currentVal + parseFloat( step ) );
      }

    } else {

      if ( min && ( min == currentVal || currentVal < min ) ) {
        $qty.val( min );
      } else if ( currentVal > 0 ) {
        $qty.val( currentVal - parseFloat( step ) );
      }

    }

    // Trigger change event
    $qty.trigger( 'change' );

  });  
  
  // Scroll to
  // ============
  $(window).scroll(function(){
    if ($(this).scrollTop() > 1000) {
      $('.demos-top').fadeIn();
      $('.demos-top').css("right","5px");
      $('.demos-button').css("right","65px");
    } else {
      $('.demos-top').fadeOut();
      $('.demos-top').css("right","-58px");
      $('.demos-button').css("right","5px");      
    }
  });
  
  //Click event to scroll to top
  $('.demos-top').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
    
  
  // Load Function
  // ====================== 
  $(window).load(function() {
      landmark_construction_theme_meet_team();
      landmark_construction_theme_themes_instagram();
  });
  
  // READY FUNCTION
  // ====================== 
  $(document).ready(function(){
    $( ".demos-button" ).click(function() {
      $(".demos-menu").addClass("openupmenu");
    });
    $( ".close-demos" ).click(function() {
      $(".demos-menu").removeClass("openupmenu");
    });
    landmark_construction_theme_demo_slider();    
    landmark_construction_theme_header_widget_fix();
    landmark_construction_theme_related_posts();
    landmark_construction_theme_themes_postslider(); 
    landmark_construction_theme_twitter_slider();
    landmark_construction_theme_new_clients();
    landmark_construction_theme_themes_testimonial();
    if ( jQuery( window ).width() > 1023 ) { 
    landmark_construction_theme_animation();
    }
    fixedhead();
    landmark_construction_theme_megamenu();
    landmark_construction_theme_counter();
    $( ".bliccaThemes-search-container" ).click(function() {
      $( ".bliccaThemes-header-search" ).toggleClass( "acik" );
    });
    $( ".searchOffOn" ).click(function() {
      $( ".bliccaThemes-header-search" ).toggleClass( "acik" );
    });    
    portfolio_masonry();
    portfolio_masonry2();
    bt_image_gal();
    landmark_construction_theme_themes_dropdown();
    landmark_construction_theme_themes_share();
    // Comment Class
    $('#commentrespond input#submit').addClass('buton buton_rounded_corners buton-3 buton-small');

    $("a[data-rel^='prettyPhoto']").prettyPhoto({
    social_tools: ''
    });
    if ( jQuery( window ).width() > 992 ) {     
    landmark_construction_theme_countdown();
    }
    

  });
  
})(jQuery);