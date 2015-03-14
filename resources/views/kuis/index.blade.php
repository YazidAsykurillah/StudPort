@extends('layouts.master')

@section('pageTitle')
	Kuis
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('kuis') }}">Kuis</a></li>
		<li class="active">Daftar kuis</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Daftar kuis
					<div class="pull-right">
						<a href="{{ URL::to('kuis/create') }}" class="btn btn-xs btn-primary">
							<i class="glyphicon glyphicon-plus"></i>&nbsp;Kuis Baru
						</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
								<th>Nama kuis</th>
								<th>Jumlah Soal</th>								
								<th>Aksi</th>								
							</tr>
						</thead>
						<tbody>
							@if($kuis->count())
								@foreach($kuis as $ku)
								<tr id="rowKuis_{{$ku->id}}">
									<td></td>
									<td>
										<a href="{{ URL::to('kuis/'.$ku->id)}}">{{ $ku->title }}</a>
									</td>
									<td> {{ $ku->soal->count() }}</td>
									<td>
										<a href="{{ URL::to('kuis/'.$ku->id.'/edit') }}" class="btn btn-xs btn-info" title="Edit kuis {{ $ku->title }}">
											<i class="glyphicon glyphicon-edit"></i>
										</a>
										<a href="#" class="btn btn-xs btn-danger" title="Hapus kuis {{ $ku->title }}" onClick="deleteKuis( {{$ku->id}} ); return false">
											<i class="glyphicon glyphicon-trash"></i>
										</a>
									</td>
									
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="4">Belum ada kuis terdaftar,  silahkan buat dulu</td>
								</tr>
							@endif
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

@endsection

@section('necessaryScripts')
	<script type="text/javascript">
		
		function deleteKuis(id){
			var  idKuis = id;
			var dataDelete = 'id='+idKuis;
			
			var conf = confirm('Yakin mau menghapus kuis ini?');
			if(conf == true){

				$.ajax({

					url : '{{ URL::to('hapusKuis') }}',
					type : 'GET',
					data : dataDelete,
					beforeSend : function(){},
					success : function(response){
						if(response == 'deleted'){
							
							$('#rowKuis_'+idKuis).fadeOut();
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
