@extends('layouts.master')

@section('pageTitle')
	Edit Praktikum {{ $praktikum->title }}
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('praktikum') }}">Praktikum</a></li>
		<li class="active">{{ $praktikum->title }}</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>{{ $praktikum->title }}</strong>
					
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<span class="pull-right">Judul Praktikum : </span>
						</div>
						<div class="col-md-9">
							{{ $praktikum->title }}
						</div>
					</div>
					<p></p>
					<div class="row">
						<div class="col-md-3">
							<span class="pull-right">Materi : </span>
						</div>
						<div class="col-md-9">
							{{ $praktikum->materi->title }}
						</div>
					</div>
					<p></p>
					<div class="row">
						<div class="col-md-3">
							<span class="pull-right">Alat dan Bahan : </span>
						</div>
						<div class="col-md-9">
							{!! nl2br($praktikum->tools) !!}
						</div>
					</div>
					<p></p>
					<div class="row">
						<div class="col-md-3">
							<span class="pull-right">Cara Kerja : </span>
						</div>
						<div class="col-md-9">
							{!! nl2br($praktikum->steps) !!}
						</div>
					</div>
					<p></p>
					<div class="row">
						<div class="col-md-3">
							<span class="pull-right">File Pendukung : </span>
						</div>
						<div class="col-md-9">
							@if(is_null($praktikum->files))
								Tidak ada
							@else
								{{ $praktikum->files }}
							@endif
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection

@section('necessaryScripts')

<script type="text/javascript">
		
		
	</script>
	
@endsection
