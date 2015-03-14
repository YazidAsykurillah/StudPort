@extends('layouts.master')

@section('pageTitle')
	Soal
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('kuis') }}">Kuis</a></li>
		<li class="active">Tambah Soal</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Buat Soal pada kuis {{ $kuis->title }}
				</div>
				<div class="panel-body">
					{!! Form::open(['route'=>'soal.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}
					<div class="form-group {{$errors->has('soal')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">Soal</label>
						<div class="col-md-6">
							{!! Form::textarea('soal',null,['class'=>'form-control']) !!}
							{!! $errors->first('soal', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group {{$errors->has('opsiA')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">opsi A</label>
						<div class="col-md-6">
							{!! Form::text('opsiA',null,['class'=>'form-control']) !!}
							{!! $errors->first('opsiA', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group {{$errors->has('opsiB')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">opsi B</label>
						<div class="col-md-6">
							{!! Form::text('opsiB',null,['class'=>'form-control']) !!}
							{!! $errors->first('opsiB', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group {{$errors->has('opsiC')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">opsi C</label>
						<div class="col-md-6">
							{!! Form::text('opsiC',null,['class'=>'form-control']) !!}
							{!! $errors->first('opsiC', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group {{$errors->has('opsiD')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">opsi D</label>
						<div class="col-md-6">
							{!! Form::text('opsiD',null,['class'=>'form-control']) !!}
							{!! $errors->first('opsiD', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group {{$errors->has('opsiBenar')? 'has-error' : '' }}">
						<label class="col-md-4 control-label">opsi Benar</label>
						<div class="col-md-6">
							<select name="opsiBenar" class="form-control">
								<option value="">Pilih Opsi Benar</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
							</select>
							{!! $errors->first('opsiBenar', '<span class="help-block">:message</span>') !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label"></label>
						<div class="col-md-6">
							{!! Form::hidden('kuis_id',$kuis->id,['class'=>'form-control']) !!}
							<button type="submit" class="btn btn-primary">
								<i class="glyphicon glyphicon-save"></i>&nbsp;Simpan
							</button>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@endsection

@section('necessaryScripts')
	<script type="text/javascript">
		

	</script>
@endsection
