@extends('layouts.master')

@section('pageTitle')
	Praktikum
@endsection

@section('breadcrumb')
	
	<ol class="breadcrumb">
		<li><a href="{{ URL::to('home') }}">Home</a></li>
		<li><a href="{{ URL::to('getPraktikum') }}">Praktikum</a></li>
		<li class="active">Daftar praktikum</li>
	</ol>
	
@endsection


@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="panel-title"><strong>Daftar Praktikum</strong></span>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:5%">#</th>
								<th style="width:25%">Judul Praktikum</th>
								<th>Materi</th>
							</tr>
						</thead>
						<tbody>
						@if($praktikum->count())
							@foreach($praktikum as $prak)
								<tr id="rowPrak_{{ $prak->id }}">
									<td></td>
									<td>
										<a href="{{ URL::to('viewPraktikum/'.$prak->id) }}" title="Klik untuk melihat detail praktikum">
											{{ $prak->title }}
										</a>
									</td>
									@if(count($prak->materi))		<!-- There at least a materi related with this praktikum -->
										<td>
											<a href="{{ URL::to('viewMateri/'.$prak->materi->id) }}" title="Klik untuk melihat materi">
												{{ $prak->materi->title }}
											</a>
										</td>
									@else 							<!-- There's no materi related with this praktikum -->
										<td> --- </td>
									@endif
									
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="4">
									<p class="alert alert-info">Tidak ada daftar praktikum</p>
								</td>
							</tr>
						@endif
						</tbody>
					</table>
					<!-- Pagination links -->
					{!! $praktikum->render() !!}
				</div>
			</div>
		</div>
	</div>

@endsection

@section('necessaryScripts')

<script type="text/javascript">
		
		
	</script>
	
@endsection
