@extends('layouts.master')
@section('pageTitle')
	StudPort
@stop

@section('content')

	<div class="jumbotron">
  		<h1>StudPort</h1>
  		<p>This is a web application I am going to build using Laravel 5 framework</p>
  		<p>I'm currently setting up the workflow of the application</p>
  		<p>Have some ideas to share?</p>
  		<p><a class="btn btn-primary btn-lg" href="https://github.com/YazidAsykurillah/StudPort" role="button">Checkout the repository on github</a></p>
	</div>
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