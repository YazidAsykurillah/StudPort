@extends('layouts.master')


@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('kelas') }}">Kelas</a></li>
		<li class="active">{{ $kelas->name }}</li>
	</ol>
	
@endsection


@section('content')
	<div class="page-header">
		<h3>Kelas {{ $kelas->name }}</h3>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Daftar siswa pada kelas {{ $kelas->name }}
					
				</div>
				<div class="panel-body">
					
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody>
							@if($siswa->count())
								@foreach($siswa as $sis)
								<tr>
									<td></td>
									<td>
										<a href="{{ URL::to('user/'.$sis->id.'') }}">
											{{ $sis->first_name." ".$sis->last_name }}
										</a>
									</td>
									<td>{{ $sis->email }}</td>
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="3">Belum ada siswa yang mendaftar pada kelas ini</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection
