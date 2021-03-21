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

{{--                        <div class="row">--}}
{{--                            <div class="form-inline">--}}
{{--                                <h3>Quantity:</h3>--}}
{{--                                <input type="text" name="qty" class="form-control">--}}
{{--                                <input type="submit" class="btn btn-primary ml-2">--}}
{{--                            </div>--}}

{{--                        </div>--}}
                        <hr>
                        <a href="#" class="btn btn-lg btn-outline-primary text-uppercase">add to cart</a>

                    </section>
                </aside>
            </div>
        </div>
    </div>
@endsection
