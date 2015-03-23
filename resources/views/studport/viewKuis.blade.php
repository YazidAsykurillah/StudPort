@extends('layouts.master')

@section('pageTitle')
	Kuis
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('getKuis') }}">Kuis</a></li>
		<li class="active">{{ $kuis->title }}</li>
	</ol>
	
@endsection


@section('content')
	<div class="page-header">
		<h3>{{ $kuis->title }}</h3>
		
	</div>
	
	<br/>
	<div class="row">
		@if(Session::has('kuisMessage'))
			<div class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  	{!! Session::get('kuisMessage') !!}
			</div>
		@endif
	</div>
	<div class="row">
		<div class="col-md-7">
			{!! nl2br($kuis->objectives) !!}
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-6">
			<div id="startOption">
				Waktu : {{$kuis->timer }} Menit
				&nbsp;<a href="#" class="btn btn-primary" id="startQuiz">Start</a>
			</div>
		</div>
	</div>
	<br/>
	<div class="row" id="panel-kuis">
		<br/>
		<br/>

		<div class="col-md-8">
			
			@if($soal->count())
				@foreach($soal as $index => $so)

					<div class="panel panel-default" id="panel_soal_{{$so->id}}">
					  	<div class="panel-heading">
					    	No.&nbsp;{{ $index+1}}
					  	</div>
					  	<div class="panel-body">
					  		{!! nl2br($so->soal) !!}
					  		<p></p>
					    	<ul class="list-group">
							  <li class="list-group-item">A. {{ $so->opsiA }}</li>
							  <li class="list-group-item">B. {{ $so->opsiB }}</li>
							  <li class="list-group-item">C. {{ $so->opsiC }}</li>
							  <li class="list-group-item">D. {{ $so->opsiD }}</li>
							  
							</ul>
							
					  	</div>
					  	<div class="panel-footer">
					  		<div class="row">
					  			<div class="col-md-4">
					  				{!! Form::open(array('url'=>'postAnswer', 'id'=>'formAnswer', 'method'=>'post')) !!}
										<select name="answer" class="form-control">
											<option value="">Pilih Jawaban</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
										</select>
										<br/>
										<input type="hidden" name="id_soal" value="{{ $so->id }}">
										<button type="submit" class="btn btn-primary">
											Jawab
										</button>
									{!! Form::close() !!}
							  	</div>
					  		</div>


					  	</div>
					</div>
					<br/>
				@endforeach

				{!! Form::open(array('url'=>'finishKuis', 'id'=>'formFinishKuis', 'method'=>'post')) !!}
					<input type="hidden" name="skor" id="skor">
					<input type="hidden" name="kuis_id" value="{{ $kuis->id }}">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<button type="submit" class="btn btn-primary btn-block">Selesai</button>
				{!! Form::close() !!}

			@else
				<p class="alert alert-info">Tidak ada soal pada kuis ini</p>
			@endif
				
		</div>
		<div class="col-md-2">

			<div id="timer" style="height:100px;width:250px;position:fixed;" >

			</div>
			
		</div>
		
	</div>

@endsection

@section('necessaryScripts')

	{!! HTML::script('js/jquery.plugin.js') !!}
	{!! HTML::script('js/jquery.countdown.js') !!}
	{!! HTML::script('js/jquery.countdown-id.js') !!}

	<script type="text/javascript">

		$('#panel-kuis').hide();

		$('#startQuiz').click(function(){
			$('#startOption').hide();
			$('#panel-kuis').show();
			startQuiz();
			return false;
		});

		function startQuiz(){

			var timer = {{ $kuis->timer * 60 }};
			$('#timer').countdown({
				until: +timer,
				description: 'Sisa waktu',
				onExpiry:selesai
				
			});
		}
		
		function selesai(){
			alert('selesai');
			$('form[id=formFinishKuis]').submit();
		}
	</script>
	<script type="text/javascript">
		$(function(){

			var initSkor = 0;		//define the initial score = 0.
			var jmlhSoal = {{ $soal->count()}};
			var totalSkor = 0;

			$('form[id=formAnswer]').on('submit', function(e){
				var conf = confirm("Yakin dengan jawaban ini?");
				
				if(conf == true){
					$(this).hide();
					$.ajax({
						type:'post',
						url: '{{ URL::to('postAnswer') }}',
						data:$(this).serialize(),
						success:function(response){
							if(response == 'answerRight'){
								initSkor =parseInt(initSkor+1);
								totalSkor = initSkor/jmlhSoal*100;

								$('#skor').val(totalSkor);
							}

						}
					});
				}

				e.preventDefault();
			});
		});
	</script>

@endsection
