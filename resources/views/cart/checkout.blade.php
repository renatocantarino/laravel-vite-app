@extends('layouts.app')

@section('content')
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0"
                style="margin-top: -25px;background-image: url('{{asset('assets/img/bg-header.jpg')}}');">
                <div class="container">
                    <h1 class="pt-5">
                        Checkout
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7">
                        <h5 class="mb-3">BILLING DETAILS</h5>
                        <!-- Bill Detail of the Page -->
                        <form method="POST" action="{{ route('checkout.start') }}" class="bill-detail">
                            <fieldset>
                                @csrf
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" value="{{ $userInfo['name'] }}" placeholder="Name"
                                            type="text" name="userName" readonly>
                                    </div>
                                    <div class="col">
                                        <input class="form-control"  name="lastName" placeholder="Last Name" type="text">
                                    </div>
                                </div>

                                 <input type="hidden" name="cartId" value="{{ $cartProducts->id }}">
                                 <input type="hidden" name="orderTotal" value="{{ $cartProducts->cartTotal }}">

                                <div class="form-group">
                                    <textarea class="form-control"  name="Address" placeholder="Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="city"  placeholder="Town / City" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="country" placeholder="State / Country" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="zipcode" placeholder="Postcode / Zip" type="text">
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" value="{{ $userInfo['email'] }}"
                                            placeholder="Email Address" name="email" type="email" readonly>
                                    </div>
                                    <div class="col">
                                        <input class="form-control" name="phone" placeholder="Phone Number" type="tel">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="orderNotes" placeholder="Order Notes"></textarea>
                                </div>

                                <p class="text-right mt-3">
                                    <input checked="" type="checkbox"> I’ve read &amp; accept the <a href="#">terms &amp;
                                        conditions</a>
                                </p>
                                <button class="btn btn-primary float-right" name="submit" type="submit">PROCEED TO CHECKOUT
                                    <i class="fa fa-check"></i>

                                </button>
                            </fieldset>
                        </form>
                        <!-- Bill Detail of the Page end -->
                    </div>
                    <div class="col-xs-12 col-sm-5">
                        <div class="holder">
                            <h5 class="mb-3">YOUR ORDER</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th class="text-right">Unit</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartProducts->cartItems as $item)
                                            <tr>
                                                <td>
                                                    {{$item->name  }} x {{ $item->qty }}
                                                </td>
                                                <td class="text-right">
                                                    {{ number_format($item->price, 2, '.', '') }}
                                                </td>
                                                <td class="text-right">
                                                    {{ number_format($item->subtotal, 2, '.', '')  }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <td>
                                                <strong>Cart Subtotal</strong>
                                            </td>
                                            <td class="text-right">
                                            </td>

                                            <td class="text-right">
                                                {{  number_format($cartProducts->subtotal, 2, '.', '') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Shipping</strong>
                                            </td>
                                            <td class="text-right"></td>


                                            <td class="text-right">
                                                {{  number_format($cartProducts->tax, 2, '.', '') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>ORDER TOTAL</strong>
                                            </td>
                                            <td class="text-right"></td>
                                            <td class="text-right">
                                                <strong> {{  number_format($cartProducts->cartTotal, 2, '.', '') }}</strong>
                                            </td>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>


                        </div>

                        <div class="clearfix">
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection