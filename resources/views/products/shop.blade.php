@extends('layouts.app')

@section('content')

    <div id="page-content" class="page-content">
        <x-banner-header title="Shopping Page">
            Save time and leave the groceries to us.
        </x-banner-header>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-categories owl-carousel mt-5">
                        @foreach($categories as $category)
                            <div class="item">
                                <a href="{{route('single.category', $category->id)}}">
                                    <div class="media d-flex align-items-center justify-content-center">
                                        <span class="d-flex mr-2"><i class="sb-bistro-{{$category->icon}}"></i></span>
                                        <div class="media-body">
                                            <h5>{{$category->name}}</h5>
                                            <p>{{ucfirst($category->name)}} From Local Growers</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <section id="most-wanted">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Most Wanted</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($most as $mw)
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
                                                    até dez/2028
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="{{asset('assets/img/' . $mw->image)}}" alt="Card image 2"
                                                class="card-img-top img-fluid"
                                                style="object-fit: cover; width: 100%; height: 200px;">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="{{route('single.product', $mw->id)}}">{{$mw->name}}</a>
                                            </h4>
                                            <div class="card-price">
                                                <span class="reguler">R$ {{$mw->price}}</span>
                                            </div>
                                            <a href="{{route('single.product', $mw->id)}}" class="btn btn-block btn-primary">
                                                Detail Product
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="vegetables" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Vegetables</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($vegsprods as $vgs)
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
                                                    até Jan/2018
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="{{asset('assets/img/' . $vgs->image)}}" alt="Card image 2"
                                                class="card-img-top img-fluid"
                                                style="object-fit: cover; width: 100%; height: 200px;">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="{{route('single.product', $vgs->id)}}">{{$vgs->name}}</a>
                                            </h4>
                                            <div class="card-price">
                                                <span class="reguler">R$ {{$vgs->price}}</span>
                                            </div>
                                            <a href="{{route('single.product', $vgs->id)}}" class="btn btn-block btn-primary">
                                                Detail Product
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="meats">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Meats</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($meatsprods as $mp)
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
                                                    até dez/2028
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="{{asset('assets/img/' . $mp->image)}}" alt="Card image 2"
                                                class="card-img-top img-fluid"
                                                style="object-fit: cover; width: 100%; height: 200px;">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="detail-product.html">{{$mp->description}}</a>
                                            </h4>
                                            <div class="card-price">
                                                <span class="discount">R$ 300.000</span>
                                                <span class="reguler">R$ {{$mp->price}}</span>
                                            </div>
                                            <a href="detail-product.html" class="btn btn-block btn-primary">
                                                Add to Cart
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fishes" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Fishes</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($fishprods as $fish)
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
                                                    até dez/2028
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="{{asset('assets/img/' . $fish->image)}}" alt="Card image 2"
                                                class="card-img-top img-fluid"
                                                style="object-fit: cover; width: 100%; height: 200px;">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="{{route('single.product', $fish->id)}}">{{$fish->name}}</a>
                                            </h4>
                                            <div class="card-price">
                                                <span class="reguler">R$ {{$fish->price}}</span>
                                            </div>
                                            <a href="{{route('single.product', $fish->id)}}" class="btn btn-block btn-primary">
                                                Detail Product
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fruits">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Packs</h2>
                        <div class="product-carousel owl-carousel">
                            @foreach($frozenprods as $frozen)
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
                                                    até dez/2028
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="{{asset('assets/img/' . $frozen->image)}}" alt="Card image 2"
                                                class="card-img-top img-fluid"
                                                style="object-fit: cover; width: 100%; height: 200px;">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="{{route('single.product', $frozen->id)}}">{{$frozen->name}}</a>
                                            </h4>
                                            <div class="card-price">
                                                <span class="reguler">R$ {{$frozen->price}}</span>
                                            </div>
                                            <a href="{{route('single.product', $frozen->id)}}" class="btn btn-block btn-primary">
                                                Detail Product
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection