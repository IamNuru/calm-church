@extends('layouts.main')
@section('head')
<title>Sermons</title>
@endsection
@section('main')

<div class="page">
    <!-- Page title-->
    <section class="section page-title bg-image context-dark" style="background-image: url(images/background/bg-4-1920x496.jpg);">
      <!--RD Navbar-->
      @include('inc.navbar')
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-xl-8">
            <h2 class="page-title-text">Donate</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="section-md bg-transparent">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <h3 class="h3-big text-center">Cart</h3>
              <div class="table-container table-responsive-md">
                <table class="table table-align-center table-cart">
                  <tr>
                    <td><a class="d-inline-block" href="single-product.html"><img src="images/product/product-3-135x170.jpg" alt="" width="135" height="170"/></a></td>
                    <td>
                      <h5><a href="single-product.html">Spring Harvest 2020 Songbook: Unleashed</a></h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                    </td>
                    <td>
                      <div class="h5">$35</div>
                    </td>
                    <td>
                      <div class="form-group table-cart-spinner">
                        <input class="form-control input-spinner" data-spinner type="number" name="spinner" value="1">
                      </div>
                    </td>
                    <td>
                      <div class="h5 text-primary">$35</div>
                    </td>
                  </tr>
                  <tr>
                    <td><a class="d-inline-block" href="single-product.html"><img src="images/product/product-3-135x170.jpg" alt="" width="135" height="170"/></a></td>
                    <td>
                      <h5><a href="single-product.html">Spring Harvest 2020 Songbook: Unleashed</a></h5>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </td>
                    <td>
                      <div class="h5">$35</div>
                    </td>
                    <td>
                      <div class="form-group table-cart-spinner">
                        <input class="form-control input-spinner" data-spinner type="number" name="spinner" value="1">
                      </div>
                    </td>
                    <td>
                      <div class="h5 text-primary">$35</div>
                    </td>
                  </tr>
                </table>
              </div>
              <table class="table table-filled table-align-1">
                <tr class="text-small">
                  <td class="text-small">Subtotal</td>
                  <td>$70.00</td>
                </tr>
                <tr>
                  <td class="text-small">Shipping:</td>
                  <td>$0.00</td>
                </tr>
                <tr>
                  <td class="text-small">Taxes:</td>
                  <td>$0.00</td>
                </tr>
                <tr>
                  <td class="text-small text-primary">Total</td>
                  <td>$70.00</td>
                </tr>
              </table><a class="btn" href="checkout.html">Checkout</a>
            </div>
          </div>
        </div>
      </section>

<!-- Footer contact-->
@include('inc.footer')
</div>

<!-- Preloader -->
@include("inc.preloader")
@endsection