@extends('layouts.master')

@section('pageTitle')
	Materi
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('getMateri') }}">Materi</a></li>
		<li class="active">Daftar materi</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="panel-title"><strong>Daftar Materi</strong></span>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
								<th>Judul Materi</th>					
								<th>Jumlah Praktikum</th>					
												
							</tr>
						</thead>
						<tbody>
							@if($materi->count())
								@foreach($materi as $mat)
								<tr id="row_mat_{{ $mat->id }}">
									<td></td>
									<td>
										<a href="{{ URL::to('viewMateri/'.$mat->id) }}">
											{{ $mat->title }}
										</a>
									</td>
									<td>{{ $mat->praktikum->count() }}</td>
									
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
					<!-- Pagination links -->
					{!! $materi->render() !!}
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
