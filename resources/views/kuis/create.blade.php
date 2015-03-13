@extends('layouts.master')


@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('kuis') }}">Kuis</a></li>
		<li class="active">Buat kuis</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Buat Kuis Baru
				</div>
				<div class="panel-body">
					{!! Form::open(['route'=>'kuis.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}
				<div class="form-group {{$errors->has('title')? 'has-error' : '' }}">
					<label class="col-md-4 control-label">Nama kuis</label>
					<div class="col-md-6">
						{!! Form::text('title',null,['class'=>'form-control']) !!}
						{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label"></label>
					<div class="col-md-6">
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
