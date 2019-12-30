import $ from 'jquery';
class OwlCarousel {

  constructor() {
    this.events();
  }

  events() {
    jQuery(document).ready(function($) {
      $('.owl-carousel').owlCarousel({
        loop: true,
        items: 4,
        responsive: {
          0: {
            items: 1
          },
          480: {
            items: 2
          },
          768: {
            items: 3
          },
          938: {
            items: 4
          }
        }
      })
    });
  }
}

export default OwlCarousel;
