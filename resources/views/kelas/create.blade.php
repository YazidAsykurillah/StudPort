@extends('layouts.master')


@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('kelas') }}">Kelas</a></li>
		<li class="active">Tambah Kelas</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
			  	<h3>Tambah kelas baru <small>Silahkan tambahkan kelas baru</small></h3>
			</div>
			{!! Form::open(['route'=>'kelas.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}
				<div class="form-group {{$errors->has('name')? 'has-error' : '' }}">
					<label class="col-md-4 control-label">Nama Kelas</label>
					<div class="col-md-6">
						{!! Form::text('name',null,['class'=>'form-control']) !!}
						{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-6">
						<button type="submit" class="btn btn-primary">
							<i class="glyphicon glyphicon-save"></i>&nbsp;Simpan
						</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection
