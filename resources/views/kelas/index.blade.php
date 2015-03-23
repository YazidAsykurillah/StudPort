@extends('layouts.master')

@section('pageTitle')
	Kelas
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('kelas') }}">Kelas</a></li>
		<li class="active">Daftar Kelas</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Daftar Kelas
					<div class="pull-right">
						<a href="{{ URL::to('kelas/create') }}" class="btn btn-xs btn-primary">
							<i class="glyphicon glyphicon-plus"></i>&nbsp;Kelas Baru
						</a>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:5%;">#</th>
								<th>Nama Kelas</th>
								<th>Jumlah Siswa</th>
								<th style="text-align:right;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@if($kelas->count())
								@foreach($kelas as $kel)
								<tr>
									<td></td>
									<td>
										<a href="{{ URL::to('kelas/'.$kel->id)}}">{{ $kel->name }}</a>
									</td>
									<td>{{ $kel->user->where('isTeacher',0)->count() }}</td>
									<td align="right">
										<a href="{{ URL::to('kelas/'.$kel->id.'/edit')}}" class="btn btn-sm btn-success" id="btnEdit" title="Edit">
											<i class="glyphicon glyphicon-edit"></i>
										</a>
									</td>
									<td align="left">
										{!! Form::open(['method'=>'delete','class'=>'form-inline', 'route'=>['kelas.destroy', $kel->id], 'id'=>'formDelete']) !!}
											<input type="hidden" name="id" value="{{$kel->id}}">
											<button type="submit" class="btn btn-sm btn-danger">
												<i class="glyphicon glyphicon-remove"></i>
											</button>
										{!! Form::close() !!}
									</td>
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="4">Belum ada kelas terdaftar,  silahkan buat dulu</td>
								</tr>
							@endif
							
						</tbody>

					</table>
					{!! $kelas->render() !!}
				</div>
			</div>
		</div>
	</div>

@endsection

@section('necessaryScripts')
	<script type="text/javascript">
		$(function () {
		    $('form[id=formDelete]').on('submit', function (e) {
		    	var conf=confirm("Yakin mau menghapus kelas ini?");
		    	if(conf == true){
			        $.ajax({
			            type: 'delete',
			            url: 'kelas/destroy',
			            data: $(this).serialize(),
			            success: function (response) {
			                if(response == 'deleted'){
			                	location.reload();
			                }
			                else{
			                	alert(response);
			                }
			            }
			        });
			    }
		        e.preventDefault();
		    });
		});

	</script>
@endsection
