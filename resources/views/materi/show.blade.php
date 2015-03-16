@extends('layouts.master')

@section('pageTitle')
	
	{{ $materi->title }}

@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('materi') }}">Materi</a></li>
		<li class="active">{{ $materi->title }}</li>
	</ol>
	
@endsection


@section('content')
	<div class="page-header">
		<h3>{{ $materi->title }}</h3>
	</div>
	<div class="row">

		<div class="col-md-9">
			<div class="panel panel-default" id="panel-preface-materi">
				<div class="panel-heading">
					<h3 class="panel-title">Pengantar</h3>
				</div>
				<div class="panel-body">
					{!! nl2br($materi->preface) !!}
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="row">
				<a href="{{ URL::to('downloadMateri/'.$materi->id) }}" class="btn btn-lg btn-block btn-primary">
					<i class="glyphicon glyphicon-download-alt"></i> Download Materi
				</a>
			</div>
			<br/>
			
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Daftar Praktikum</h3>
					</div>
					<div class="panel-body">
						@if($praktikum->count())
							@foreach($praktikum as $prak)
								<p>
									<a href="{{ URL::to('praktikum/'.$prak->id) }}">{{ $prak->title }}</a>
								</p>
							@endforeach
						@else
							<p class="alert alert-info">Tidak ada kegiatan praktikum untuk materi ini</p>	
						@endif
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
