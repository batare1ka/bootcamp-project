const word = 'for your kids.';
let count = 0;
(function type() {
  if (count == word.length + 1) {
    count = 0;

  }
  let letter = word.slice(0, count);

  letter = "\xa0" + letter;
  letter == ' ' ? "shit" : letter;
  document.querySelector('.typing').textContent = !letter.length ? "\xa0" : letter
  count++;
  setTimeout(type, 400);
}());

const { default: axios } = require("axios");

const productItemHome = document.querySelector("[product-home-template]");

let cartCount = document.getElementById("total-items");

document.querySelector("#home button").addEventListener("click", () => {
  location.href = "http://localhost:880/shop";
});
document.querySelector("#banner button").addEventListener("click", () => {
  location.href = "http://localhost:880/shop";
})

function insertProducts(data, selector) {

  let productsBlock = document.querySelector(selector);

  data.forEach(product => {
    let productForInsert = productItemHome.content.cloneNode(true).children[0];
    productForInsert.addEventListener("click", (event) => {
      if (!event.target.classList.contains("buy-btn")) {
        location.href = `http://localhost:880/product/${product.id}`
      } else {
        if (window.getComputedStyle(cartCount, null).display === "none") {
          cartCount.style.display = "flex";
        }
        addProductsToCart(product)
      }
    })
    productForInsert.querySelector(".p-name").textContent = product.name;
    productForInsert.querySelector(".product-price").textContent = `$ ${product.price.toFixed(2)}`;
    productForInsert.querySelector(".img-fluid").src = product.image_url;
    productsBlock.append(productForInsert)
  });
}

async function productsForHome() {

  const data = await axios.get("/api/suggested-products/");
  newProducts(data.data.featured_products)
  insertProducts(data.data.top_products, "#featured .row");
  insertProducts(data.data.dresses_rompers, "#clothes .row");
  insertProducts(data.data.hats_caps, "#caps .row");
  insertProducts(data.data.coats_jackets, "#coats .row");

}
productsForHome()

function newProducts(newProductsData) {
  let newProducts = document.querySelectorAll("#new .one img");
  newProducts.forEach((one, ind) => {
   one.src = newProductsData[ind].image_url;
   one.parentNode.querySelector("button").addEventListener("click", () => {
    location.href = `http://localhost:880/product/${newProductsData[ind].id}`
   })
  });
}

function addProductsToCart(product) {

  product.price = parseFloat(product.price);

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
      product.count = 1;
      prevProducts.push(product);
    }

    localStorage.setItem('cart', JSON.stringify(prevProducts));

    cart = localStorage.getItem("cart");
  }
  cart = JSON.parse(cart);
  cartCount.textContent = cart.length
}
let toast = document.querySelector(".toast");
if(toast){
  setTimeout(() => { toast.classList.remove("show") }, 5000);
}
