import './bootstrap';
import simpleParallax from 'simple-parallax-js';

var images = document.querySelectorAll('.parallax-init');
new simpleParallax(images);

Livewire.on('new-comments', () => {
    var comments = document.querySelectorAll(".comment.intialize");


    comments.forEach( (comment) => {
        comment.classList.toggle("intialize");

        var content = comment.querySelector(".comment-content");

        // show more button
        if (content.offsetHeight < content.scrollHeight) {
            comment.querySelector(".show-more").style.display = "block";
        }

        // show add sub comment addSubComment
        var buttonAdd = comment.querySelector('button[role="addSubComment"]');
        var form = comment.querySelector('.comments-form');
        var buttonHide = comment.querySelector('button[role="hideSubComment"]');

        if(form) {
            buttonAdd.addEventListener('click', () => {
                form.style.display = "flex";
            });

            buttonHide.addEventListener('click', () => {
                form.style.display = "none";
            });
        }

        //show sub comments
        var button = comment.querySelector('button[role="loadMore"]');
        if(button) {
            button.addEventListener('click', () => {
                button.classList.toggle('active');
            });
        }

    });


})

document.addEventListener("DOMContentLoaded", function () {
    function loadImagesLazily(e) {
      let images = document.querySelectorAll("img[data-src]");
      for (let i = 0; i < images.length; i++) {
        let rect = images[i].getBoundingClientRect();
        if (images[i].hasAttribute("data-src")
          && rect.bottom > 0 && rect.top < window.innerHeight
          && rect.right > 0 && rect.left < window.innerWidth) {
          images[i].setAttribute("src", images[i].getAttribute("data-src"));
          images[i].removeAttribute("data-src");
        }
      }
    };

    window.addEventListener('scroll', loadImagesLazily);
    window.addEventListener('resize', loadImagesLazily);
    loadImagesLazily();
});
