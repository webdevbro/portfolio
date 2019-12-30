import $ from 'jquery';

class Search {

  // 1. describe and create/initiate the object
  constructor() {
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
        this.typingTimer = setTimeout(this.getResults.bind(this), 500);
      } else {
        this.resultsDiv.innerHTML = "";
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.searchField.value;
  }
  getResults() {
    const request = new XMLHttpRequest();
    request.open('GET', `${webdevbroData.root_url}/wp-json/wp/v2/posts?search=${this.searchField.value}`, true);
    request.onload = function () {
      if (this.status >= 200 && this.status < 400) {
        let data = JSON.parse(this.response);
        document.querySelector("#search-overlay__results").innerHTML = `
          <h2 class="search-overlay__section-title">General Information</h2>
            ${ data.length ? '<ul class="link-list min-list">' : '<p>No general information matches this search. Please try again.</p>'}
            ${ data.map((data) => `<li><a href="${data.link}">${data.title.rendered}</a></li>`).join("") }
          ${ data.length ? '</ul>' : ''}
        `;
        this.isSpinnerVisible = false;
      } else {
        console.log("We reached our target server, but it returned an error.");
      }
    }
    request.onerror = function () {
      console.log("There was a connection error of some sort.");
    }
    request.send();
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
    }, 300);
    this.isOverlayOpen = true;
  }
  closeOverlay() {
    this.searchOverlay.classList.remove("search-overlay--active");
    document.querySelector("html").classList.remove("body-no-scroll");
    this.isOverlayOpen = false;
  }


}
export default Search;
