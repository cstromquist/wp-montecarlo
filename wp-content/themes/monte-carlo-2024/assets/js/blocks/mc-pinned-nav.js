const McPinnedNav = () => {
  let lastScrollTop = 0;

  window.addEventListener("scroll", function () {
    const nav = document.querySelector(".mc-pinned-nav");
    if (nav) {
      let currentScroll = window.scrollY;
      if (currentScroll > lastScrollTop) {
        // Scrolling down
        nav.classList.add("scrolled");
      } else {
        // Scrolling up
        nav.classList.remove("scrolled");
      }
      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
    }
  });
};

export default McPinnedNav;
