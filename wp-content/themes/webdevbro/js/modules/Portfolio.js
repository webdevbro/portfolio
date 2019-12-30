
class Isotope {

  constructor() {

    this.events();
  }

  events() {
    jQuery(document).ready(function ($) {
      $(".items").isotope({
        filter: "*",
        animationOptions: {
          duration: 1500,
          easing: 'linear',
          queue: false,
        }
      });

      /* FILTER */
      $("#filters a").click(function(e) {
        e.preventDefault();
        $("#filters .current").removeClass("current");
        $(this).addClass("current");
        let selector = $(this).attr("data-filter")
        $(".items").isotope({
          filter: selector,
          animationOptions: {
            duration: 1500,
            easing: 'linear',
            queue: false,
          }
        });
        // return false;
      });



    });
  }



}

export default Isotope;


