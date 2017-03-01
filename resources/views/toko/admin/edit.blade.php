@extends('app')
 
@section('content')
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Data Produk</div>
				<div class="panel-body">
				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif
 
    {!! Form::model($product, ['method' => 'PATCH', 'route' => ['dashboard.product.update', $product->id],'class' => 'form-horizontal','files' => true]) !!}
       			 <div class="form-group">
 				{!! Form::label('name', 'Nama Produk', array('class' => 'col-md-4 control-label'))  !!}
				<div class="col-md-6">
				{!! Form::text('name', null,array('class' => 'form-control'),'') !!}</div>
				</div>
				<div class="form-group">
				{!! Form::label('description', 'Deskripsi', array('class' => 'col-md-4 control-label')) !!}
				<div class="col-md-6">{!! Form::textarea('description',null, array('class' => 'form-control')) !!}	</div>
				</div>
				<div class="form-group">
 				{!! Form::label('price', 'Harga', array('class' => 'col-md-4 control-label'))  !!}
				<div class="col-md-6">
				{!! Form::text('price', null,array('class' => 'form-control'),'') !!}</div>
				</div>
 				<div class="form-group">
				{!! Form::label('image', 'Ganti Gambar Produk', array('class' => 'col-md-4 control-label'))  !!}
				<div class="col-md-6">
         		 {!! Form::file('image','',['class' => 'btn']) !!}
			     {!! HTML::image($product->image,'', array('width' => '80%', 'height' => '50%')) !!}

	  			<p class="errors">{!!$errors->first('image')!!}</p>
				@if(Session::has('error'))
				<p class="errors">{!! Session::get('error') !!}</p>
				@endif
				</div>
     		   </div>
				<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
    			{!! Form::submit('Update Produk', ['class'=>'btn primary']) !!}
				</div>
    			{!! Form::close() !!}
	
						</div>
			</div>
		</div>
	</div>
</div>	
@endsection

