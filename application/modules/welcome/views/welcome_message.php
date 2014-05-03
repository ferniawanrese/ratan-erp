<?php $this->load->view('header');?>

<div class="layout">
	<!-- Navbar================================================== -->
	<div class="nav navbar-inverse top-nav">
		<div class="navbar-inner">
			<div class="container">
				<span class="home-link"><a href="<?php echo base_url();?>" class="icon-home"></a></span><a class="brand" href="./index.html">
					
				<div class="btn-toolbar pull-right notification-nav">
					<div class="btn-group">
						<div class="dropdown">
							<a class="btn btn-notification"><i class="icon-reply"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<form class="form-signin" action = "welcome/ceklog" method="POST">
			<h3 class="form-signin-heading">Please sign in</h3>
			<div class="controls input-icon">
				<i class=" icon-user-md"></i>
				<input type="text" id = "username" name = "username"class="input-block-level" placeholder="Email address">
			</div>
			<div class="controls input-icon">
				<i class=" icon-key"></i><input type="password" id = "pass" name="pass" class="input-block-level" placeholder="Password">
			</div>
			<label class="checkbox">
			<input type="checkbox" value="remember-me"> Remember me </label>
			<button class="btn btn-inverse btn-block" type="submit">Sign in</button>
			<h4>Forgot your password ?</h4>
			<p>
				<a href="#">Click here</a> to reset your password.
			</p>
			<h5>Don't have an account yet ?</h5>
			<button class="btn btn-success btn-block" type="submit">Create Account</button>
		</form>
	</div>
</div>


<?php $this->load->view('footer');?>