@extends('app')
 
@section('content')
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Laporan Pemesanan Periode</div>
				<div class="panel-body">
				@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
				@endif
 
    			{!! Form::model(new App\Transaction, ['class' => 'form-horizontal','files'=>true, 'route' => ['laporan.show']]) !!}
				<div class="form-group">
 				{!! Form::label('awal', 'Periode Awal', array('class' => 'col-md-4 control-label'))  !!}
				<div class="col-md-6">
				{!! Form::text('awal',null, array('id' => 'datepicker','class' => 'form-control'),'') !!}
				</div>
				</div>
				
				<div class="form-group">
 				{!! Form::label('akhir', 'Periode Akhir', array('class' => 'col-md-4 control-label'))  !!}
				<div class="col-md-6">
				{!! Form::text('akhir',null, array('id' => 'datepicker2','class' => 'form-control'),'') !!}				
				</div>
				</div>
				<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
    			{!! Form::submit('Kirim', ['class'=>'btn primary']) !!}
				</div>
    			{!! Form::close() !!}
	
					</div>
			</div>
		</div>
	</div>
</div>	
@endsection