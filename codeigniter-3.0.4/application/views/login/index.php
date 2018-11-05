<div class="login-box">
	<div class="login-logo">
		<b>Admin</b>LTE
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<?php if ($this->session->flashdata('msg_error')) { ?>
		<div class="alert alert-danger"> <?= $this->session->flashdata('msg_error') ?> </div>
		<?php } ?>

		<p class="login-box-msg">Sign in to start your session</p>

		<form action="<?= base_url( 'login/index' ) ?>" method="post">
			<div class="form-group has-feedback">
				<input name="username" type="text" class="form-control" placeholder="Username" value="<?= echoValue( $input->username ) ?>">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input name="password" type="password" class="form-control" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"> Remember Me
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			</div>
		</form>

		<div class="social-auth-links text-center">
			<p>- OR -</p>
			<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
			<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
		</div>
		<!-- /.social-auth-links -->

		<a href="<?= base_url( 'login/forgotpassword' ) ?>">I forgot my password</a><br>

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->