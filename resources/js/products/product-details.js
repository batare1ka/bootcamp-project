const { random } = require("lodash");

let MainImg = document.getElementById("MainImg");
let smallimg = document.getElementsByClassName("small-img");
[...smallimg].map(e => e.onclick = function () { MainImg.src = e.src });

let addToCartBtn = document.querySelector(".add__to-cart");
let cartCount = document.getElementById("total-items");
let inputSize = document.getElementById("size");
let inputQuantity = document.getElementById("quantity");

inputSize.addEventListener('change', function (e) {
  product.size = e.target.value;
  console.log(addToCartBtn);
});
inputQuantity.addEventListener('change', function (e) {
  if (e.target.value < 1) {
    e.target.value = 1;
  }
  product.count = e.target.value;

});
addToCartBtn.addEventListener('click', function (e) {
  if (window.getComputedStyle(cartCount, null).display === "none") {
    cartCount.style.display = "flex";
  }
  addProductsToCart(product)
  addToCartBtn.disabled = true;

});

let randomProducts = document.querySelectorAll(".product");
randomProducts.forEach(rand => {
  rand.addEventListener("click", (event) => {
    let title = rand.querySelector(".p-name").textContent;
    let randProd = listRandProducts.find(prod => prod.name == title);
    if (!event.target.classList.contains("buy-btn")) {
      location.href = `http://localhost:880/product/${randProd.id}`
    } else {
      if (window.getComputedStyle(cartCount, null).display === "none") {
        cartCount.style.display = "flex";
      }
      addProductsToCart(randProd)
    }
  })
});

function addProductsToCart(product) {
  product.price = parseFloat(product.price);
  product.image_url = product.img_large_url;
  delete product.img_large_url;
  let cart = localStorage.getItem("cart");

  if (!cart) {
    product.count = 1;
    localStorage.setItem('cart', JSON.stringify([product]));
    cart = localStorage.getItem("cart");

  } else {

    let prevProducts = JSON.parse(cart);

    let productExistsInArray = prevProducts.some(element => element.id === product.id);

    if (productExistsInArray) {
      prevProducts.forEach(element => {
        element.id === product.id ? element.count++ : '';
      })
    } else {
      product.count = product.count || 1;
      prevProducts.push(product);
    }

    localStorage.setItem('cart', JSON.stringify(prevProducts));

    cart = localStorage.getItem("cart");
  }
  cart = JSON.parse(cart);
  cartCount.textContent = cart.length
}


