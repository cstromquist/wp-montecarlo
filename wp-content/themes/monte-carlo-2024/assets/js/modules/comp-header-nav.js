const headerNavComp = (gsap) => {
  // Hamburger button
  const hamburgerMenu = document.querySelector('.site-hamburger button');
  // Main nav
  const siteNav = document.querySelector('header .site-nav');
  const topLevelNavListItems = siteNav.querySelectorAll('#menu-main-menu > li');
  const topLevelNavItemSpans = siteNav.querySelectorAll('#menu-main-menu > li > a > span');
  const topLevelCTA = siteNav.querySelector('.site-cta');
  //const siteNavLinks = siteNav.querySelectorAll('header .site-nav a.menu-h1 span');

  // Top level nav items with dropdowns
  const dropdownMenus = document.querySelectorAll('#menu-main-menu li.sub');
  const delay = 500; // 0.5 seconds delay before closing
  let timer;
  const mediaQuery = window.matchMedia('(min-width: 992px)');

  // Open and close animation for the mobile nav
  const menuTl = gsap.timeline({ reversed:true, paused:true, onReverseComplete:() => { siteNav.classList.remove('is-open'); } })
    .set(siteNav, { autoAlpha:0 })
    .set(topLevelNavListItems, { opacity:0 })
    .set(topLevelNavItemSpans, { x: -20 })
    .set(topLevelCTA, { opacity:0 })
    .to(siteNav, { duration:0.3, autoAlpha:1, ease:'power2.out' });
  topLevelNavListItems.forEach((item, index) => {
    menuTl.to(item, { opacity:1, duration:0.3, ease:'power2.out' }, index > 0 ? "-=0.2": "");
    menuTl.to(topLevelNavItemSpans[index], { x:0, duration:0.3, ease:'power2.out' }, "-=0.3");
  });
  menuTl.to(topLevelCTA, { opacity:1, duration:0.3, ease:'power2.out' },"-=0.2");

  hamburgerMenu.addEventListener('click', onHamburgerClick);

  function onHamburgerClick(event) {
    hamburgerMenu.classList.toggle('is-open');
    document.querySelector('body').classList.toggle('locked');
    // If the menu is closed
    if( hamburgerMenu.classList.contains('is-open') ) {
        // Open the menu
        siteNav.classList.add('is-open');
        menuTl.timeScale(1).play();
    }
    else {
      // Increase the speed of the closing animation
      menuTl.timeScale(2.5).reverse();
      // .is-open class removed onComplete of menuTl

      // Close all sub-menus
      document.querySelectorAll('header li.sub.is-open').forEach( (el) => {
        el.classList.remove('is-open');
      });
    }
  }

  dropdownMenus.forEach((navItem)=> {
    navItem.addEventListener('mouseenter', onDropdownEnter);
    navItem.addEventListener('mouseleave', onDropdownLeave);
    navItem.querySelector('.menu-h1').addEventListener('click', onDropdownClick);
  });

  document.addEventListener('click', function(event) {
    if (!siteNav.contains(event.target) && document.querySelectorAll('li.sub.is-open').length > 0) {
      // might need to update this to the li.sub instead of .sub-menu-wrapper
      document.querySelector('li.sub.is-open').classList.remove('is-open');
    }
  });
  window.addEventListener('keyup', onKeypress);
  window.addEventListener('resize', onResize);
  window.addEventListener('scroll', toggleHeaderClass, { passive:true });

  function onDropdownEnter(event, altTarget) {
    if( mediaQuery.matches ) {
      clearTimeout(timer);
      document.querySelectorAll('li.sub.is-open').forEach((item) => {
        item.classList.remove('is-open');
      });
      const menu = event.target;
      menu.classList.add('is-open');
    }
  }
  function onDropdownLeave(event) {
    //console.log(event);
    if( mediaQuery.matches ) {
      const menu = event.target;
      timer = setTimeout(function() {
        menu.classList.remove('is-open');
      }, delay);
    }
  }

  function onDropdownClick(event) {
    event.preventDefault();
    const menu = event.target.closest('li');
    //If it's desktop
    if( mediaQuery.matches ) {
      // mouse click
      if( event.pointerType === "mouse" ) {
        menu.classList.add('is-open');
      }
      // touch click
      else if( event.pointerType === "touch" ) {
        menu.classList.add('is-open');
      }
      // keyboard navigation
      else {
          menu.classList.toggle('is-open');
      }
    }
    // always toggle for mobile
    else {
      menu.classList.toggle('is-open');
    }
  }
  function onResize(event) {
    if( mediaQuery.matches ) {
      const openItems = document.querySelectorAll('#header .is-open');
      openItems.forEach((item)=> {
        item.classList.remove('is-open');
      });
      gsap.set(siteNav, { clearProps:'all' });
      document.querySelector('body').classList.remove('locked');
    }
  }
  function onKeypress(event) {
    if(event.key === "Escape") {
      const openItems = document.querySelectorAll('#header .is-open');
      openItems.forEach((item)=> {
        item.classList.remove('is-open');
      });
    }
  }

  // Handle the hover state so all but hovered link gray out
  const dropdownMenuItems = document.querySelectorAll('#menu-main-menu li.sub .menu-sub-menu a');
  dropdownMenuItems.forEach((dropdownItem) => {
    dropdownItem.addEventListener('mouseenter', () => {
      dropdownItem.closest('.sub-menu-wrapper').classList.add('active');
    });
    dropdownItem.addEventListener('mouseleave', () => {
      dropdownItem.closest('.sub-menu-wrapper').classList.remove('active');
    });
  });

  function toggleHeaderClass() {
    const header = document.querySelector('header');
    const blogNav = document.querySelector('.blog-nav');
    
    if (this.scrollY > this.previousScrollY && window.pageYOffset > 100) {
      header.classList.add('scrolled');
      if (blogNav) {
        blogNav.classList.add('scrolled');
      }
      if( mediaQuery.matches ) {
        const openItems = document.querySelectorAll('#header .is-open');
        openItems.forEach((item)=> {
          item.classList.remove('is-open');
        });
      }
    } else {
      header.classList.remove('scrolled');
      if (blogNav) {
        blogNav.classList.remove('scrolled');
      }
    }
    
    this.previousScrollY = this.scrollY;
  }
  // Initialize previousScrollY to current scroll position
  window.previousScrollY = window.scrollY;
}

export {
  headerNavComp
};
