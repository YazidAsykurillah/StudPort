@extends('layouts.master')

@section('pageTitle')
	Materi
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('materi') }}">Materi</a></li>
		<li class="active">Daftar materi</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="panel-title"><strong>Daftar Materi</strong></span>
					<div class="pull-right">
						<a href="{{ URL::to('materi/create') }}" class="btn btn-xs btn-primary">
							<i class="glyphicon glyphicon-plus"></i>&nbsp;Materi Baru
						</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
								<th>Judul Materi</th>					
								<th>Jumlah Praktikum</th>					
								<th style="text-align:center;">Aksi</th>							
							</tr>
						</thead>
						<tbody>
							@if($materi->count())
								@foreach($materi as $mat)
								<tr id="row_mat_{{ $mat->id }}">
									<td></td>
									<td>
										<a href="{{ URL::to('materi/'.$mat->id) }}">
											{{ $mat->title }}
										</a>
									</td>
									<td>{{ $mat->praktikum->count() }}</td>
									<td style="text-align:center;">
										<a href="{{ URL::to('downloadMateri/'.$mat->id) }}" class="btn btn-sm btn-info" title="Download {{ $mat->title }}">
											<i class="glyphicon glyphicon-download"></i>
										</a>
										<a href="#" class="btn btn-sm btn-danger" title="Hapus materi {{ $mat->id }}" onClick="deleteMat( {{$mat->id }} ); return false">
											<i class="glyphicon glyphicon-trash"></i>
										</a>
									</td>
									
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="4">
										<p class="alert alert-info">Belum ada materi, silahkan tambahkan dulu</p>
									</td>
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
		
		function deleteMat(id){
			var  idMat = id;
			var dataDelete = 'id='+idMat;
			
			var conf = confirm('Yakin mau menghapus Materi ini?');
			if(conf == true){

				$.ajax({

					url : '{{ URL::to('hapusMat') }}',
					type : 'GET',
					data : dataDelete,
					beforeSend : function(){},
					success : function(response){
						if(response == 'deleted'){
							
							$('#row_mat_'+idMat).fadeOut();
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
