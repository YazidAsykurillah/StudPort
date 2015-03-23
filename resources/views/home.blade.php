@extends('layouts.master')

@section('pageTitle')
	Dashboard
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li class="active">Home</li>
	</ol>
	
@endsection
@section('content')
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						{{  $user->first_name ." ". $user->last_name }}
					</h3>
				</div>
				<div class="panel-body">
					
					<p>
						@if($user->profile_picture == NULL)
							<a href="#" class="thumbnail" id="profile_picture" title="Klik untuk merubah foto profil">
							   {!! HTML::image('images/nophoto.jpg') !!}
							</a>
						@else
							<a href="#" class="thumbnail" id="profile_picture" title="Klik untuk merubah foto profil">
							   {!! HTML::image('images/'.$user->profile_picture,$user->first_name,['style'=>'width:250px;height:250px;']) !!}
							</a>
						@endif
					</p>
					<p>
						{!! Form::open(['url'=>'changePhoto', 'class'=>'form', 'role'=>'form', 'files'=>true, 'name'=>'change_photo', 'id'=>'change_photo']) !!}
							<div class="form-group {{$errors->has('profile_picture')? 'has-error' : '' }}">
								
								{!! Form::file('profile_picture') !!}
								{!! $errors->first('profile_picture', '<span class="help-block">:message</span>') !!}
							</div>
							<div class="form-group">
								{!! Form::hidden('id', $user->id) !!}
							</div>
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="#" class="btn btn-sm btn-danger" id="closeForm">
								<i class="glyphicon glyphicon-minus"></i>
							</a>
						{!! Form::close() !!}	
					</p>
					<br/>
					@if($user->isTeacher ==1)
					<p>
						<i class="glyphicon glyphicon-star-empty"></i> : Guru
					</p>
					@else
					<p>
						<i class="glyphicon glyphicon-star-empty"></i> : Siswa
					</p>
					<p>
						<i class="glyphicon glyphicon-th"></i> : {{ $user->kelas->name }}
					</p>
					@endif
					<p>
						<i class="glyphicon glyphicon-envelope"></i> : {{ $user->email }}
					</p>
					<p>
						<i class="glyphicon glyphicon-comment"></i> : {{ nl2br($user->biography) }}
					</p>

				</div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="row">
				@if($user->isTeacher == 1)							<!-- User is teacher -->
					<!-- Daftar Kelas -->
					<div class="panel panel-default" id="panel-daftar">
						<div class="panel-heading">
							Daftar Kelas
							<div class="pull-right">
								<a href="{{ URL::to('kelas/create') }}" class="btn btn-sm btn-primary" title="Klik untuk menambahkan kelas baru">
									<i class="glyphicon glyphicon-plus"></i>
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
										
									</tr>
								</thead>
								<tbody>
									@if($daftarKelas->count())
										@foreach($daftarKelas as $kel)
										<tr>
											<td></td>
											<td>
												<a href="{{ URL::to('kelas/'.$kel->id)}}">{{ $kel->name }}</a>
											</td>
											<td>{{ $kel->user->where('isTeacher',0)->count() }}</td>
											
										</tr>
										@endforeach
										<tr>
											<td colspan="3" style="text-align:right;">
												<a href="{{ URL::to('kelas') }} " class="btn btn-sm btn-default">Selengkapnya...</a>
											</td>
										</tr>
									@else
										<tr>
											<td colspan="3">Belum ada kelas terdaftar,  silahkan buat dulu</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
					<!-- END Daftar Kelas -->

					<!-- Daftar Materi -->
					<div class="panel panel-default" id="panel-daftar">
						<div class="panel-heading">
							Daftar Materi
							<div class="pull-right">
								<a href="{{ URL::to('materi/create') }}" class="btn btn-sm btn-primary" title="Klik untuk menambahkan materi">
									<i class="glyphicon glyphicon-plus"></i>
								</a>
							</div>				
						</div>
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width:5%;">#</th>
										<th>Judul Materi</th>					
										<th>Jumlah Praktikum</th>					
																	
									</tr>
								</thead>
								<tbody>
									@if($daftarMateri->count())
										@foreach($daftarMateri as $mat)
										<tr>
											<td></td>
											<td>
												<a href="{{ URL::to('materi/'.$mat->id)}}">{{ $mat->title }}</a>
											</td>
											<td>{{ $mat->praktikum->count() }}</td>
											
										</tr>
										@endforeach
										<tr>
											<td colspan="3" style="text-align:right;">
												<a href="{{ URL::to('materi') }}" class="btn btn-sm btn-default">Selengkapnya...</a>
											</td>
										</tr>
									@else
										<tr>
											<td colspan="3">Belum ada Materi terdaftar,  silahkan buat dulu</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
					<!-- END Daftar Materi -->

					<!-- Daftar Kuis -->
					<div class="panel panel-default" id="panel-daftar">
						<div class="panel-heading">
							Daftar Kuis
							<div class="pull-right">
								<a href="{{ URL::to('kuis/create') }}" class="btn btn-sm btn-primary" title="Klik untuk menambahkan kuis">
									<i class="glyphicon glyphicon-plus"></i>
								</a>
							</div>
						</div>
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th style="width:5%">#</th>
										<th>Nama Kuis</th>			
										<th>Waktu (menit)</th>								
																	
									</tr>
								</thead>
								<tbody>
									@if($daftarKuis->count())
										@foreach($daftarKuis as $ku)
										<tr id="rowdaftarKuis_{{$ku->id}}">
											<td></td>
											<td>
												<a href="{{ URL::to('kuis/'.$ku->id)}}">{{ $ku->title }}</a>
											</td>
											<td> {{ $ku->timer }}</td>								
										</tr>
										@endforeach
										<tr>
											<td colspan="3" style="text-align:right;">
												<a href="{{ URL::to('kuis') }}" class="btn btn-sm btn-default">Selengkapnya...</a>
											</td>
										</tr>
									@else
										<tr>
											<td colspan="4">Belum ada Kuis terdaftar,  silahkan buat dulu</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
					<!-- END Daftar Kuis -->

				@else 															<!-- User is NOT a teacher -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Kuis yang pernah dikerjakan
							</h3>
						</div>
						<div class="panel-body">
							@if(count($kuis))
								<ul class="list-group">

									@foreach($kuis as $ku)
										<li class="list-group-item">
										<span class="badge">{{ $ku->pivot->skor }}</span>
									    {{ $ku->title}}
									</li>
									@endforeach
								</ul>
							@else
								<p class="alert alert-info">
									Kamu belum pernah mengerjakan kuis, silahkan pilih kuis untuk dikerjakan melalui menu "Kuis".
								</p>
							@endif
							
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('necessaryScripts')
	<script type="text/javascript">
		$('#change_photo').hide();
		$('#profile_picture').click(function(){
			$('#change_photo').show();
			return false;
		});
		$('#closeForm').click(function(){
			$('#change_photo').hide();
			return false;
		});
	</script>
@endsection