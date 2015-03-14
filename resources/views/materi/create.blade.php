@extends('layouts.master')

@section('pageTitle')
	
	Materi

@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('materi') }}">Materi</a></li>
		<li class="active">Buat Materi</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Buat Materi</h3>
				</div>
				<div class="panel-body">
					{!! Form::open(['route'=>'materi.store', 'class'=>'form form-horizontal', 'role-form', 'files'=>true]) !!}
						<div class="form-group {{$errors->has('title')? 'has-error' : '' }}">
							<label class="col-md-4 control-label">Judul Materi</label>
							<div class="col-md-6">
								{!! Form::text('title',null,['class'=>'form-control']) !!}
								{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="form-group {{$errors->has('file')? 'has-error' : '' }}">
							<label class="col-md-4 control-label">File</label>
							<div class="col-md-6">
								{!! Form::file('file',null,['class'=>'form-control']) !!}
								{!! $errors->first('file', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="form-group}}">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-6">
								<button type="submit" class="btn btn-primary">
									Upload
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
