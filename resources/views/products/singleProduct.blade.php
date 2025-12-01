@extends('layouts.app')

@section('content')
    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="margin-top: -25px;background-image: url('{{asset('assets/img/bg-header.jpg')}}');">
                <div class="container">
                    <h1 class="pt-5">
                        {{$product->name}}
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
        
        <div class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="slider-zoom">
                            <a href="{{asset('assets/img/'.$product->image.'')}}" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                                <img alt="Detail Zoom thumbs image" src="{{asset('assets/img/'.$product->image)}}" style="width: 100%;">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p>
                            <strong>Overview</strong><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <span class="price">R$ {{number_format($product->price,2,',','.')}}</span>
                                    <span class="old-price">R$ {{ number_format($product->price + 30, 2, ',', '.') }}</span>
                                </p>
                            </div>

                        </div>
                        <p class="mb-1">
                            <strong>Quantity</strong>
                        </p>

                        <form method="POST" action="{{ route('cart.add') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                <input name="qty" class="form-control" type="number" min="1" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="1" name="vertical-spin">
                                </div>
                                <div class="col-sm-6"><span class="pt-1 d-inline-block">Pack (1000 gram)</span></div>
                            </div>

                            <input name="name" value="{{$product->name}}" type="hidden">
                            <input name="price" value="{{$product->price}}" type="hidden">
                            <input name="prod_id" value="{{$product->id}}" type="hidden">
                            <input name="image" value="{{$product->image}}" type="hidden">

                            <button name="submit" type="submit" class="mt-3 btn btn-primary btn-lg">
                                <i class="fa fa-shopping-basket"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section id="related-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Related Products</h2>
                        @if ($relatedProducts->count() > 0)
                        <div class="product-carousel owl-carousel">
                            @foreach ($relatedProducts as $rel)
                              <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">

                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="{{asset('assets/img/'.$rel->image)}}" alt="Card image 2" class="card-img-top"
                                          style="object-fit: cover; width: 100%; height: 200px;">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="detail-product.html">  {{$rel->name}}</a>
                                        </h4>
                                        <div class="card-price">
                                            <span class="discount">R$ 300.000</span>
                                            <span class="reguler">R$ {{ number_format($rel->price + 30, 2, ',', '.') }}</span>
                                        </div>
                                        <a href="{{route('single.product',$rel->id)}}" class="btn btn-block btn-primary">
                                            product details
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                          <center><a class="alert alert-success">No related products found</a></center>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection



