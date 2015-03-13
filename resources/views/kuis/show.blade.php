@extends('layouts.master')


@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('kuis') }}">Kuis</a></li>
		<li class="active">{{ $kuis->title }}</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Objectives : </h3>
				</div>
				<div class="panel-body">
					{{ nl2br($kuis->objectives) }}
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Daftar soal pada kuis {{ $kuis->title }}</h3>
					<a class="btn btn-sm btn-info">
						<i class="glyphicon glyphicon-info-sign"></i>&nbsp;Jumlah soal&nbsp;<span class="badge">{{ $kuis->soal->count() }}</span>
					</a>
					
				</div>
				<div class="panel-body">
					@if($soal->count())
						@foreach($soal as $so)
							<div class="panel panel-default">
							  	<div class="panel-heading">
							    	{{ $so->soal }}
							  	</div>
							  	<div class="panel-body">
							    	<ul class="list-group">
									  <li class="list-group-item">A. {{ $so->opsiA }}</li>
									  <li class="list-group-item">B. {{ $so->opsiB }}</li>
									  <li class="list-group-item">C. {{ $so->opsiC }}</li>
									  <li class="list-group-item">D. {{ $so->opsiD }}</li>
									  <li class="list-group-item"><strong>Jawaban Benar : {{ $so->opsiBenar }} </strong></li>
									  
									</ul>
									
							  	</div>
							</div>
						@endforeach
					@else
						<p class="alert alert-info">Tidak ada soal pada kuis ini</p>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-2">
			{!! HTML::link('createSoal/'.$kuis->id,'Tambahkan soal',['class'=>'btn btn-primary', 'title'=>'Tambahkan soal pada kuis ini'] ) !!}
		</div>
	</div>

@endsection

@section('necessaryScripts')
	<script type="text/javascript">
		
		
	</script>
@endsection
