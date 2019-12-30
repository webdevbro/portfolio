class TypedString {
  constructor() {
    this.events();
  }
  events() {
    jQuery(document).ready(function ($) {
      let typed = new Typed(".string", {
        strings: ["Freelance Web Developer | webdevbro.com", "HTML5, CSS3, JavaScript, Vue.js", "Node.js, Express, MongoDB, Ajax", "WordPress, PHP, MySQL, Rest API"],
        typeSpeed: 150,
        startDelay: 1000,
        showCursor: false,
        loop: true,
      });
    });
  }
}

export default TypedString;

