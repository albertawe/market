@extends('app')
 
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Data Produk</div>
				<div class="panel-body">

		 		<table class="table table-hover table-striped">
				<tr><th>Nama Produk</th><th>Deskripsi</th><th>Harga</th><th>Edit</th><th>Delete</th></tr>
         	   @foreach( $product as $products )
                    <tr>
				{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('dashboard.product.destroy', $products->id))) !!}
                      <td>{{ $products->name }}</td>
						<td>{{ $products->description }}</td>
						<td>{{ $products->price }}</td>
                        <td>{!! link_to_route('dashboard.product.edit', 'Edit', array($products->id), array('class' => 'btn btn-info')) !!}</td>
                         <td> {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}</td>
                    {!! Form::close() !!}
						</tr>
            @endforeach
			</table>
			 <p>{!!$product->render()!!} </p>
 			  <p>
    		  {!! link_to_route('dashboard.product.create', 'Tambah Produk') !!}
  			  </p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


