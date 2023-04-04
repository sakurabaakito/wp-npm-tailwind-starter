import Swiper, {Navigation , Pagination} from "swiper";

import 'swiper/swiper.css';
import 'swiper/css/pagination';

export default () => {
  const swiper = new Swiper(".swiper", {
    loop: true,
    slidesPerView: "auto",
    centeredSlides: true,
    allowTouchMove: true,
    breakpoints: {
      640: {
        allowTouchMove: false,
      }
    },
    speed: 500,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    modules: [Navigation, Pagination],
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
}
