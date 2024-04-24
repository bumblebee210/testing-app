<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 @include('layout.partials.head')
	<title>Document</title>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-12 custom-m-forgot" style="">
			<h1 class="text-center" style="font-weight: bold;">Forgot your Password?</h1>
			
			<form action="" class="form-forgot"> 
			<p style="margin-right:120px;">Please enter your active email for verification</p>
				<label for="" class="">Email</label>
				<input type="text" class="form-control" style="border:1px solid black; width: 435px;">

				<button type="button" class="btn text-white col-6 mt-4" style="background-color: #8ED89E;"><a href="{{route('Reset')}}">Reset</a></button>
				<p class="text-center mt-3 mb-5" style="margin-right: 450px;">Nevermind, <a href="" style="text-decoration: none;">I remember my password</a></p>
			</form>
		</div>
		<div class="col-12 bg-forgot" style="height:237px;"></div>
	</div>
	
</div>
	<!-- @include('layout.partials.footer') -->
	@include('layout.partials.footer-scripts')
</body>
</html>