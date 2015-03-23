@extends('layouts.master')

@section('pageTitle')
	Kuis
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('kuis') }}">Kuis</a></li>
		<li class="active">{{ $kuis->title }}</li>
	</ol>
	
@endsection


@section('content')
	<div class="page-header">
		<h3>{{ $kuis->title }}</h3>
		
	</div>
	<div class="row">	
		<div class="col-md-9">
			<div class="page-header">
				<div class="row">
					<div class="col-md-7">
						<h4>Daftar soal</h4>
					</div>
					<div class="col-md-5">
						{!! HTML::link('createSoal/'.$kuis->id,'Tambahkan soal',['class'=>'btn btn-primary pull-right', 'title'=>'Tambahkan soal pada kuis ini'] ) !!}
					</div>
				</div>
				
				
			</div>
			@if($soal->count())
				@foreach($soal as $index => $so)

					<div class="panel panel-default" id="panel_soal_{{$so->id}}">
					  	<div class="panel-heading">
					    	No.&nbsp;{{ $index+1}}
					    	<div class="pull-right">
						    	<!-- <a href="#" class="btn btn-xs btn-info">
						    		<i class="glyphicon glyphicon-edit"></i>
						    	</a> -->
						    	<a href="#" class="btn btn-xs btn-danger" onClick="deleteSoal({{$so->id}}); return false" title="Hapus soal ini">
						    		<i class="glyphicon glyphicon-trash"></i>
						    	</a>
						    </div>
					  	</div>
					  	<div class="panel-body">
					  		{!! nl2br($so->soal) !!}
					  		<p></p>
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
		<div class="col-md-3">
			<div class="page-header">
				<h4>Keterangan</h4>
			</div>
			<div class="row">
				<p></p>
				<div class="panel panel-default">
				  	<div class="panel-heading">
				    	Jumlah Soal
				  	</div>
				  	<div class="panel-body">
				  		{{ $kuis->soal->count() }}
				  	</div>

				</div>
				<div class="panel panel-default">
				  	<div class="panel-heading">
				    	Objektif
				  	</div>
				  	<div class="panel-body">
				  		{!! nl2br($kuis->objectives) !!}
				  	</div>

				</div>
				<div class="panel panel-default">
				  	<div class="panel-heading">
				    	Waktu (menit)
				  	</div>
				  	<div class="panel-body">
				  		<i>{{ $kuis->timer }}</i>
				  	</div>

				</div>

			</div>
			
		</div>
	</div>

@endsection

@section('necessaryScripts')
	<script type="text/javascript">
		function deleteSoal(id){
			var  idSoal = id;
			var dataDelete = 'id='+idSoal;
			
			var conf = confirm('Yakin mau menghapus soal ini?');
			if(conf == true){

				$.ajax({

					url : '{{ URL::to('hapusSoal') }}',
					type : 'GET',
					data : dataDelete,
					beforeSend : function(){},
					success : function(response){
						if(response == 'deleted'){
							
							window.location.reload();
						}
						else{
							alert(response);
						}
					}

				});
			}
			return false;
		}
		
	</script>
@endsection
