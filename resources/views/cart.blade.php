@extends('layouts.app')

@section('content')


    <div class="container">
        @if($errors->any())
            @foreach($errors->all() as $errors)
                <div class="alert alert-danger">{{$errors}}</div>
            @endforeach
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">Product</th>
                <th scope="col">price</th>
                <th scope="col">Qty</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody>
            @if($cart)
            @php $i=1@endphp
            @foreach($cart->items as $product)
            <tr>
                <th scope="row">{{$i++}}</th>
                <th><img src="{{Storage::url($product['image'])}}" alt="image" width="100"></th>
                <td>{{$product['name']}}</td>
                <td>{{$product['price']}}</td>

                <td>
                    <form action="{{route('cart.update',$product['id'])}}" method="POST">
                        @csrf
                        <input type="number" name="qty" value="{{$product['qty']}}">
                        <button class="btn btn-secondary btn-sm"><i class="fas fa-sync"></i></button>
                    </form>
                </td>

                <td>
                    <form action="{{route('cart.remove',$product['id'])}}" method="POST">
                        @csrf
                        <button class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <div class="card-footer">
            <button class="btn btn-primary">Continue shopping</button>
            <span style="margin-left: 300px;">Total price: ${{$cart->totalPrice}}</span>
            <button class="btn btn-info float-right">Checkout</button>
        </div>
        @else
          <td>No items in cart</td>
        @endif
    </div>


@endsection
