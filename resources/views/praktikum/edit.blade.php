@extends('layouts.master')

@section('pageTitle')
	Edit Praktikum {{ $praktikum->title }}
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('praktikum') }}">Praktikum</a></li>
		<li class="active">Edit {{ $praktikum->title }}</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Edit {{ $praktikum->title }}</strong>
					
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-9">
						{!! Form::model($praktikum,['route'=>['praktikum.update',$praktikum->id], 'method'=>'PATCH', 'class'=>'form-horizontal', 'files'=>true]) !!}
							<div class="form-group {{$errors->has('title')? 'has-error' : '' }}">
								<label class="col-md-3 control-label">Judul praktikum</label>
								<div class="col-md-6">
									{!! Form::text('title',null,['class'=>'form-control']) !!}
									{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
								</div>
							</div>

							<div class="form-group {{$errors->has('materi_id')? 'has-error' : '' }}">
								<label class="col-md-3 control-label">Materi</label>
								<div class="col-md-6">
									@if(count($praktikum->materi))		<!-- Terdapat relasi antara praktikum dan materi -->
										{!! Form::select('materi_id',[$praktikum->materi->id=>$praktikum->materi->title]+$opsiMateri,'',['class'=>'form-control']) !!}
										{!! $errors->first('materi_id', '<span class="help-block">:message</span>') !!}
									@else 								<!-- Tidak terdapat relasi antara praktikum dan materi -->
										{!! Form::select('materi_id',[''=>'Pilih Materi']+$opsiMateri,'',['class'=>'form-control']) !!}
										{!! $errors->first('materi_id', '<span class="help-block">:message</span>') !!}
									@endif
								</div>
							</div>

							<div class="form-group {{$errors->has('tools')? 'has-error' : '' }}">
								<label class="col-md-3 control-label">Alat dan Bahan</label>
								<div class="col-md-6">
									{!! Form::textarea('tools',null,['class'=>'form-control']) !!}
									{!! $errors->first('tools', '<span class="help-block">:message</span>') !!}
								</div>
							</div>

							<div class="form-group {{$errors->has('steps')? 'has-error' : '' }}">
								<label class="col-md-3 control-label">Langkah Kerja</label>
								<div class="col-md-6">
									{!! Form::textarea('steps',null,['class'=>'form-control']) !!}
									{!! $errors->first('steps', '<span class="help-block">:message</span>') !!}
								</div>
							</div>

							<div class="form-group {{$errors->has('files')? 'has-error' : '' }}">
								<label class="col-md-3 control-label">File Pendukung</label>
								<div class="col-md-6">
									<p>{{ $praktikum->files }}</p>
									<p class="alert alert-info"> Ubah file pendukung dengan mengunggah file baru</p>
									<p>
										{!! Form::file('files',null,['class'=>'form-control']) !!}
										{!! $errors->first('files', '<span class="help-block">:message</span>') !!}
									</p>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<div class="col-md-6">
									<button type="submit" class="btn btn-primary">
										<i class="glyphicon glyphicon-save"></i>&nbsp;Simpan
									</button>
								</div>
							</div>

						{!! Form::close() !!}
						</div>
						<div class="col-md-3">
							doakdok
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection

@section('necessaryScripts')

<script type="text/javascript">
		
		
	</script>
	
@endsection
