const heroBlock = (gsap, SplitText) => {
  const mediaQuery = window.matchMedia('(min-width: 768px)');

  //const heroBlockEls = document.querySelectorAll('.tbc_block-hero');

  //if( heroBlockEls.length ) {
  //  heroBlockEls.forEach( (heroBlockEl) => {
  //    const heroTitle = heroBlockEl.querySelector('h1');
  //    const heroTitleSplit = heroTitle !== null ? new SplitText(heroTitle, { types: 'chars' }) : null;
  //    const heroSubTitle = heroBlockEl.querySelectorAll('.text p');
  //    const heroSubTitleSplit = heroSubTitle.length > 0 ? new SplitText(heroSubTitle, { types: 'words' }) : null;
  //    const heroImages = heroBlockEl.querySelectorAll('img');
  //    const heroCTA = heroBlockEl.querySelector('.cta');

  //    const heroEntranceAnimation = gsap.timeline({ 
  //      delay: 0.5, 
  //      onComplete: ()=> {
  //        if( heroTitleSplit !== null ) {
  //          heroTitleSplit.revert();
  //        }
  //        if( heroSubTitleSplit !== null ) {
  //          heroSubTitleSplit.revert();
  //        }
  //      } 
  //    });

  //    if( heroTitle !== null ) {
  //      heroEntranceAnimation.set(heroTitle, { opacity:1 });
  //    }
  //    if( heroSubTitle.length > 0 ) {
  //      heroEntranceAnimation.set(heroSubTitle, { opacity:1 });
  //    }
  //    if( heroImages.length > 0 ) {
  //      heroEntranceAnimation.set(heroImages, { y: 15 });
  //    }
  //    if( heroCTA !== null ) {
  //      heroEntranceAnimation.set(heroCTA, { y: 15 });
  //    }

  //    if( heroTitle !== null ) {
  //      heroEntranceAnimation.from(heroTitleSplit.chars, {
  //        y: 80, stagger: 0.02, duration: 0.2, ease: "circ.out",
  //      });
  //    }
  //    if( heroSubTitle.length > 0 ) {
  //      heroEntranceAnimation.from(heroSubTitleSplit.words, {
  //        y: 80, stagger: 0.02, duration: 0.35, ease: "circ.out",
  //      }, "<75%");
  //    }
  //    if( heroCTA !== null ) {
  //      heroEntranceAnimation.to(heroCTA, {
  //        autoAlpha:1, duration: 0.35, y:0, ease: "circ.out",
  //      }, "<75%");
  //    }
  //    if( heroImages.length > 0 ) {
  //      heroEntranceAnimation.to(heroImages, {
  //        autoAlpha:1, duration: 0.35, stagger: 0.045, y:0, ease: "circ.out",
  //      }, 0.1);
  //    }
  //  });


  //  //window.addEventListener('resize', onResize);

  //  //function onResize(event) {
  //  //  if( !mediaQuery.matches ) {
  //  //  }
  //  //}
  //}

}

export {
  heroBlock
};