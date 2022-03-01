/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/cart/cart.js ***!
  \***********************************/
var itemsList = document.querySelector("[cart-list]");
var cartItem = document.querySelector("[cart-item]");
var cartItems = localStorage.getItem("cart");

if (cartItems && cartItems != "[]") {
  var shipping = 0;
  var shippingTag = document.querySelector(".shipping p");
  var subtotal = 0;
  var subtotalTag = document.querySelector(".subtotal p");
  var totalPriceTag = document.querySelector(".total-price p");
  cartItems = JSON.parse(localStorage.getItem("cart"));
  cartItems.forEach(function (item) {
    shipping += 2.5 * item.count;
    subtotal += item.price * item.count;
    var tableItem = cartItem.content.cloneNode(true).children[0];
    var removeBtn = tableItem.querySelector(".remove-btn");
    removeBtn.addEventListener("click", function () {
      shipping -= 2.5 * item.count;
      subtotal -= item.price * item.count;
      shippingTag.textContent = "$ ".concat(shipping);
      subtotalTag.textContent = "$ ".concat(subtotal);
      totalPriceTag.textContent = "$ ".concat(shipping + subtotal);
      removeItemFromCart(item.id, tableItem);

      if (cartItems.length == 0) {
        switchCartBlockToEmpty();
      }
    });
    var image = tableItem.querySelector(".product-img");
    image.src = item.image_url;
    image.addEventListener("click", function () {
      location.href = "http://localhost:880/product/".concat(item.id);
    });
    var title = tableItem.querySelector(".product-title");
    title.textContent = item.name;
    title.addEventListener("click", function () {
      location.href = "http://localhost:880/product/".concat(item.id);
    });
    var itemPrice = tableItem.querySelector(".product-price");
    itemPrice.textContent = "$ ".concat(item.price.toFixed(2));
    var itemCount = tableItem.querySelector(".product-count");
    itemCount.value = item.count;

    itemCount.oninput = function () {
      if (itemCount.value < 1) {
        shipping -= 2.5 * item.count;
        subtotal -= item.price * item.count;
        shippingTag.textContent = "$ ".concat(shipping);
        subtotalTag.textContent = "$ ".concat(subtotal);
        totalPriceTag.textContent = "$ ".concat(shipping + subtotal);
        removeItemFromCart(item.id, tableItem);
      } else {
        var inputValInt = parseInt(itemCount.value);

        if (inputValInt > item.count) {
          shipping += 2.5;
          subtotal += item.price;
        } else {
          shipping -= 2.5;
          subtotal -= item.price;
        }

        item.count = inputValInt;
        shippingTag.textContent = "$ ".concat(shipping);
        subtotalTag.textContent = "$ ".concat(subtotal);
        totalPriceTag.textContent = "$ ".concat(shipping + subtotal);
        totalPerProduct.textContent = "$ ".concat((item.price * item.count).toFixed(2));
        localStorage.setItem('cart', JSON.stringify(cartItems));
      }

      if (cartItems.length == 0) {
        switchCartBlockToEmpty();
      }
    };

    var totalPerProduct = tableItem.querySelector(".total-per-product");
    totalPerProduct.textContent = "$ ".concat((item.price * item.count).toFixed(2));
    itemsList.append(tableItem);
  });
  shippingTag.textContent = "$ ".concat(shipping);
  subtotalTag.textContent = "$ ".concat(subtotal);
  totalPriceTag.textContent = "$ ".concat(shipping + subtotal);
} else {
  switchCartBlockToEmpty();
}

document.querySelector(".empty-cart__block-btn").addEventListener("click", function () {
  return location.href = "http://localhost:880/shop";
});

function switchCartBlockToEmpty() {
  document.getElementById("cart-container").style.display = "none";
  document.getElementById("cart-bottom").style.display = "none";
  document.querySelector(".empty-cart__block").style.display = "block";
}

function removeItemFromCart(id, tableItem) {
  tableItem.remove();
  cartItems = cartItems.filter(function (e) {
    return e.id !== id;
  });
  document.getElementById("total-items").textContent = cartItems.length;
  localStorage.setItem('cart', JSON.stringify(cartItems));
}

document.querySelector(".checkou-btn").addEventListener("click", function () {
  location.href = 'http://localhost:880/checkout/';
});
/******/ })()
;