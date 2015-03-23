@extends('layouts.master')
@section('pageTitle')
	StudPort
@stop


@section('content')
	
	<div class="banner">
	    <ul>
	        <li style="background-image: url('images/water_dust.jpg'); background-repeat:repeat-x;">
				<h1>"Give and Get"</h1>
				<p>Guru mengunggah materi, modul dan petunjuk praktikum</p>
				<p>Siswa dapat dengan mudah mengunduh bahan pembelajaran</p>
			</li>
			<li style="background-image: url('images/water_dust.jpg'); background-repeat:repeat-x;">
				<h1>"Online Quiz"</h1>
				<p>Guru dapat membuat kuis</p>
				<p>Siswa dapat mengerjakan kuis secara <i>online</i></p>
			</li>
			<li style="background-image: url('images/water_dust.jpg'); background-repeat:repeat-x;">
				<h1>"Progress Monitoring"</h1>
				<p>Guru dapat memantau perkembangan tiap siswa</p>
				<p>Siswa dapat dengan mudah melihat perkembangan diri</p>
			</li>
	        
	    </ul>
	</div>
	<div class="prevNextBtn">
		<a href="#" class="unslider-arrow prev">&laquo;</a>
		<a href="#" class="unslider-arrow next">&raquo;</a>
	</div>
	
		
	
	<!-- <div class="jumbotron">
  		{!! HTML::image('images/laptop.jpg', 'Studport welcome image', ['class' => 'img-responsive']) !!}
	</div> -->
	<div class="page-header">
	  	<h1> Basic Ideas <small>( basic workflow of the application)</small></h1>
	  	<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <h3 class="panel-title">Teachers needs</h3>
				</div>
				<div class="panel-body">
				    <ul class="list-group">
					  <li class="list-group-item">Organize their classes and their students</li>
					  <li class="list-group-item">Setting up test type (only multiple question type)</li>
					  <li class="list-group-item">Assign the quiz to the students</li>
					  <li class="list-group-item">Collect the result of the quiz</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <h3 class="panel-title">Students needs</h3>
				</div>
				<div class="panel-body">
				    <ul class="list-group">
					  <li class="list-group-item">Organize their accounts</li>
					  <li class="list-group-item">Collect notification about the assignments</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
				    <h3 class="panel-title">Solve method</h3>
				</div>
				<div class="panel-body">
				    Panel content
				</div>
			</div>
		</div>
	</div>
	
@stop

@section('necessaryScripts')

	{!! HTML::script('js/unislider.min.js') !!}

	<script type="text/javascript">
		$(function() {

			var unslider = $('.banner').unslider({
				fluid: true,
				dots: true,
				speed: 500
			});

		    $('.unslider-arrow').click(function() {
		        var fn = this.className.split(' ')[1];
		        //  Either do unslider.data('unslider').next() or .prev() depending on the className
		        unslider.data('unslider')[fn]();
		        return false;
		    });
		});
	</script>

@endsection