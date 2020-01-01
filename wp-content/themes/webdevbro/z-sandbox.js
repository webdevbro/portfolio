
/* VANILLA JS SERVER REQUEST (best try) (for loop, works 1/2 but can't add multiple arrays)*/
const index = ["posts", "portfolio", "pages"];
for (let i = 0; i < index.length; i++) {
  const request = new XMLHttpRequest();
  request.open('GET', `${webdevbroData.root_url}/wp-json/wp/v2/${index[i]}?search=${this.searchField.value}`, true);
  request.onload = function () {
    if (this.status >= 200 && this.status < 400) {
      let data = JSON.parse(this.response);
      document.querySelector("#search-overlay__results").innerHTML = `
    <h2 class="search-overlay__section-title">General Information</h2>
      ${ data.length ? '<ul class="link-list min-list">' : '<p>No general information matches this search. Please try again.</p>'}
      ${ data.map((data) => `<li><a href="${data.link}">${data.title.rendered}</a></li>`).join("")}
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
} /* end for loop */



/* VANILLA JS SERVER REQUEST (can only get it to work with 1 URL)*/
const request = new XMLHttpRequest();
request.open('GET', `${webdevbroData.root_url}/wp-json/wp/v2/portfolio?search=${this.searchField.value}`, true);
request.onload = function () {
  if (this.status >= 200 && this.status < 400) {
    let data = JSON.parse(this.response);
    document.querySelector("#search-overlay__results").innerHTML = `
      <h2 class="search-overlay__section-title">General Information</h2>
        ${ data.length ? '<ul class="link-list min-list">' : '<p>No general information matches this search. Please try again.</p>'}
        ${ data.map((data) => `<li><a href="${data.link}">${data.title.rendered}</a></li>`).join("")}
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



/* jQUERY ASYNC SERVER REQUEST WORKING */
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





counters.forEach(element => {
  let counter = element.id;
  let countUp = new CountUp('counter', 2000);
  countUp.start();
});
