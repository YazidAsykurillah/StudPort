@extends('layouts.master')

@section('pageTitle')
	{{ $praktikum->title }}
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('praktikum') }}">Praktikum</a></li>
		<li class="active">{{ $praktikum->title }}</li>
	</ol>
	
@endsection


@section('content')
	<div class="page-header">
		<h3>{{ $praktikum->title }}</h3>
		Materi  : {{$praktikum->materi->title }}
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
						<a href="{{ URL::to('downloadPraktikum/'.$praktikum->id) }}" class="btn btn-lg btn-block btn-primary">
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

@endsection

@section('necessaryScripts')

<script type="text/javascript">
		
		
	</script>
	
@endsection
