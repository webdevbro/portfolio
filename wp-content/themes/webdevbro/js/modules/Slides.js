class Slider {
  constructor() {
    this.events();
  }
  events() {
    jQuery(document).ready(function ($) {
      $('#slides').superslides({
        animation: 'fade',
        play: 10000,
        pagination: false
        // animation_speed: 'slow'
      });
    });
  }
}

export default Slider;

