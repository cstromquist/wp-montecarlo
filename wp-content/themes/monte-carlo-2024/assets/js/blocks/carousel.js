const carouselBlock = (gsap) => {
  const mediaQuery = window.matchMedia('(min-width: 768px)');
  const carousels = document.querySelectorAll('.block-carousel-block');

  if( carousels.length ) {
    carousels.forEach( (carousel) => {
      let buttons = carousel.querySelectorAll('.carousel-item');
      buttons.forEach( (button) => {
        button.addEventListener('click', (event)=> {
          
          if( mediaQuery.matches === true ) {
            let carouselItem = event.target.parentElement;
            let content = carouselItem.querySelector('.content');
            let slideIndex = carouselItem.getAttribute('data-slide');

            // Get the image container
            let imageContainer = carouselItem.closest('.inner-container').querySelector('.img');
            //Find the associated image
            let image = imageContainer.querySelector('img[data-slide="' + slideIndex + '"]');

            // If the carousel item isn't already open
            if( !carouselItem.classList.contains('active') ) {
              //let prevItem = carouselItem.parentElement.querySelector('li.active');
              let prevItems = carouselItem.parentElement.querySelectorAll('.active');
              let prevImages = imageContainer.querySelectorAll('img.active');
              //Foreach item with the active class
              let prevItemContent;
              // If there was a previously active carousel item (there always should be at least 1)
              if( prevItems !== null ) {
                //hide previous images
                prevImages.forEach((img) => {
                  gsap.to(img, { autoAlpha: 0, duration: 0.4, ease: 'circ.out', autoRound: false });
                  img.classList.remove('active');
                });
                prevItems.forEach((item) => {
                  // close the content container 
                  prevItemContent = item.querySelector('.content');
                  gsap.to(prevItemContent, { height: 0, duration: 0.4, ease: 'circ.out', autoRound: false });
                  item.classList.remove('active');
                });
                // Open content
                gsap.to(content, { height: 'auto', duration: 0.4, ease: 'circ.out', autoRound: false });
                carouselItem.classList.add('active');
                // Show image
                gsap.to(image, { autoAlpha: 1, duration: 0.4, ease: 'circ.out', autoRound: false });
                image.classList.add('active');
              }
            }
          }
        });
        //button.addEventListener('mouseenter', ()=> {
        //  if( !document.querySelector('body').classList.contains('home') ) {
        //    button.click();
        //  }
        //})
      })
    });
    window.addEventListener('resize', onResize);

    function onResize(event) {
      if( !mediaQuery.matches ) {
        const contentBlocks = document.querySelectorAll('.block-carousel-block .content');
        gsap.set(contentBlocks, { clearProps:'all' });
      }
    }
  }
}

export {
  carouselBlock
};
