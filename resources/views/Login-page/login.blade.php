<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 @include('layout.partials.head')
	<title></title>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-7 text-center bg-judul" style="border-radius: 0 40px 40px 0px;">
				<h1 class="custom-mt text-white" style="margin-left: 20px; font-weight:bold;">Effortless Management.</h1>
				<p class="judul">Stremline Your Workflow</p>
				<p class="custom-mb judul" style="margin-top: -20px; margin-left: -35px;">with Our CRM system.</p>
			</div>
			<div class="col text-center form-login">
				<h1 style="font-weight: bold; font-size: 55px;">Welcome back!</h1>
				<h6 class="mt-4 mb-4" style="text-align: left; margin-left:90px; !important">Ready to start your day?</h6>

				@if(session('error'))
	            <div class="alert alert-danger">
	                <b>Opps!</b> {{session('error')}}
	            </div>
	            @endif

				<form  method="POST" action="{{route('actionLogin')}}" class="col-10 form-login" style="text-align:left;">
				@csrf
					<div class="row">
						<div class="col">
							<label class="mt-2" for="">Username</label>
							<input type="text" class="form-control" name="username" style="border:1px solid black">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label class="mt-2" for="">Password</label>
							<div class="row">
								<div class="col-12">
								<input type="password" class="form-control" id="password" name="password" style="border:1px solid black;">
								</div>
								<div class="col">
									<span toggle="#password" class="password-toggle">
										<img src="{{asset('../icon/eye-pass.png')}}"  alt="Show Password">
									</span>
								</div>
							</div>
						</div>
					</div>
					
					

					<button type="submit" class="btn text-white col-12 mt-5" style="background-color: #8ED89E;">Log In</button>

					<p class="text-center mt-3">Do You <a href="{{route('Forgot')}}" style="text-decoration: none;">forget your password?</a></p>

				</form>
			</div>
		</div>
	</div>
	@include('layout.partials.footer')
	@include('layout.partials.footer-scripts')
</body>
</html>