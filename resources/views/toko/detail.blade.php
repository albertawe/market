@extends('toko.master')
				
@section('content')

			<article>
					<h2><a href="{!! url('/product/'.$product->id.'/show') !!}">{{$product->name}}</a></h2>

			        <div class="row">
			          	<div class="col-sm-6 col-md-6">
			          	</div>
			          	<div class="col-sm-6 col-md-6">
		          		
			          	</div>
			          </div>

			          <hr>
					  <div class="thumbnail">
			          <img src="{{ asset($product->image) }}" class="img-responsive"></div>
		          <br />

			          <p>{{$product->description}}</p>
					  <p class="text-right">
					  </p>
					  <p class="text-center">
					   <a href="{!! url('product/cart/'.$product->id) !!}" class="btn-lg btn-primary">Beli</a></p>
			          <hr>
				</article>
@endsection



				