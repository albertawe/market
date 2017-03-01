@extends('toko.master')
				
@section('content')
	<!-- Comment form -->
					<article>
						<h4>Isikan Data Anda</h4>
						{!! Form::open(['route'=>['pelanggan.save',$formid],'role'=> 'form', 'class' => 'form-horizontal']) !!}
						
						<div class="panel-body">
						@if ($errors->any())
					<div class='flash alert-danger'>
					@foreach ( $errors->all() as $error )
					<p>{{ $error }}</p>
					@endforeach
					</div>
					@endif
				
						<div class="form-group">
						{!! Form::label('nama', 'Nama Lengkap', array('class' => 'col-md-4 control-label'))  !!}
						<div class="col-md-6">
					 	{!! Form::text('nama', null,array('class' => 'form-control', 'placeholder'=>'Nama'),'') !!}</div>
						{!! Form::hidden('formid', $formid) !!}
						  </div>
						  
						<div class="form-group">
						{!! Form::label('telepon', 'Nomor Handphone', array('class' => 'col-md-4 control-label'))  !!}
						<div class="col-md-6">
					 	{!! Form::text('telepon', null,array('class' => 'form-control','placeholder'=>'handphone'),'') !!}</div>
						  </div>
						  
						<div class="form-group">
						{!! Form::label('alamat', 'Alamat lengkap', array('class' => 'col-md-4 control-label'))  !!}
						<div class="col-md-6">
						{!! Form::textarea('alamat',null, array('class' => 'form-control','placeholder'=>'alamat')) !!}</div>
						</div>
						
						<div class="form-group">
						{!! Form::label('propinsi', 'Propinsi', array('class' => 'col-md-4 control-label'))  !!}
						<div class="col-md-6">
					 	{!! Form::text('propinsi', null,array('class' => 'form-control','placeholder'=>'propinsi'),'') !!}</div>
						  </div>
						
						<div class="form-group">
						{!! Form::label('kodepos', 'Kodepos', array('class' => 'col-md-4 control-label'))  !!}
						<div class="col-md-6">
					 	{!! Form::text('kodepos', null,array('class' => 'form-control','placeholder'=>'kodepos'),'') !!}
						  </div>
						  
						  </div>
						  <div class="col-md-12 form-group text-center">
							{!! Form::submit('Submit', ['class'=>'btn btn-primary btn-large']) !!}
						  </div>
						{!! Form::close() !!}				
					</article>
@endsection