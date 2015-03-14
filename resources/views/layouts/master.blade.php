<html>
	<head>
		<title>
			@yield('pageTitle')
		</title>

		{!! HTML::style('css/bootstrap.css') !!}
		{!! HTML::style('css/mycss.css') !!}
		
	</head>
	<body>
		<!-- START Nav Bar-->
		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
		    	<!-- Brand and toggle get grouped for better mobile display -->
		    	<div class="navbar-header">
		      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        	<span class="sr-only">Toggle navigation</span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
		      		</button>
		      		@if(Auth::check())
		      			<a class="navbar-brand" href="{{URL::to('home') }}">StudPort</a>
		      		@else
		      			<a class="navbar-brand" href="{{URL::to('/') }}">StudPort</a>
		      		@endif
		      		
		   		</div>

		   		<!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    <!-- Navbar untuk user teacher -->
			    @if(Auth::check())					
			    	@if(Auth::user()->isTeacher == 1)
			    	<ul class="nav navbar-nav">
			    		<li>
			        		<a href="{{ URL::to('kelas') }}">Kelas</a>
			        	</li>
			        	<li>
			        		<a href="{{ URL::to('user') }}">Siswa</a>
			        	</li>
			        	<li>
			        		<a href="{{ URL::to('materi') }}">Materi</a>
			        	</li>
			        	<li>
			        		<a href="{{ URL::to('praktikum') }}">Praktikum</a>
			        	</li>
			        	<li>
			        		<a href="{{ URL::to('kuis') }}">Kuis</a>
			        	</li>
			    	</ul>
			    	@else
			    	<ul class="nav navbar-nav">
			        	<li>
			        		<a href="{{ URL::to('#') }}">Kuis</a>
			        	</li>
			    	</ul>
			    	@endif

			    	<ul class="nav navbar-nav navbar-right">
				        <li class="dropdown">
				        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				          		<i class="glyphicon glyphicon-user"></i>&nbsp;{{ Auth::user()->first_name." ".Auth::user()->last_name }} <span class="caret"></span>
				          	</a>
				          	<ul class="dropdown-menu" role="menu">		          		
				            	<li>
				            		<a href="{{ URL::to('auth/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
				            	</li>
				            	<li>
				            		<a href="#"><i class="glyphicon glyphicon-cog"></i>&nbsp;Edit Profil</a>
				            	</li>
				          	</ul>
				        </li>
			      	</ul>
			     <!-- Navbar untuk user yang bukan teacher -->
			    @else
			     	<ul class="nav navbar-nav navbar-right">
			        	<li>
			        		<a href="#">About</a>
			        	</li>
			        	<li>
			        		<a href="#">Contact</a>
			        	</li>
			        	<li>
			        		<a href="{{ URL::to('auth/login') }}">Login</a>
			        	</li>
			        	<li>
			        		<a href="{{ URL::to('auth/register') }}">Register</a>
			        	</li>
			      	</ul>
			     @endif

			    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<!-- END Nav bar-->

		<div class="container">
			
			

			@yield('breadcrumb')
			
			@include('partials.alertion')
			
			@yield('content')

		</div>


		

		{!! HTML::script('js/jquery-1.11.2.js') !!}
		{!! HTML::script('js/bootstrap.js') !!}
		
		@yield('necessaryScripts')
	</body>



</html>
