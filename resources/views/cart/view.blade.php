@extends('layouts.app')

@section('content')
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0"
                style="margin-top: -25px;background-image: url('{{asset('assets/img/bg-header.jpg')}}');">
                <div class="container">
                    <h1 class="pt-5">
                        Your Cart
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            @if(\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <p> {!!  \Session::get('success') !!} </p>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
        </div>


        <section id="cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if(count($cartProducts->cartItems) > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="10%"></th>
                                            <th>Products</th>
                                            <th>Price</th>
                                            <th width="15%">Quantity</th>
                                            <th width="15%">Update</th>
                                            <th>Subtotal</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartProducts->cartItems as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('assets/img/' . $item->image) }}" alt="{{ $item->name }}"
                                                        width="60">
                                                </td>
                                                <td>
                                                    {{ $item->name }}<br>
                                                    <small>{{ rand(100, 2000) }}g</small>
                                                </td>
                                                <td>
                                                    {{$item->price}}
                                                </td>
                                                <td>
                                                    <input class="form-control" type="number" min="1"
                                                        data-bts-button-down-class="btn btn-primary"
                                                        data-bts-button-up-class="btn btn-primary" value="{{$item->qty }}"
                                                        name="vertical-spin">
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">UPDATE</a>
                                                </td>
                                                <td>
                                                    {{ $item->subtotal}}
                                                </td>
                                                <td>

                                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger p-0 border-0"
                                                            onclick="return confirm('Tem certeza que deseja remover este item?');">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <a href="{{ route('home') }}" class="btn btn-default">Continue Shopping</a>
                                </div>
                                <div class="col text-right">
                                    <div class="clearfix"></div>
                                    <h6 class="mt-3">Total: R$ {{ $cartProducts->subtotal }}</h6>

                                    <form action="{{ route('cart.checkout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="total_amount" value="{{ $cartProducts->subtotal }}"
                                            type="hidden">
                                        <button type="submit" class="btn btn-lg btn-primary">Checkout</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="empty-cart text-center py-5">
                                <h3>Your cart is empty</h3>
                                <p>Add some products to your cart!</p>
                                <a href="{{ route('home') }}" class="btn btn-primary">Shop Now</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection