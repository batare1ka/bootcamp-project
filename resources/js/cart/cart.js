const itemsList = document.querySelector("[cart-list]");
const cartItem = document.querySelector("[cart-item]");
let cartItems = localStorage.getItem("cart");

if(cartItems && cartItems != "[]"){
    let shipping = 0;
    let shippingTag = document.querySelector(".shipping p");
    let subtotal = 0;
    let subtotalTag = document.querySelector(".subtotal p");
    let totalPriceTag = document.querySelector(".total-price p");

	cartItems = JSON.parse(localStorage.getItem("cart"));

	
	
	cartItems.forEach(item => {

        shipping += 2.5 * item.count; 
        subtotal += item.price * item.count;
        
		let tableItem = cartItem.content.cloneNode(true).children[0];

        let removeBtn = tableItem.querySelector(".remove-btn");

        removeBtn.addEventListener("click", () => {
            shipping -= 2.5 * item.count; 
            subtotal -= item.price * item.count;

            shippingTag.textContent = `$ ${shipping}`;
            subtotalTag.textContent = `$ ${subtotal}`;
            totalPriceTag.textContent = `$ ${shipping + subtotal}`;

            removeItemFromCart(item.id, tableItem);
            if(cartItems.length == 0){
                switchCartBlockToEmpty();
            }
        });

        let image = tableItem.querySelector(".product-img");
        image.src = item.image_url;
        image.addEventListener("click", () => {
            location.href = `http://localhost:880/product/${item.id}`
        })

        let title = tableItem.querySelector(".product-title");
		title.textContent = item.name;
        title.addEventListener("click", () => {
            location.href = `http://localhost:880/product/${item.id}`
        })

		let itemPrice = tableItem.querySelector(".product-price");
        itemPrice.textContent = `$ ${item.price.toFixed(2)}`;

		let itemCount = tableItem.querySelector(".product-count");
        itemCount.value = item.count;
        itemCount.oninput = () => {
            if(itemCount.value < 1){
                shipping -= 2.5 * item.count; 
                subtotal -= item.price * item.count;
    
                shippingTag.textContent = `$ ${shipping}`;
                subtotalTag.textContent = `$ ${subtotal}`;
                totalPriceTag.textContent = `$ ${shipping + subtotal}`;
                removeItemFromCart(item.id, tableItem);
            }else{
                let inputValInt = parseInt(itemCount.value);
                if(inputValInt > item.count){
                    shipping += 2.5; 
                    subtotal += item.price;
                }else{
                    shipping -= 2.5;
                    subtotal -= item.price;
                }
                item.count = inputValInt;
                shippingTag.textContent = `$ ${shipping}`;
                subtotalTag.textContent = `$ ${subtotal}`;
                totalPriceTag.textContent = `$ ${shipping + subtotal}`;
                

                totalPerProduct.textContent = `$ ${(item.price * item.count).toFixed(2)}`;
                localStorage.setItem('cart',JSON.stringify(cartItems));
            }
            if(cartItems.length == 0){
                switchCartBlockToEmpty();
            }
            
        };

        let totalPerProduct = tableItem.querySelector(".total-per-product");
        totalPerProduct.textContent = `$ ${(item.price * item.count).toFixed(2)}`;

        itemsList.append(tableItem);        
	});
    shippingTag.textContent = `$ ${shipping}`;
    subtotalTag.textContent = `$ ${subtotal}`;
    totalPriceTag.textContent = `$ ${shipping + subtotal}`;
}else {
    switchCartBlockToEmpty();
}
document.querySelector(".empty-cart__block-btn").addEventListener("click", () => location.href = "http://localhost:880/shop");
function switchCartBlockToEmpty() {
    document.getElementById("cart-container").style.display = "none";
    document.getElementById("cart-bottom").style.display = "none";
    document.querySelector(".empty-cart__block").style.display = "block";
    
}

function removeItemFromCart(id, tableItem) {
    tableItem.remove();
    cartItems = cartItems.filter(e => e.id !== id);
    document.getElementById("total-items").textContent = cartItems.length;
    localStorage.setItem('cart',JSON.stringify(cartItems));
}

document.querySelector(".checkou-btn").addEventListener("click", ()=> {
    location.href = 'http://localhost:880/checkout/';
})
