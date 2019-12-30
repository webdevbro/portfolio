// import $ from 'jquery';

class FancyBox {

  constructor() {
    this.events();
  }

  events() {
    jQuery("[data-fancybox]").fancybox();
  }

}

export default FancyBox;


