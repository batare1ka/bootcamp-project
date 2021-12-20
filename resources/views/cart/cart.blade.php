@extends('layouts.layout')
@section('content')
    <section id="blog-home" class="pt-5 mt-5 container">
        <h1 class="fw-blod pt-5">Shopping Cart</h1>
        <hr style="height: 3px" />
    </section>
    <section id="cart-container" class="container my-5">
        <table width="100%">
        <thead>
            <tr>
            <td>Remove</td>
            <td>Image</td>
            <td>Produt</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Total</td>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>
                <a href="#"> <i class="fa fa-trash-alt"></i> </a>
            </td>
            <td><img src="{{ URL('assets/images/products/shoes/1.jpg') }}" alt="" /></td>
            <td><h5>Kids Shoes Sports Running</h5></td>
            <td><h5></h5></td>
            <td><input class="w-25 ps-1" value="1" type="number" /></td>
            <td><h5>$52.00</h5></td>
            </tr>
            <tr>
            <td>
                <a href="#"> <i class="fa fa-trash-alt"></i> </a>
            </td>
            <td><img src="{{ URL('assets/images/products/shoes/2.jpg') }}" alt="" /></td>
            <td><h5>Kitty Baby Boy Sweet Sneakers</h5></td>
            <td><h5></h5></td>
            <td><input class="w-25 ps-1" value="1" type="number" /></td>
            <td><h5>$52.00</h5></td>
            </tr>
            <tr>
            <td>
                <a href="#"> <i class="fa fa-trash-alt"></i> </a>
            </td>
            <td><img src="{{ URL('assets/images/products/shoes/3.jpg') }}" alt="" /></td>
            <td><h5>LED Light Up Shoes</h5></td>
            <td><h5></h5></td>
            <td><input class="w-25 ps-1" value="1" type="number" /></td>
            <td><h5>$52.00</h5></td>
            </tr>
        </tbody>
        </table>
    </section>
    <section id="cart-bottom" class="container">
        <div class="row">
        <div class="cupon col-lg-6 col-md 6 col-12 mb-4">
            <div>
            <h5>Cupon</h5>
            <p>Enter your cupon code if you have one.</p>
            <input type="text" placeholder="cupon code" />
            <button>apply cupon</button>
            </div>
        </div>
        <div class="total col-lg-6 col-md 6 col-12">
            <div>
                <h5>Cart Total</h5>
                <div class="d-flex justify-content-between">
                    <h6>Shipping</h6>
                    <p>$52.00</p>
                </div>
                <div class="d-flex justify-content-between">
                    <h6>Subtotal</h6>
                    <p>$52.00</p>
                </div>
                <hr class="second-hr" />
                <div class="d-flex justify-content-between">
                    <h6>Total</h6>
                    <p>$52.00</p>
                </div>
                <button class="ms-auto">proceed to checkout</button>
            </div>
            </div>
        </div>
    </section>
@endsection;