@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <section class="gallery-wrap">
                        <div class="img-big-wrap">
                            <a href="#">
                                <img src="{{asset("/storage/product/PF3Xac3mcZwpDmBf4pHMtCvswGwKTZSQZoLg4F1D.jpg")}}" class="w-100" >
                            </a>
                        </div>
                    </section>
                </aside>
                <aside class="class-sm-7">
                    <section class="card-body p-5">
                        <h3 class="title mb-3">
                            Name of the product
                        </h3>
                        <p class="price-detail-wrap">
                            <span class="price h3 text-danger">
                                <span class="currency">
                                    US $450
                                </span>
                            </span>
                        </p>
                        <h3>
                            Description
                        </h3>
                        <p>
                            here is description
                        </p>
                        <h3>
                            additional
                        </h3>
                        <p>
                            here is additional info
                        </p>


                        <hr>

                        <div class="row">
                            <div class="form-inline">
                                <h3>Quantity:</h3>
                                <input type="text" name="qty" class="form-control">
                                <input type="submit" class="btn btn-primary ml-2">
                            </div>

                        </div>
                        <hr>
                        <a href="#" class="btn btn-lg btn-outline-primary text-uppercase">add to cart</a>

                    </section>
                </aside>
            </div>
        </div>
    </div>
@endsection
