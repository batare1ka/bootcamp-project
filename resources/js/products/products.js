const { default: axios } = require("axios");
const productTemplate = document.querySelector("[product-template]");
const insertToPage = document.getElementById("product-data");
const preloader = document.querySelector('.ajax-load');
let numberOfProducts = 0;
preloader.style.display = 'block';
let url = '/api/products';
let params = {
    page: 1
};
let search = localStorage.getItem('search');
if(search){
    url = '/api/search-products/';
    params.search = search;
}

function fetchProducts(url, params) {
    axios.get(url, {params})
        .then(({ data }) => {
            if (data == "") {
                let div = document.createElement('div');
                div.classList.add("no-more");
                div.style.textAlign = "center";
                div.innerHTML = "<h2>No more products found.</h2>";

                insertToPage.insertBefore(div, preloader);
                setInterval(() => {
                    preloader.style.display = 'none';
                }, 1000);
                setInterval(() => {
                    div.remove();
                }, 2500);
            } else {
                numberOfProducts = data.length;
                preloader.style.display = 'none';
                data.forEach(product => {
                    let productOnPage = productTemplate.content.cloneNode(true).children[0];
                    productOnPage.addEventListener("click", (event) => goToProductPageOrAddCart(event, product));
                    productOnPage.querySelector(".p-name").textContent = product.name;
                    productOnPage.querySelector(".product-price").textContent = `$ ${product.price.toFixed(2)}`;
                    productOnPage.querySelector(".product-img").src = product.image_url;
                    insertToPage.insertBefore(productOnPage, preloader);
                });
            }


        }).catch(error => {

            console.log(error);
        });
}
fetchProducts(url, params);
document.addEventListener('scroll', function () {
    if (window.scrollY >= insertToPage.scrollHeight && window.scrollY < insertToPage.scrollHeight + 20 && numberOfProducts > 11) {
        params.page++;
        preloader.style.display = 'block';
        fetchProducts(url, params);
    }
});
function clearSearch() {
    if(search){
        url = '/api/products';
        localStorage.removeItem("search");
        delete params.search;
    
    }
}
clearSearch();
let cartCount = document.getElementById("total-items");
function goToProductPageOrAddCart(event, product) {
    if(event.target.classList.contains("store-item-icon") || event.target.classList.contains("fa-shopping-cart")){
        if (window.getComputedStyle(cartCount, null).display === "none") {
            cartCount.style.display = "flex";
          }
          addProductsToCart(product)
    }else{
        window.location.href = `/product/${product.id}`;
    }
}

const brandList = document.querySelector("[brand-list]");
const brandTemplate = document.querySelector("[brand-item]");

function uncheckInputs(leaveChecked, identifier) {
    let allChildInputs = document.querySelectorAll(identifier);
    allChildInputs.forEach(element => {
        if(element.accessKey != leaveChecked.accessKey){
            element.checked = false;
        }
    });
    leaveChecked.accessKey = "";
}

function removeAllChildNodes() {
    productsToRemove = document.querySelectorAll(".product");
    productsToRemove.forEach(element => {
        element.remove();
    });
}

function fetchBrands() {
    axios.get("/api/brands/")
        .then(({ data }) => {
            data.forEach(brand => {
                let brandOnPage = brandTemplate.content.cloneNode(true).children[0];
                brandOnPage.innerHTML += brand.name
                let checkOrNot = brandOnPage.querySelector(".brand-input");
                checkOrNot.onchange = () => {
                    if(checkOrNot.checked){
                        clearSearch();
                        removeAllChildNodes();
                        checkOrNot.accessKey = "this";
                        uncheckInputs(checkOrNot, ".brand-input");
                        params.brand = brand.id;
                        params.page = 1;
                        fetchProducts(url, params);
                        location.href = "#featured";
                    }else{
                        delete params.brand;
                        params.page = 1;
                        removeAllChildNodes();
                        fetchProducts(url, params);
                    }
                }
                brandList.append(brandOnPage);
                

            });
        })
        .catch((error) => {
            console.log(error.response);
        })
}
const categoryList = document.querySelector("[category-list]");
const categoryTemplate = document.querySelector("[category-item]");
function fetchCategories() {
    axios.get("/api/categories/")
        .then(({ data }) => {
            data.forEach(category => {
                let categoryOnPage = categoryTemplate.content.cloneNode(true).children[0];
                categoryOnPage.innerHTML += category.name
                let checkOrNot = categoryOnPage.querySelector(".category-input");
                checkOrNot.onchange = () => {
                    if(checkOrNot.checked){
                        clearSearch();
                        removeAllChildNodes();
                        checkOrNot.accessKey = "this";
                        uncheckInputs(checkOrNot, ".category-input");
                        params.category = category.id;
                        params.page = 1;
                        fetchProducts(url, params);
                        location.href = "#featured";
                    }else{
                        delete params.category;
                        params.page = 1;
                        removeAllChildNodes();
                        fetchProducts(url, params);
                    }
                }
                categoryList.append(categoryOnPage);

            });
        })
        .catch((error) => {
            console.log(error.response);
        })
}
fetchBrands();
fetchCategories();

const sortNewest = document.querySelector(".sort__newest");
const sortLatest = document.querySelector(".sort__latest");

sortNewest.onchange = () => {
    if(sortNewest.checked){
        sortNewest.accessKey = "this";
        uncheckInputs(sortNewest, ".sort");
        removeAllChildNodes();
        params.sort = "DESC";
        numberOfProducts = 0;
        params.page = 1;
        fetchProducts(url, params);
    }
}
sortLatest.onchange = () => {
    if(sortLatest.checked){
        sortLatest.accessKey = "this";
        uncheckInputs(sortLatest, ".sort");
        removeAllChildNodes();
        params.sort = "ASC";
        numberOfProducts = 0;
        params.page = 1;
        fetchProducts(url, params);
    }
}
const sortHigh = document.querySelector(".sort__high");
const sortLow = document.querySelector(".sort__low");

sortHigh.onchange = ()=>{
    if(sortHigh.checked){
        sortHigh.accessKey = "this";
        uncheckInputs(sortHigh, ".sort");
        removeAllChildNodes();
        params.price = "DESC";
        numberOfProducts = 0;
        params.page = 1;
        fetchProducts(url, params);
        
    }else{
        delete params.price;
    }
}
sortLow.onchange = ()=>{
    if(sortLow.checked){
        sortLow.accessKey = "this";
        uncheckInputs(sortLow, ".sort");
        removeAllChildNodes();
        params.price = "ASC";
        numberOfProducts = 0;
        params.page = 1;
        fetchProducts(url, params);
    }else{
        delete params.price;
    }
}


function addProductsToCart(product) {
    let cart = localStorage.getItem("cart");

	if(!cart){
        product.count = 1;
		localStorage.setItem('cart',JSON.stringify([product]));
		cart = localStorage.getItem("cart");

	}else{

		let prevProducts = JSON.parse(cart);

		let productExistsInArray = prevProducts.some(element => element.id === product.id);

		if(productExistsInArray){
			prevProducts.forEach(element => {
				element.id === product.id ? element.count++ : ''; 
			})
		}else{
            product.count = 1;
			prevProducts.push(product);
		}
		
        localStorage.setItem('cart',JSON.stringify(prevProducts));
		
		cart = localStorage.getItem("cart");
	}
	cart = JSON.parse(cart);
	cartCount.textContent = cart.length
}
