import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/swiper-bundle.css';
// import 'swiper/css/pagination'

export default function slider() {
  const adminEditor = document.querySelector('#editor.block-editor__container');
  const initSwiper = () => {
    // Full width slider (Block)
    const swiper = new Swiper('.swiper-container', {
      modules: [Navigation, Pagination],
      watchSlidesProgress: true,
      loop: true,
      slidesPerView: 1,
      speed: 600,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',

        clickable: true,
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
