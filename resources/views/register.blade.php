<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<div class="text-center">Register Form</div>
	<form action="{{Route('registerSubmit')}}" method="post">
		@csrf
		<div class="row">
			@if (session('success'))
	            <div class="alert alert-success mt-4" role="alert">
	                {{ session('success') }}
	            </div>
	        @endif
	        @if (session('error'))
	            <div class="alert alert-danger mt-4" role="alert">
	                {{ session('error') }}
	            </div>
	        @endif
			<div class="col-md-12">
				<label class="name">Name</label>
				<input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
				@error('name')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
			</div>
			<div class="col-md-12">
				<label class="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
				@error('email')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
			</div>
			<div class="col-md-12">
				<label class="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
				@error('password')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
			</div>
			<div class="col-md-12 pt-3">
				<button type="submit" class="btn btn-primary w-100">Submit</button>
			</div>
		</div>
	</form>
</div>
</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>