@extends('toko.master')
				
@section('content')
<!-- app/views/productcart.blade.php -->

<div class="container">
	<h4><i class="fa fa-shopping-cart"></i>Keranjang Belanja</h4>
	<!-- Panel -->
	<div class="panel">
		<div class="panel-heading"></div>
		<table class="table table-striped m-b-none text-sm">
          <thead>
            <tr>
              <th width="8">No</th>
              <th width="300">Product Name</th>                    
              <th>Price</th>
              <th width="100">Quantity</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>

          <?php $i = 1; ?>
          @foreach($cart_content as $cart)
          	<tr>
          		<td>{{ $i }}</td>
          		<td>{{ $cart->name }}</td>
          		<td>{{ $cart->price }}</td>
          		<td>{{ $cart->qty }}</td>
          		<td>
          			<a href="{{ url('cart/delete/'.$cart->rowid) }}">delete</a>
          		</td>
          	</tr>
          <?php $i++; ?>
          @endforeach
		 <tr>
         <td class="highrow"></td>
         <td class="highrow"></td>		
         <td ><strong>Subtotal</strong></td>
         <td >{{ Cart::total() }}</td>
		   <td class="highrow"></td>
         </tr>
          </tbody>
      </table>
      <div class="panel-footer">
      	<a href="{{ url('/') }}" class="btn btn-white">Continue Shopping</a>
      	<a href="{{ url('cart/checkout') }}" class="btn btn-info">Checkout</a></div>
	</div>
    <!-- / Panel -->
</div>
@endsection