const McCarousel = () => {
  const carousels = document.querySelectorAll(".mc-carousel");

  if (carousels.length) {
    carousels.forEach((carousel) => {
      const container = carousel.querySelector(".carousel-container");
      const slide = carousel.querySelector(".slide");
      const prevButton = carousel.querySelector(".slide-arrow-prev");
      const nextButton = carousel.querySelector(".slide-arrow-next");
      nextButton.addEventListener("click", () => {
        const slideWidth = slide.clientWidth;
        container.scrollLeft += slideWidth;
      });
      prevButton.addEventListener("click", () => {
        const slideWidth = slide.clientWidth;
        container.scrollLeft -= slideWidth;
      });
    });
  }
};

export default McCarousel;
