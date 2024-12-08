import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/swiper-bundle.css';

export default function slider() {
  const adminEditor = document.querySelector('#editor.block-editor__container');
  const initSwiper = () => {

    // Featured products slider (Block)
    const swiper = new Swiper('.featured-products', {
      modules: [Navigation],
      loop: true,
      slidesPerView: 1,
      slidesPerGroup: 1,
      spaceBetween: 20,
      speed: 600,
      navigation: {
        nextEl: '.featured-products-next',
        prevEl: '.featured-products-prev',
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
          slidesPerGroup: 2,
        },
        1024: {
          slidesPerView: 3,
          slidesPerGroup: 3,
        },
      },
    });

    // Related products slider (single product page)
    const relatedSwiper = new Swiper('#related-product-slider', {
      modules: [Navigation],

      loop: true,
      slidesPerView: 1.3,
      slidesPerGroup: 1,
      spaceBetween: 20,
      speed: 600,
      navigation: {
        nextEl: '.related-products-next',
        prevEl: '.related-products-prev',
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
  };

    // if editor delay initSwiper to load after editor 
  if (adminEditor) {
    setTimeout(initSwiper, 1000);
  } else {
    initSwiper();
  }
}
