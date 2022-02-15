/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/cart/cart.js ***!
  \***********************************/
// add items to the cart
(function () {
  var count = 0;
  var cartBtn = document.querySelectorAll(".store-item-icon");
  cartBtn.forEach(function (btn) {
    btn.addEventListener("click", function (event) {
      if (event.target.parentElement.classList.contains("store-item-icon")) {
        count++;
        var cartCount = document.getElementById("total-items");

        if (window.getComputedStyle(cartCount, null).display === "none") {
          cartCount.style.display = "block";
          cartCount.textContent = count;
        } else {
          cartCount.textContent = count;
        }
      }
    });
  });
})();
/******/ })()
;