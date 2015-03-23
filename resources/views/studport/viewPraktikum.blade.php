@extends('layouts.master')

@section('pageTitle')
	{{ $praktikum->title }}
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('getPraktikum') }}">Praktikum</a></li>
		<li class="active">{{ $praktikum->title }}</li>
	</ol>
	
@endsection


@section('content')
	<div class="page-header">
		<h3>{{ $praktikum->title }}</h3>
		Materi  : {{$praktikum->materi->title }}
	</div>
	<div class="row">
		@if(Session::has('resultMessage'))
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  	{{ Session::get('resultMessage') }}
			</div>
		@endif
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default" id="panel-detail">
				<div class="panel-heading">
					<strong class="panel-title">Alat dan Bahan</strong>
				</div>
				<div class="panel-body">
					{!! nl2br($praktikum->tools) !!}
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="panel panel-default" id="panel-detail">
				<div class="panel-heading">
					<strong class="panel-title">Langkah Kerja</strong>
				</div>
				<div class="panel-body">
					{!! nl2br($praktikum->steps) !!}
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" id="panel-detail">
				<div class="panel-heading">
					<strong class="panel-title">File Pendukung</strong>
				</div>
				<div class="panel-body">
					@if($praktikum->files)
						<a href="{{ URL::to('downloadFilePraktikum/'.$praktikum->id) }}" class="btn btn-lg btn-block btn-primary">
							<i class="glyphicon glyphicon-download-alt"></i> Download file
						</a>
					@else
						<p class="alert alert-info">
							<i class="glyphicon glyphicon-info-sign"></i>&nbsp;Tidak ada file
						</p>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="page-header">
			<h4>Foto Praktikum</h4>
		</div>
		<div class="row">
			<div class="col-md-2">
				<a href="#" class="btn btn-sm btn-success" id="openFormUpload" title="Klik untuk membuka form upload foto praktikum">
					<i class="glyphicon glyphicon-screenshot"></i>
				</a>
				<a href="#" class="btn btn-sm btn-danger" id="closeFormUpload" title="Tutup form upload foto praktikum">
					<i class="glyphicon glyphicon-remove-circle"></i>
				</a>
			</div>
			<div class="col-md-6">
				{!! Form::open(['url'=>'uploadPraktikumPhoto', 'class'=>'form-horizontal', 'role'=>'form', 'files'=>true, 'id'=>'uploadPraktikumPhoto']) !!}
					<div class="form-group {{$errors->has('foto')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Pilih Foto</label>
						{!! Form::file('foto') !!}
						{!! $errors->first('foto', '<span class="help-block">:message</span>') !!}
					</div>
					<div class="form-group">
						{!! Form::hidden('user_id', Auth::user()->id ) !!}
						{!! Form::hidden('praktikum_id', $praktikum->id) !!}
					</div>
					<div class="form-group {{$errors->has('foto')? 'has-error' : '' }}">
						<label class="col-md-4 control-label"></label>
						<button type="submit" class="btn btn-default">Upload</button>
					</div>
					
				{!! Form::close() !!}
			</div>
			
		</div>
		<p></p>
		<br/>
		<div class="row">
			<div class="col-md-12">
				@if(count($siswa))
					@foreach($siswa as $sis)
						<div class="col-sm-6 col-md-3" id="praktikumGallery">
					      	<a href="#" class="thumbnail">
					         	 {!! HTML::image('images/'.$sis->pivot->foto, $sis->first_name, array('style'=>'width:300px;height:150px;')) !!}
					      	</a>
						     <div class="caption">
						        <h5>{{ $sis->first_name." ".$sis->last_name }}</h5>
						    </div>
				  		</div>
					@endforeach
				@else
					<p class="alert alert-info">Belum ada siswa yang mengirimkan foto praktikum</p>
				@endif
			</div>

		</div>


	</div>

@endsection

@section('necessaryScripts')

<script type="text/javascript">
	
	$(function(){
		$('#uploadPraktikumPhoto').hide();
		$('#closeFormUpload').hide();
		$('#openFormUpload').click(function(){
			$(this).hide();
			$('#closeFormUpload').show();
			$('#uploadPraktikumPhoto').show();
			return false;
		});

		$('#closeFormUpload').click(function(){
			$(this).hide();
			$('#openFormUpload').show();
			$('#uploadPraktikumPhoto').hide();
			return false;
		});
	});
		
</script>
	
@endsection
