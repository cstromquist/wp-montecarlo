const pageTransitions = (imagesLoaded, gsap, SplitText) => {
  
  var header = document.getElementById('header');
  var header2 = $('.blog-nav');

  header.classList.add('loaded');
  if (header2.length) {
    header2.addClass('loaded');
  }
  const heroBlockEls = document.querySelectorAll('.hero-item');
  const mainContent = $('section:not(.hero-item)');
  gsap.set(mainContent, {opacity: 0});
  
  if( heroBlockEls.length ) {

    heroBlockEls.forEach( (heroBlockEl) => {
      const heroTitle = heroBlockEl.querySelector('h1');
      const heroTitleSplit = heroTitle !== null ? new SplitText(heroTitle, { types: 'chars' }) : null;
      const heroSubTitle = heroBlockEl.querySelectorAll('.text p');
      const heroSubTitleSplit = heroSubTitle.length > 0 ? new SplitText(heroSubTitle, { types: 'words' }) : null;
      const heroImages = heroBlockEl.querySelectorAll('img');
      const heroCTA = heroBlockEl.querySelector('.cta');

      const heroEntranceAnimation = gsap.timeline({ 
        delay: 0.5, 
        onComplete: ()=> {
          gsap.to(mainContent, {duration: 0.6, opacity: 1});
          if( heroTitleSplit !== null ) {
            heroTitleSplit.revert();
          }
          if( heroSubTitleSplit !== null ) {
            heroSubTitleSplit.revert();
          }
        } 
      });

      if( heroTitle !== null ) {
        heroEntranceAnimation.set(heroTitle, { opacity:1 });
      }
      if( heroSubTitle.length > 0 ) {
        heroEntranceAnimation.set(heroSubTitle, { opacity:1 });
      }
      if( heroImages.length > 0 ) {
        heroEntranceAnimation.set(heroImages, { y: 15 });
      }
      if( heroCTA !== null ) {
        heroEntranceAnimation.set(heroCTA, { y: 15 });
      }

      if( heroTitle !== null ) {
        heroEntranceAnimation.from(heroTitleSplit.chars, {
          y: 80, stagger: 0.02, duration: 0.2, ease: "circ.out",
        });
      }
      if( heroSubTitle.length > 0 ) {
        heroEntranceAnimation.from(heroSubTitleSplit.words, {
          y: 80, stagger: 0.02, duration: 0.35, ease: "circ.out",
        }, "<75%");
      }
      if( heroCTA !== null ) {
        heroEntranceAnimation.to(heroCTA, {
          autoAlpha:1, duration: 0.35, y:0, ease: "circ.out",
        }, "<75%");
      }
      if( heroImages.length > 0 ) {
        heroEntranceAnimation.to(heroImages, {
          autoAlpha:1, duration: 0.35, stagger: 0.045, y:0, ease: "circ.out",
        }, 0.1);
      }
    });


    //window.addEventListener('resize', onResize);

    //function onResize(event) {
    //  if( !mediaQuery.matches ) {
    //  }
    //}
    
  } else {
    gsap.to(mainContent, {duration: 0.6, opacity: 1});
  }
  
  //function fadeInPage() {
  //  if (!window.AnimationEvent) { return; }
  //  var fader = document.getElementById('fader');
  //  var header = document.getElementById('header');
  //  var header2 = $('.blog-nav');
  //  var content = document.querySelector('.site-wrap');
  //  fader.classList.add('fade-out');
  //  setTimeout(() => {
  //    //header.classList.add('loaded');
  //    //if (header2.length) {
  //    //  header2.addClass('loaded');
  //    //}
  //    //const heroBlockEls = document.querySelectorAll('.hero-item');
  //    //const mainContent = $('section:not(.hero-item)');
  //    //gsap.set(mainContent, {opacity: 0});
      
  //    //if( heroBlockEls.length ) {

  //    //  heroBlockEls.forEach( (heroBlockEl) => {
  //    //    const heroTitle = heroBlockEl.querySelector('h1');
  //    //    const heroTitleSplit = heroTitle !== null ? new SplitText(heroTitle, { types: 'chars' }) : null;
  //    //    const heroSubTitle = heroBlockEl.querySelectorAll('.text p');
  //    //    const heroSubTitleSplit = heroSubTitle.length > 0 ? new SplitText(heroSubTitle, { types: 'words' }) : null;
  //    //    const heroImages = heroBlockEl.querySelectorAll('img');
  //    //    const heroCTA = heroBlockEl.querySelector('.cta');

  //    //    const heroEntranceAnimation = gsap.timeline({ 
  //    //      delay: 0.5, 
  //    //      onComplete: ()=> {
  //    //        gsap.to(mainContent, {duration: 0.6, opacity: 1});
  //    //        if( heroTitleSplit !== null ) {
  //    //          heroTitleSplit.revert();
  //    //        }
  //    //        if( heroSubTitleSplit !== null ) {
  //    //          heroSubTitleSplit.revert();
  //    //        }
  //    //      } 
  //    //    });

  //    //    if( heroTitle !== null ) {
  //    //      heroEntranceAnimation.set(heroTitle, { opacity:1 });
  //    //    }
  //    //    if( heroSubTitle.length > 0 ) {
  //    //      heroEntranceAnimation.set(heroSubTitle, { opacity:1 });
  //    //    }
  //    //    if( heroImages.length > 0 ) {
  //    //      heroEntranceAnimation.set(heroImages, { y: 15 });
  //    //    }
  //    //    if( heroCTA !== null ) {
  //    //      heroEntranceAnimation.set(heroCTA, { y: 15 });
  //    //    }

  //    //    if( heroTitle !== null ) {
  //    //      heroEntranceAnimation.from(heroTitleSplit.chars, {
  //    //        y: 80, stagger: 0.02, duration: 0.2, ease: "circ.out",
  //    //      });
  //    //    }
  //    //    if( heroSubTitle.length > 0 ) {
  //    //      heroEntranceAnimation.from(heroSubTitleSplit.words, {
  //    //        y: 80, stagger: 0.02, duration: 0.35, ease: "circ.out",
  //    //      }, "<75%");
  //    //    }
  //    //    if( heroCTA !== null ) {
  //    //      heroEntranceAnimation.to(heroCTA, {
  //    //        autoAlpha:1, duration: 0.35, y:0, ease: "circ.out",
  //    //      }, "<75%");
  //    //    }
  //    //    if( heroImages.length > 0 ) {
  //    //      heroEntranceAnimation.to(heroImages, {
  //    //        autoAlpha:1, duration: 0.35, stagger: 0.045, y:0, ease: "circ.out",
  //    //      }, 0.1);
  //    //    }
  //    //  });


  //    //  //window.addEventListener('resize', onResize);

  //    //  //function onResize(event) {
  //    //  //  if( !mediaQuery.matches ) {
  //    //  //  }
  //    //  //}
        
  //    //} else {
  //    //  gsap.to(mainContent, {duration: 0.6, opacity: 1});
  //    //}
      
  //  }, 600);
  //  //setTimeout(() => {
  //  //  content.classList.add('loaded');
  //  //}, 800);
  //}
  
  //$('main').imagesLoaded( function() {
  //  fadeInPage();
  //});

  //if (!window.AnimationEvent) { return }

  //var anchors = document.querySelectorAll('a:not([target="_blank"])');

  //for (var idx=0; idx<anchors.length; idx+=1) {
    
  //  if (!/^https?:$/.test(anchors[idx].protocol) ||
  //      anchors[idx].hostname !== window.location.hostname ||
  //      anchors[idx].pathname === window.location.pathname
  //      ) {
  //    continue;
  //  }

  //  anchors[idx].addEventListener('click', function(event) {
  //    if (event.metaKey || event.ctrlKey) return;
  //    var fader = document.getElementById('fader'),
  //        anchor = event.currentTarget;
  //    var header = document.getElementById('header');
  //    var header2 = $('.blog-nav');
  //    var content = document.querySelector('.site-wrap');

  //    var listener = function() {
  //      window.location = anchor.href;
  //      fader.removeEventListener('animationend', listener);
  //    };
  //    fader.addEventListener('animationend', listener);

  //    event.preventDefault();
  //    fader.classList.add('fade-in');
  //    //content.classList.remove('loaded');
  //    setTimeout(() => {
  //      $( "li.sub" ).removeClass('is-open');
  //      header.classList.remove('loaded');
  //      if (header2.length) {
  //        header2.removeClass('loaded');
  //      }
  //    }, 200);
  //  });
  //}

  //window.addEventListener('pageshow', function (event) {
  //  if (!event.persisted) {
  //    return;
  //  }
  //  var fader = document.getElementById('fader');
  //  var header = document.getElementById('header');
  //  var header2 = $('.blog-nav');
  // // var content = document.querySelector('.site-wrap');
    
  //  fader.classList.remove('fade-in');
  //  header.classList.add('loaded');
  //  if (header2.length) {
  //    header2.addClass('loaded');
  //  }
  //  //content.classList.add('loaded');
  //});
  
}

export {
  pageTransitions
}
