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
			<div class="col-5 custom-m-reset">
				<h1 style="font-weight:bold; font-size: 60px;" class="custom-m-reset">Reset Your <br> Password</h1>
				<p style="margin-left: 55px;">Please enter Your new password</p>	
				<form action="" class="form-reset col-10">
					<label class="mt-2" for="">New Password</label>
					<input type="text" class="form-control" style="border:1px solid black">
					<span><img src="{{asset('../icon/eye-pass.png')}}" alt=""></span>

					<label class="mt-2" for="">Re-confirm password</label>
					<input type="password" class="form-control" id="togglePassword" style="border:1px solid black">  
					<span><img src="{{asset('../icon/eye-pass.png')}}" alt=""></span>

					<button type="button" class="btn text-white col-12 mt-4" style="background-color: #8ED89E;" data-bs-toggle="modal" data-bs-target="#exampleModal">Reset</button>
				</form>


			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			      
			      <div class="modal-body text-center">
			        <img src="{{asset('../icon/email.png')}}" class="mb-3" alt="">
			        <h4>Reset password email has been sent</h4>
			        <p>Please check your email inbox</p>

			        <button type="button" class="btn text-white col-2 mt-2" style="background-color: #8ED89E;"><a href="">Ok</a></button>
			      </div>

			  </div>

			</div>


			</div>
			<div class="col bg-reset ">
				
			</div>
		</div>
	</div>
	<!-- @include('layout.partials.footer') -->
	@include('layout.partials.footer-scripts')
</body>
</html>