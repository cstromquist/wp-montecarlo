const homePage = (gsap, ScrollTrigger, Swiper, Autoplay, Navigation) => {

  Swiper.use([Autoplay, Navigation]);
  
  const mediaQuery = window.matchMedia('(min-width: 768px)');
  const home = document.querySelector('.home');

  /*******
   * Hero
   *******/
  let mouseParallaxItems = [];
  mouseParallaxItems.push({
    el: document.querySelector('.hero .bg-image.back.left'),
    resistance: 150
  });
  mouseParallaxItems.push({
    el: document.querySelector('.hero .bg-image.front.left'),
    resistance: 50
  });
  mouseParallaxItems.push({
    el: document.querySelector('.hero .bg-image.back.right'),
    resistance: 150
  });
  mouseParallaxItems.push({
    el: document.querySelector('.hero .bg-image.front.right'),
    resistance: 50
  });
  const introParallaxMouseMove = (event) => {
    mouseParallaxItems.forEach((item) => {
        gsap.to(item.el, { duration: 1,
            x: ((event.clientX - window.innerWidth / 2) / item.resistance * 0.75),
            y: ((event.clientY - window.innerHeight / 2) / item.resistance)
        });
    });
  }
  window.addEventListener("mousemove", introParallaxMouseMove);

  //setTimeout(() => {
  //  const heroTitle = new SplitText('.hero h1', { types: 'chars' });
  //  const heroSubTitle = new SplitText('.hero p', { types: 'words' });
  //  const heroImages = document.querySelectorAll('.hero img');

  //  const heroEntranceAnimation = gsap.timeline({ 
  //    delay: 0.5, 
  //    onComplete: ()=> {
  //      heroTitle.revert();
  //      heroSubTitle.revert();
  //    } 
  //  });

  //  heroEntranceAnimation.set([
  //    document.querySelector('.hero h1'), 
  //    document.querySelectorAll('.hero p'), 
  //    document.querySelector('.hero a.btn'), 
  //  ], { opacity:1 });

  //  heroEntranceAnimation.set(heroImages, {
  //    y: 15
  //  });

  //  heroEntranceAnimation.from(heroTitle.chars, {
  //    y: 80, stagger: 0.02, duration: 0.2, ease: "circ.out",
  //  });

  //  heroEntranceAnimation.from(heroSubTitle.words, {
  //    y: 80, stagger: 0.02, duration: 0.35, ease: "circ.out",
  //  },"<+=0.35");

  //  heroEntranceAnimation.from('.hero .cta-container', {
  //    autoAlpha:0, duration: 0.35, y:35, ease: "circ.out",
  //  },"<+=0.45");
  //  heroEntranceAnimation.to(heroImages, {
  //    autoAlpha:1, duration: 0.35, stagger: 0.045, y:0, ease: "circ.out",
  //  },"-=0.15");
  //}, 600);

  const heroAngleTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: ".hero",
      start: "top top",
      //end: "+=300",
      end: "bottom top",
      scrub: 1,
      //markers: true
    }
  });

  heroAngleTimeline.to(home, { "--heroAngleRotate":'-5deg', "--heroAngleTransformY":'-10%', duration: 1 })


  /*******
   * Card Callouts
   *******/
  const cardCallouts = document.querySelectorAll('.card-container .card');
  const cardCalloutTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: ".card-callouts",
      start: "top bottom",
      end: "top 40%",
      scrub: 1,
    }
  })
  cardCallouts.forEach( (card, index) => {
    cardCalloutTimeline.from(card, { autoAlpha:0, y:50, duration: 1 }, "-=0.5");
  });


   /*******
   * Data Observability
   *******/
  const observabilityTitle = document.querySelectorAll('.observability h2');
  const observabilityText = document.querySelectorAll('.observability .content');
  const observabilityImage = document.querySelectorAll('.observability .img img');
  const observabilityTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: ".observability .callout-container",
      start: "top 80%",
      end: "+=400",
      scrub: 1,
    // markers: true
    }
  });
  observabilityTimeline.from(observabilityTitle, { autoAlpha:0, x:-35, duration: 1 })
  observabilityTimeline.from(observabilityText, { autoAlpha:0, x:-35, duration: 1 }, "-=0.5");
  observabilityTimeline.from(observabilityImage, { autoAlpha:0, y:35, duration: 1 }, "-=0.5");


  /*******
   * Accordion Carousel
   *******/
  //if( mediaQuery.matches ) {
    const carouselItems = document.querySelectorAll('.block-carousel-block ul.list li');
    const carouselLength = carouselItems.length;
    const carouselItemDuration = 400;
    const carouselBookendDuration = 300;
    const carouselDuration = (carouselLength - 2) * carouselItemDuration + carouselBookendDuration * 2;


    const gsapMM = gsap.matchMedia();
    gsapMM.add("(min-width: 768px)", () => { 

      const carouselTimeline = gsap.timeline({
        scrollTrigger: {
          trigger: ".block-carousel-block .bg-ocean .inner-container",
          pin: true,
          start: "center center",
          end: "+=" + carouselDuration,
          anticipatePin: 0.5,
          scrub: 0,
          //markers: true
        }
      });

      carouselItems.forEach( (item, index) => {
        let duration = 1;
        if( index === 0 || index === carouselItems.length - 1) {
          duration = 0.75
        }

        carouselTimeline.to(item, { 
          duration: duration,
          onComplete: () => { 
            const nextItem = item.nextElementSibling;
            if(nextItem) {
              nextItem.querySelector('button').click();
            }
          },
          onReverseComplete: () => {
            const prevItem = item.previousElementSibling;
            if(prevItem) {
              prevItem.querySelector('button').click();
            }
          }
        });
      });
    });

  //}

  //const home = document.querySelector('.home');
  const accordionAngleTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: ".bg-ocean",
      start: "top 90%",
      end: "+=400",
      scrub: 1,
      //pinnedContainer: '.home-main',
      //markers: true
    }
  });
  accordionAngleTimeline.from(home, { "--accordionAngleRotate":0, "--accordionAngleTransformY":0, duration: 1 })


  
  /*******
   * Testimonial Carousel (Swiper)
   *******/
  const swiper = new Swiper(".swiper", {
    slidesPerView: 1,
    spaceBetween: 41,
    speed: 1000,
    autoHeight: false,
    autoplay: {
      delay: 5500,
    },
    loop: true,
    centeredSlides: true,
    breakpoints: {
      768: {
        slidesPerView: 1.25,
      },
      1440: {
        slidesPerView: 1.3,
        spaceBetween: 50,
      },
      1800: {
        slidesPerView: 1.5,
      }
    },
    on: {
      afterInit: function (swiper) {

        setTimeout(() => {
          var index = swiper.realIndex,
              slide = $('.testimonials .item[data-swiper-slide-index="' + index + '"]').attr('data-industry');
          if( slide !== undefined ) {
            document.querySelector('.quote-industry').innerHTML = slide;
          }
        }, 300);

      },
      slideChangeTransitionStart: function (swiper) {
        
        var index = swiper.realIndex,
            slide = $('.testimonials .item[data-swiper-slide-index="' + index + '"]').attr('data-industry');
        if( slide !== undefined ) {
          document.querySelector('.quote-industry').innerHTML = slide;
        }
        
      }
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  const testimonialAngleTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: ".testimonials",
      start: "bottom 90%",
      end: "+=300",
      scrub: 1,
      //pinnedContainer: '.home-main',
      //markers: true
    }
  });
  testimonialAngleTimeline.from(home, { "--testimonialAngleRotate":0, "--testimonialAngleTransformY":0, duration: 1 })

};

export {
  homePage
};