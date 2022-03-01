@extends('layouts.layout')
@section('content')
<section id="blog-home" class="container pt-5 mt-5">
    <h1 class="fw-blod pt-5">Shopping Cart</h1>
    <hr style="height: 3px" />
</section>
<section class="container px-0 mt-5 mb-5 mx-auto text-center w-50 empty-cart__block">
    <h1 class="fw-blod pt-1 empty-cart__block-title">Cart is empty</h1>
    <hr class="empty-cart__block-bar" />
    <button class="mx-auto mb-4 empty-cart__block-btn">go to shop</button>
</section>
<section id="cart-container" class="container my-5">
    <table width="100%">
        <thead>
            <tr>
                <td style="width: 10%">Remove</td>
                <td style="width: 15%">Image</td>
                <td style="width: 40%">Product</td>
                <td style="width: 10%">Price</td>
                <td style="width: 10%">Quantity</td>
                <td style="width: 15%">Total</td>
            </tr>
        </thead>
        <tbody cart-list>
            <template cart-item>
            <tr>
                <td>
                    <span class="remove-btn"><i class="fa fa-trash-alt"></i></span>
                </td>
                <td><img class="product-img" src="" alt="" /></td>
                <td>
                    <h5 class="product-title"></h5>
                </td>
                <td>
                    <h5 class="product-price"></h5>
                </td>
                <td><input class="product-count" value="1" type="number" /></td>
                <td>
                    <h5 class="total-per-product"></h5>
                </td>
            </tr>
            </template>
        </tbody>
    </table>
</section>
<section id="cart-bottom" class="container pb-5">
    <div class="row">
        <div class="cupon col-lg-6 col-md 6 col-12 mb-4">
            <div>
                <h5>Cupon</h5>
                <p class="fs-5">Enter your cupon code if you have one.</p>
                <input type="text" placeholder="cupon code" />
                <button>apply cupon</button>
            </div>
        </div>
        <div class="total col-lg-6 col-md 6 col-12">
            <div>
                <h5>Cart Total</h5>
                <div class="d-flex justify-content-between shipping">
                    <h6>Shipping</h6>
                    <p>$0.00</p>
                </div>
                <div class="d-flex justify-content-between subtotal">
                    <h6>Subtotal</h6>
                    <p>$0.00</p>
                </div>
                <hr class="second-hr" />
                <div class="d-flex justify-content-between total-price">
                    <h6>Total</h6>
                    <p>$0.00</p>
                </div>
                <button class="ms-auto checkou-btn">proceed to checkout</button>
            </div>
        </div>
    </div>
</section>
@endsection;