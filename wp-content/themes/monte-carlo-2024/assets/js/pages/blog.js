const blogPage = (Swiper, Navigation) => {
    
  const blogPage = $('body.blog');
  const $searchForm = $('.search-form');
  
  if ($searchForm.length) {
    
    // Search button
    const $searchBtn = $('#openSearch');
    const $input = $('.search-field');
    
    $searchBtn.on('click', () => {
      if ($searchForm.length) {
        $searchForm.addClass('active');
        setTimeout(() => {
          $input.focus();
        }, 400);
      }
    });
    
    $input.on('blur', () => {
      $searchForm.removeClass('active');
    });
    
  }
  
  if (blogPage.length) {
    
    // Setup Swiper for all category post rows
    document.querySelectorAll('.posts-swiper').forEach((el, i) => {

      if (el) {

        const $next = el.parentNode.querySelector('.swiper-button-next');
        const $prev = el.parentNode.querySelector('.swiper-button-prev');

        const swiper = new Swiper(el, {
          slidesPerView: 1,
          spaceBetween: 20,
          centeredSlides: true,
          breakpoints: {
            768: {
              slidesPerView: 3,
              spaceBetween: 40,
              centeredSlides: false,
            },
          },
          loop: true,
          speed: 600,
          modules: [Navigation],
          // Navigation arrows
          navigation: {
            nextEl: $next,
            prevEl: $prev,
          },
        });

      }

    });
    
  }
    
}

export {
  blogPage
};
