@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-contain-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h1 class="text-center"> CRUD-Functions </h1>
				</div>
				<div class="card-body">
					
					<form action="{{route('cruds.store')}}" method="post">
					@csrf

							<div class="form-group">
								<input type="file" name="image" value="{{ old('image') }} " class="@error('image') is-invalid @enderror" >

								@error('image')
								<div class="alert alert-danger">
									{{ $message }}
								</div>
								@enderror

							</div>

							<div class="form-group">
								<label class="form-label" for="name">Name:</label>
								<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" >

								@error('name')
									<div class="alert alert-danger">
										{{ $message }}
									</div>
								@enderror

							</div>

							<div class="form-group">
								<label for="email" class="from-label">Email:</label>
								<input type="email" name="email" value="{{ old('email') }} " class="form-control @error('email') is-invalid @enderror">

								@error('email')
								<div class="alert alert-danger">
									{{ $message }}
								</div>
								@enderror

							</div>

							<div class="form-group">
								<label for="password" class="form-label">Password:</label>
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror">

								@error('password')
								<div class="alert alert-danger">
									{{ $message }}
								</div>
								@enderror

							</div>

							<div class="form-group">
								<label for="password_confirmation" class="form-label">Password Confirmation: </label>
								<input type="password" name="password_confirmation" class="form-control @error('confirmed') is-invalid @enderror">

								@error('confirmed')
								<div class="alert alert-danger">
									{{ $message }}
								</div>
								@enderror

							</div>

						<input type="submit" name="submit">

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection