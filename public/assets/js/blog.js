/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/blog/most-popular.js":
/*!*******************************************!*\
  !*** ./resources/js/blog/most-popular.js ***!
  \*******************************************/
/***/ (() => {

var popularNewsTemplate = document.querySelector("[popular-artcles-template]");
var listOfArticles = document.querySelector("[articles-list]");
axios.get('/api/articles/most-popular').then(function (_ref) {
  var data = _ref.data;
  data.forEach(function (article) {
    var articleOnPage = popularNewsTemplate.content.cloneNode(true).children[0];
    var title = articleOnPage.querySelector(".card-title");
    title.textContent = article.title;
    title.style.cursor = "pointer";
    title.addEventListener("click", function () {
      location.href = "http://localhost:880/blog/article/".concat(article.id);
    });
    articleOnPage.querySelector(".card-text").textContent = article.excerpt;
    var image = articleOnPage.querySelector(".bg-image");
    image.style.backgroundImage = "url(http://localhost:880/storage/".concat(article.image_url, ")");
    image.style.backgroundSize = "contain";
    image.style.backgroundPosition = "center";
    image.style.backgroundRepeat = "no-repeat";

    if (!article.view_count) {
      articleOnPage.querySelector(".badge").remove();
    } else {
      articleOnPage.querySelector(".badge").innerHTML = "\n                ".concat(article.view_count, "\n                <span class=\"visually-hidden\">unread messages</span>");
    }

    listOfArticles.append(articleOnPage);
  });
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!***********************************!*\
  !*** ./resources/js/blog/blog.js ***!
  \***********************************/
__webpack_require__(/*! ./most-popular */ "./resources/js/blog/most-popular.js");
})();

/******/ })()
;