@if(Session::has('warningMessage'))
	<div class="alert alert-warning alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  	<strong>Warning...!</strong> {{ Session::get('warningMessage') }}
	</div>
@endif
@if(Session::has('errorMessage'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  	<strong>Error...!</strong> {{ Session::get('errorMessage') }}
	</div>
@endif
@if(Session::has('successMessage'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  	<strong>Sukses...!</strong> {{ Session::get('successMessage') }}
	</div>
@endif