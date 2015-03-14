@extends('layouts.master')

@section('pageTitle')
	Praktikum
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('praktikum') }}">praktikum</a></li>
		<li class="active">Daftar praktikum</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Daftar Praktikum</strong>
					<div class="pull-right">
						<a href="{{ URL::to('praktikum/create') }}" class="btn btn-xs btn-primary">
							<i class="glyphicon glyphicon-plus"></i>&nbsp;Praktikum Baru
						</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:5%">#</th>
								<th style="width:25%">Judul Praktikum</th>
								<th>Materi</th>
								<th>File Pendukung</th>
								<th style="text-align:center;">Aksi</th>
							</tr>
						</thead>
						<tbody>
						@if($praktikum->count())
							@foreach($praktikum as $prak)
								<tr id="rowPrak_{{ $prak->id }}">
									<td></td>
									<td>
										<a href="{{ URL::to('praktikum/'.$prak->id) }}" title="Klik untuk melihat detail praktikum">
											{{ $prak->title }}
										</a>
									</td>
									@if(count($prak->materi))		<!-- There at least a materi related with this praktikum -->
										<td>
											<a href="{{ URL::to('materi/'.$prak->materi->id) }}" title="Klik untuk melihat materi">
												{{ $prak->materi->title }}
											</a>
										</td>
									@else 							<!-- There's no materi related with this praktikum -->
										<td> --- </td>
									@endif
									<td>{{ $prak->files }}</td>
									<td style="text-align:center;">
										<a href="{{ URL::to('praktikum/'.$prak->id.'/edit') }}" class="btn btn-sm btn-info" title="Edit {{ $prak->title }}">
											<i class="glyphicon glyphicon-edit"></i>
										</a>
										<a href="#" class="btn btn-sm btn-danger" title="Hapus praktikum {{ $prak->title }}" onClick="deletePrak( {{$prak->id}} ); return false">
											<i class="glyphicon glyphicon-trash"></i>
										</a>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="4">
									<p class="alert alert-info">Tidak ada daftar praktikum, silahkan buat dulu</p>
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
		
		function deletePrak(id){
			var  idPrak = id;
			var dataDelete = 'id='+idPrak;
			
			var conf = confirm('Yakin mau menghapus Praktikum ini?');
			if(conf == true){

				$.ajax({

					url : '{{ URL::to('hapusPrak') }}',
					type : 'GET',
					data : dataDelete,
					beforeSend : function(){},
					success : function(response){
						if(response == 'deleted'){
							
							$('#rowPrak_'+idPrak).fadeOut();
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
