@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <section class="gallery-wrap">
                        <div class="img-big-wrap">
                            <a href="#">
                                <img src="{{Storage::url($product->image)}}" class="w-100" >
                            </a>
                        </div>
                    </section>
                </aside>
                <aside class="class-sm-7">
                    <section class="card-body p-5">
                        <h3 class="title mb-3">
                           {{$product->name}}
                        </h3>
                        <p class="price-detail-wrap">
                            <span class="price h3 text-danger">
                                <span class="currency">
                                    US $
                                </span>{{$product->price}}
                            </span>
                        </p>
                        <h3>
                            Description
                        </h3>
                        <p>
                            {!!$product->description!!}
                        </p>
                        <h3>
                            additional
                        </h3>
                        <p>
                            {!!$product->additional_info!!}
                        </p>
                        <hr>
                        <a href="#" class="btn btn-lg btn-outline-primary text-uppercase">add to cart</a>

                    </section>
                </aside>
            </div>
        </div>

        @if(count($productFromSameCategories)>0)
        <div class="jumbotron">
            <h3>You may like </h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($productFromSameCategories as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{Storage::url($product->image)}}" height="200" style="width: 100%">
                            <div class="card-body">
                                <p>
                                    <b>{{$product->name}}</b>
                                </p>
                                <p class="card-text">
                                    {{Str::limit($product->description,120)}}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{route('product.view',$product->id)}}"> <button type="button" class="btn btn-sm btn-outline-success">View</button></a>
                                        <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                    </div>
                                    <small class="text-muted">${{$product->price}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endsection
