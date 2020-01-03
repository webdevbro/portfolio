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

    // USING CUSTOM REST API JQUERY
    $.getJSON(`${webdevbroData.root_url}/wp-json/webdevbro/v1/search?term=${this.searchField.value}`, (data) => {
      this.resultsDiv.innerHTML = `

        <div class="row overlay">

          <div class="overlay__item">
            <h2 class="overlay__item--title">Portfolio</h2>
            ${ data.portfolio.length ? '<ul class="link-list min-list">' : `<p>No portfolio information matches this search. <a href="${webdevbroData.root_url}/portfolio">Go to the portfolio archive.</a></p>`}
              ${ data.portfolio.map((data) => `<li><a href="${data.permalink}">${data.title}</a></li>`).join("")}
            ${ data.portfolio.length ? '</ul>' : ''}
          </div>

          <div class="overlay__item">
           <h2 class="overlay__item--title">Tutorials</h2>
           ${ data.tutorial.length ? '<ul class="link-list min-list">' : `<p>No tutorial matches this search. <a href="${webdevbroData.root_url}/tutorials">Visit all tutorials.</a></p>`}
              ${ data.tutorial.map((data) => `<li><a href="${data.permalink}">${data.title}</a></li>`).join("")}
            ${ data.tutorial.length ? '</ul>' : ''}
          </div>

          <div class="overlay__item">
           <h2 class="overlay__item--title">General Information</h2>
           ${ data.miscContent.length ? '<ul class="link-list min-list">' : `<p>No information matches your search. <a href="${webdevbroData.root_url}/blog">Try with the blog.</a></p>`}
              ${ data.miscContent.map((data) => `<li><a href="${data.permalink}">${data.title}</a> ${data.postType == "post" ? `by <a href="${data.authorUrl}">${data.authorName}</a>` : ""}</li>`).join("")}
            ${ data.miscContent.length ? '</ul>' : ''}
          </div>

        </div>
      `;
      this.isSpinnerVisible = false;
    });


  } /* getResults() */

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
