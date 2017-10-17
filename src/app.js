import 'swiper/dist/css/swiper.min.css'
import './sass/main.scss'

import Swiper from 'swiper'

$(document).ready(() => {
  console.log('app start...');

  let swiper = new Swiper('.swiper-container', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    pagination: '.swiper-pagination',
    paginationClickable: true
  });
});