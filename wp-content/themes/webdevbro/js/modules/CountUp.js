// import $ from 'jquery';
import { CountUp } from 'countup.js';

window.onload = function () {
  let statsTopOffset = jQuery("#stats").offset().top;
  let winYOffset = window.pageYOffset;
  let counters = document.querySelectorAll('.counterList');
  let countUpFinished = false;
  let endVal = 0;
  jQuery(window).scroll(function () {
    if (!countUpFinished && window.pageYOffset > statsTopOffset - jQuery(window).height() + 200) {
      counters.forEach(element => {
        let counterId = element.id;
        endVal = parseInt(element.innerHTML);
        let countUp = new CountUp(counterId, endVal);
        countUp.start();
      });
      countUpFinished = true;
    }
  });
}

export default CountUp;
