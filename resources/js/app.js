import './bootstrap';
import simpleParallax from 'simple-parallax-js';

var images = document.querySelectorAll('.parallax-init');
new simpleParallax(images);

const elementIsVisibleInViewport = (el, partiallyVisible = false) => {
    const { top, left, bottom, right } = el.getBoundingClientRect();
    const { innerHeight, innerWidth } = window;
    return partiallyVisible
      ? ((top > 0 && top < innerHeight) ||
          (bottom > 0 && bottom < innerHeight)) &&
          ((left > 0 && left < innerWidth) || (right > 0 && right < innerWidth))
      : top >= 0 && left >= 0 && bottom <= innerHeight && right <= innerWidth;
};

var scrolContainer = document.querySelector(".scroll-container");
var scrollNav = document.querySelector(".scroll-nav");

document.addEventListener("scroll", (event) => {

    if(scrollNav) {
        if(elementIsVisibleInViewport(scrollNav, true)) {
            var url = scrollNav.getAttribute("href");
            scrollNav.remove();

            var html = fetch(url).then( response => {
                return response.text();
            }).then(response => {
                console.log(response);
                scrolContainer.innerHTML += response;
                scrollNav = document.querySelector(".scroll-nav");
            });
        }
    }
});
