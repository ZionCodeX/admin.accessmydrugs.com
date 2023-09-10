

<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Login | SpreaditGlobal</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://spareaditglobal.com" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{!! url('assets/css/pages/login/classic/login-4.css'); !!}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{!! url('assets/plugins/global/plugins.bundle.css'); !!}" rel="stylesheet" type="text/css" />
		<link href="{!! url('assets/plugins/custom/prismjs/prismjs.bundle.css'); !!}" rel="stylesheet" type="text/css" />
		<link href="{!! url('assets/css/style.bundle.css'); !!}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{!! url('assets/css/themes/layout/header/base/light.css'); !!}" rel="stylesheet" type="text/css" />
		<link href="{!! url('assets/css/themes/layout/header/menu/light.css'); !!}" rel="stylesheet" type="text/css" />
		<link href="{!! url('assets/css/themes/layout/brand/dark.css'); !!}" rel="stylesheet" type="text/css" />
		<link href="{!! url('assets/css/themes/layout/aside/dark.css'); !!}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{!! url('assets2/media/logos/favicon.ico'); !!}" />
	</head>
	<!--end::Head-->



	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="assets/media/logos/spreadit-logo2.png" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->



						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-10">
								<h3>Admin Login</h3>
								<div class="text-muted font-weight-bold">Admin Login details here</div>
							</div>

							<form method="POST" action="{{ route('login_admin') }}" class="form" id="kt_login_signin_formx">
								@csrf

								<div class="form-group mb-5">
									<input id="email" type="email" class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>


								<div class="form-group mb-5">
									<input id="password" type="password" class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>


								<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									<div class="checkbox-inline">
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
	
										<label class="form-check-label checkbox m-0 text-muted" for="remember">
											{{ __('Remember Me') }}
										</label>
									</div>
									<a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a>
								</div>


								<!--<input type="submit" class="btn btn-primary" value="Submit" />-->
								<button type="submit" class="btn btn-primary">
                                    Login
                                </button>


                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
							</form>


							<div class="mt-10">
								<span class="opacity-70 mr-4">Don't have an account yet?</span>
								<!--<a href="javascript:;" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Sign Up!</a>-->
								<a href="{{ route('register'); }}" id="kt_login_signupx" class="text-muted text-hover-primary font-weight-bold">Sign Up!</a>
							</div>
						</div>
						<!--end::Login Sign in form-->





						<!--begin::Login Sign up form-->
						<div class="login-signup">
							<div class="mb-10">
								<h3>Sign Up</h3>
								<div class="text-muted font-weight-bold">Enter your details to create your account</div>
							</div>
						
							<form method="POST" action="{{ route('register') }}" class="form" id="kt_login_signup_form">
								@csrf

								<input type="hidden" name="account_type" value="COMPANY" required/>
			  
							  <div class="form-group mb-5">
												  <input type="text" name="first_name" id="first_name" class="form-control h-auto form-control-solid py-4 px-8 @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" autocomplete="first_name" placeholder="First Name" autofocus required>
								  @error('first_name')
									  <span class="invalid-feedback" role="alert">
										  <strong>{{ $message }}</strong>
									  </span>
								  @enderror
							  </div>
			  
			  
							  <div class="form-group mb-5">
								<input type="text" name="last_name" id="last_name" class="form-control h-auto form-control-solid py-4 px-8 @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" autocomplete="last_name" placeholder="Last Name" autofocus required>
								@error('last_name')
									  <span class="invalid-feedback" role="alert">
										  <strong>{{ $message }}</strong>
									  </span>
								@enderror
							  </div>


							  <div class="form-group mb-5">
								<input type="text" name="company_name" id="company_name" class="form-control h-auto form-control-solid py-4 px-8 @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" autocomplete="company_name" placeholder="Company Name" autofocus required>
								@error('company_name')
									  <span class="invalid-feedback" role="alert">
										  <strong>{{ $message }}</strong>
									  </span>
								@enderror
							  </div>
			  
			  
								<div class="form-group mb-5">
									<input type="text" name="email" id="email" class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" placeholder="Official Email Address" autofocus required>
								</div>
			  
			  
											  <div class="form-group mb-5">
								<input type="number" name="phone" id="phone" class="form-control h-auto form-control-solid py-4 px-8 @error('phone') is-invalid @enderror" value="{{ old('phone') }}" autocomplete="phone" placeholder="Phone Number" autofocus required>
								  @error('phone')
									  <span class="invalid-feedback" role="alert">
										  <strong>{{ $message }}</strong>
									  </span>
								  @enderror
							  </div>
			  
			  
							  <div class="form-group mb-5">
								<input type="password" name="password" id="password" class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="new-password">
								  @error('password')
									  <span class="invalid-feedback" role="alert">
										  <strong>{{ $message }}</strong>
									  </span>
								  @enderror
							  </div>
							  
							  
											  <div class="form-group mb-5">
												  <input class="form-control h-auto form-control-solid py-4 px-8" type="password" name="password_confirmation" id="password-confirm" placeholder="Confirm Password" required autocomplete="new-password" />
											  </div>
			  
			  
											  <div class="form-group mb-5 text-left">
												  <div class="checkbox-inline">
													  <label class="checkbox m-0">
													  <input type="checkbox" name="agree" required/>
													  <span></span>I Agree the
													  <a href="#" class="font-weight-bold ml-1">Terms and conditions</a>.</label>
												  </div>
												  <div class="form-text text-muted text-center"></div>
											  </div>
			  
			  
											  <div class="form-group d-flex flex-wrap flex-center mt-10">
								<button type="submit" class="btn btn-primary">
								  {{ __('Register') }}
								</button>
								&nbsp;&nbsp;| &nbsp;&nbsp;<a href="login"><b>Login</b></a>
											  </div>
			  
			  
										  </form>
						</div>
						<!--end::Login Sign up form-->




						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Forgotten Password ?</h3>
								<div class="text-muted font-weight-bold">Enter your email to reset your password</div>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->




		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{!! url('assets/plugins/global/plugins.bundle.js'); !!}"></script>
		<script src="{!! url('assets/plugins/custom/prismjs/prismjs.bundle.js'); !!}"></script>
		<script src="{!! url('assets/js/scripts.bundle.js'); !!}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{!! url('assets/js/pages/custom/login/login-general.js'); !!}"></script>
		<!--end::Page Scripts-->



        
	</body>
	<!--end::Body-->
</html>