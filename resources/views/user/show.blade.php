@extends('layouts.master')

@section('pageTitle')
	Siswa
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('user') }}">Siswa</a></li>
		<li class="active">{{ $siswa->first_name." ". $siswa->last_name }}</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Biodata
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12">
							@if($siswa->profile_picture == NULL)
							    <a href="#" class="thumbnail">
							     {!! HTML::image('images/nophoto.jpg') !!}
							    </a>
						    @else
						    	<a href="#" class="thumbnail">
							     {!! HTML::image('images/'.$siswa->profile_picture) !!}
							    </a>
						    @endif
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<p>{{ $siswa->first_name." ".$siswa->last_name }}</p>
							<p>{{ $siswa->email }}</p>
							<p>{{ $siswa->kelas->name }}</p>
						</div>
					</div>
										
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					Daftar kuis yang pernah dikerjakan
				</div>
				<div class="panel-body">
					<ul class="list-group">
					
						@foreach($siswa->kuis as $kuis)
							<li class="list-group-item">
							<span class="badge">{{ $kuis->pivot->skor }}</span>
						    {{ $kuis->title}}
						</li>
						@endforeach
					</ul>
					
				</div>
			</div>
		</div>
	</div>

@endsection
