<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="public/public2/login.html">
					<img src="public/public2/vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="public/public2/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To DeskApp</h2>
						</div>
						<form method="post">
							<?php 
							$alert = new userController();
							echo $alert->getError('alert');?>
							<div class="select-role" >
								<div class="btn-group btn-group-toggle" data-toggle="buttons" >
									<label class="btn active">
										<input type="radio" name="role" id="admin" value="Manager" required>
										<div class="icon"><img src="public/public2/vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Manager
									</label>
									<label class="btn">
										<input type="radio" name="role" id="user" value="Employee">
										<div class="icon"><img src="public/public2/vendors/images/person.svg" class="svg" alt=""></div>
										<span>I'm</span>
										Employee
									</label>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" name="email" class="form-control form-control-lg" placeholder="Email" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="pass"  class="form-control form-control-lg" placeholder="**********" required>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1" name="save">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="<?php echo href('user', 'forgetPassword') ?>">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
										-->
										
											<button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
										
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="public/public2/vendors/scripts/core.js"></script>
	<script src="public/public2/vendors/scripts/script.min.js"></script>
	<script src="public/public2/vendors/scripts/process.js"></script>
	<script src="public/public2/vendors/scripts/layout-settings.js"></script>