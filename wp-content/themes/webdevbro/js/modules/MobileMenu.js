// import $ from 'jquery';


class MobileMenu {

  constructor() {
    this.menuIcon = jQuery(".navbar-toggle");
    this.menuContent = jQuery(".navbar-ul");
    this.toggleUl = jQuery("#navbarCollapse");
    this.events();
  }

  events() {
    this.menuIcon.click(this.toggleTheMenu.bind(this));

  }

  toggleTheMenu() {
    this.toggleUl.slideToggle("slow");

  }



}

export default MobileMenu;

