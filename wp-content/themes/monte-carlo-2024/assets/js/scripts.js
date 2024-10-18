// VEDNOR SCRIPTS
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
//import { SplitText } from "gsap/SplitText";
import Swiper, {Autoplay, Navigation} from 'swiper';
import Isotope from "isotope-layout";
//require('isotope-cells-by-column');

gsap.registerPlugin(ScrollTrigger);

// Modules 
//import { pageTransitions } from "./modules/page-transitions";
import { headerNavComp } from './modules/comp-header-nav';
import { carouselBlock } from './blocks/carousel';
import McCarousel from './blocks/mc-carousel';
//import { heroBlock } from './blocks/hero';
import { logoLayoutComp } from "./modules/comp-logo-layout";

// Pages
import { blogPage } from "./pages/blog";
import { homePage } from './pages/home';
import { integrationsPage } from "./pages/integrations";
import { eventsPage } from "./pages/events";
import { webinarsPage } from "./pages/webinars";

(function($, window, document) {
  
  const $body = $('body');
  
  let mm = gsap.matchMedia();
  
  /***************************************************************
    *
    LISTEN FOR JQUERY DOM READY
    *
  ***************************************************************/

  $(function() {
    
    /***************************************************************
      Prevents transitions from animating on initial load
    ***************************************************************/
    
    $body.removeClass("preload");
    
    //pageTransitions(imagesLoaded, gsap, SplitText);
        
    /***************************************************************
      Smooth scroll
    ***************************************************************/
    
    if ($('a[href*="#"]').length) {
      // Select all links with hashes
      $('a[href*="#"]')
      // Remove links that don't actually link to anything
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        // On-page links
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
          && 
          location.hostname == this.hostname
        ) {
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top - 85
            }, 1000, function() {
              // Callback after animation
              // Must change focus!
              var $target = $(target);
              $target.focus();
              if ($target.is(":focus")) { // Checking if the target was focused
                return false;
              } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
              };
            });
          }
        }
      });
    }

    /***************************************************************
      MAIN
    ***************************************************************/

    headerNavComp(gsap);
    //heroBlock(gsap, SplitText);
    carouselBlock(gsap);
    logoLayoutComp(gsap);
    McCarousel();
    
    if ($('body.blog').length || $('body.category').length || $('body.search').length) blogPage(Swiper, Navigation,);
    if ($('.post-type-archive-events').length) eventsPage(Isotope);
    if ($('.post-type-archive-webinars').length) webinarsPage(Isotope);
    if ($('.product-template-page-integrations').length) integrationsPage(Isotope);
    if ($('.home').length) homePage(gsap, ScrollTrigger, Swiper, Autoplay, Navigation);
    
  });

})(window.jQuery, window, document);
