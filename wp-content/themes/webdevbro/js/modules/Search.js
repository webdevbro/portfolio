import $ from 'jquery';

class Search {

  // 1. describe and create/initiate the object
  constructor() {
    this.addSearchHTML();
    this.resultsDiv = document.querySelector("#search-overlay__results");
    this.openButton = document.querySelector(".js-search-trigger");
    this.closeButton = document.querySelector(".search-overlay__close");
    this.searchOverlay = document.querySelector(".search-overlay");
    this.searchField = document.querySelector(".search-term");
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
  }

  // 2. events
  events() {
    this.openButton.addEventListener("click", this.openOverlay.bind(this));
    this.closeButton.addEventListener("click", this.closeOverlay.bind(this));
    document.addEventListener("keydown", this.keyPressDispatcher.bind(this));
    this.searchField.addEventListener("keyup", this.typingLogic.bind(this));
  }

  // 3. methods (function, action)

  typingLogic() {
    if (this.searchField.value  != this.previousValue) {
      clearTimeout(this.typingTimer);
      if (this.searchField.value) {
        if (this.isSpinnerVisible == false) {
          this.resultsDiv.innerHTML = ("<div class='spinner-loader'></div>");
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 300);
      } else {
        this.resultsDiv.innerHTML = "";
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.searchField.value;
  }

  getResults() {
    $.when(
      $.getJSON(`${webdevbroData.root_url}/wp-json/wp/v2/posts?search=${this.searchField.value}`),
      $.getJSON(`${webdevbroData.root_url}/wp-json/wp/v2/portfolio?search=${this.searchField.value}`)
    ).then((posts, portfolio) => {
      let combinedResults = posts[0].concat(portfolio[0]);
      this.resultsDiv.innerHTML = `
    <h2 class="search-overlay__section-title">General Information</h2>
      ${ combinedResults.length ? '<ul class="link-list min-list">' : '<p>No general information matches this search. Please try again.</p>'}
      ${ combinedResults.map((data) => `<li><a href="${data.link}">${data.title.rendered}</a></li>`).join("")}
    ${ combinedResults.length ? '</ul>' : ''}
  `;
      this.isSpinnerVisible = false;
    }, () => {
      this.resultsDiv.innerHTML = "<p class='t-normal'>Unexpected error, please try again.</p>";
    });
  }

  keyPressDispatcher(event) {
    if (event.keyCode == 83 && this.isOverlayOpen == false && document.querySelector("input") != document.activeElement) {
      this.openOverlay();
    }
    if (event.keyCode == 27 && this.isOverlayOpen == true) {
      this.closeOverlay()
    }
  }
  openOverlay() {
    this.searchOverlay.classList.add("search-overlay--active");
    document.querySelector("html").classList.add("body-no-scroll");
    this.searchField.value = "";
    setTimeout(() => {
      this.searchField.focus();
    }, 301);
    this.isOverlayOpen = true;
  }
  closeOverlay() {
    this.searchOverlay.classList.remove("search-overlay--active");
    document.querySelector("html").classList.remove("body-no-scroll");
    this.isOverlayOpen = false;
  }
  addSearchHTML() {
    document.body.insertAdjacentHTML("beforeend", `
    <div class="search-overlay">
      <div class="search-overlay__top">
        <div class="container">
          <i class="fas fa-search search-overlay__icon" aria-hidden="true"></i>
          <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term" autocomplete="off">
          <i class="fas fa-window-close search-overlay__close" aria-hidden="true"></i>
        </div>
      </div>
      <div class="container">
        <div id="search-overlay__results"></div>
      </div>
    </div>
    `);
  }
}
export default Search;
