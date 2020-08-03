@extends('layouts.app')
@section('content')
<div class="container">
	<h3 class="jumbotron">Drag and Drop Files here to upload</h3>
	<form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
		@csrf
	</form>   
</div>
@endsection
