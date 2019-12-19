@extends('layouts.app')

@section('content')
<hr>
<center><h3>Products</h3></center>
<hr>
<div class="container-fluid">
    <table class="table table-hover table-bordered">
        <thead class="thead-inverse">
        <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Checkout</th>
        </tr>
        </thead>

        @foreach((array)$planData as $singlePlan)
            <tr>
                <td>{{$singlePlan['productName']}}</td>
                <td>{{$singlePlan['productPrice']}}</td>
                @if(isset($singlePlan['checkoutUrl'])) {
                    <td><a class="btn btn-primary btn-sm" href="{{url('/') . $singlePlan['checkoutUrl']}}?userId=1&userEmail=bilafaisal321@gmail.com">Checkout</a></td>
                }
                @endif   
            </tr>
        @endforeach
    </table>
</div>
@endsection