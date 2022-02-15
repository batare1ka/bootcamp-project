// add items to the cart
(function () {
  let count = 0;
  const cartBtn = document.querySelectorAll(".store-item-icon");
  cartBtn.forEach(function (btn) {
    btn.addEventListener("click", function (event) {
      if (event.target.parentElement.classList.contains("store-item-icon")) {
        count++;
        let cartCount = document.getElementById("total-items");
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
