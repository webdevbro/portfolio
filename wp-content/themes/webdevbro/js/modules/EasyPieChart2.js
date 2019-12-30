class EasyPieChart2 {

  constructor() {
    this.events();
  }

  events() {

    jQuery(document).ready(function($){
            /* SCROLL TO */
      let skillsTopOffset = $("#skills").offset().top;
      let winYOffset = window.pageYOffset;

      $(window).scroll(function() {
        if(window.pageYOffset > skillsTopOffset - $(window).height() + 200) {
          $('.chart').easyPieChart({
            easing: 'easeInOut',
            barColor: '#B89C2E',
            trackColor: false,
            scaleColor: false,
            lineWidth: 4,
            size: 152,
            lineCap: 'butt',
            onStep: function (from, to, percent) {
              $(this.el).find('.percent').text(Math.round(percent));
            }
          });
        }
      });







    });
  }
}

export default EasyPieChart2;
