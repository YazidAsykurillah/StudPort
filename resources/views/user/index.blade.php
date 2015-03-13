@extends('layouts.master')


@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('user') }}">Siswa</a></li>
		<li class="active">Daftar siswa</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Daftar Siswa
					
				</div>
				<div class="panel-body">
					<table class="table table-striped table-responsive">
						<thead>
							<tr>
								<th></th>
								<th>Nama</th>
								<th>Email</th>
								<th>Kelas</th>
								<th style="text-align:center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@if($siswa->count())
								@foreach($siswa as $sis)
									<tr id="rowSiswa_{{$sis->id}}">
										<td></td>
										<td>{{ $sis->first_name." ".$sis->last_name }}</td>
										<td>{{ $sis->email }}</td>
										<td>{{ $sis->kelas->name }}</td>
										<td align="center">
											<a href="#" class="btn btn-xs btn-danger" title="Hapus" onClick="deleteUser( {{$sis->id}} ); return false">
												<i class="glyphicon glyphicon-trash"></i>
											</a>
											<a href="#" class="btn btn-xs btn-info" title="Reset password">
												<i class="glyphicon glyphicon-cog"></i>
											</a>
										</td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="4">Belum ada siswa</td>
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
		
		function deleteUser(id){
			var  idUser = id;
			var dataDelete = 'id='+idUser;
			
			var conf = confirm('Yakin mau menghapus siswa ini?');
			if(conf == true){

				$.ajax({

					url : '{{ URL::to('hapusSiswa') }}',
					type : 'GET',
					data : dataDelete,
					beforeSend : function(){},
					success : function(response){
						if(response == 'deleted'){
							
							$('#rowSiswa_'+idUser).fadeOut();
						}
					}

				});
			}
			return false;
		}

	</script>
@endsection
