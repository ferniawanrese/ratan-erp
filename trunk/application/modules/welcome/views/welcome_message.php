<?php $this->load->view('header');?>
<!--<style>
#smashinglogo {
  background: url(<?php echo base_url('images/bgstart.jpg');?>)  100%  no-repeat;
  max-width: 100%;
  background-size:100% auto;
}
</style>-->
	<!-- Navbar================================================== -->
	<div class="nav navbar-inverse top-nav">
			<div class="container">
				<div class="navbar-header">
					<img src="images/logo-merp.gif" width="103" height="50" alt="Media ERP"> &nbsp &nbsp &nbsp
				</div> 
				<div class="btn-toolbar pull-right notification-nav">
					<div class="btn-group">
						<div class="dropdown">
							<span class="home-link"><a href="http://ratan.co" class="icon-reply"></a></span>
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


<?php $this->load->view('footer');?>