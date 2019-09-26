<div class="login-box">
	<div class="login-box-body">
		<p class="login-box-msg">Silahkan login untuk menggunakan aplikasi</p>

		<?php echo form_open("auth/login");?>
			<div class="form-group has-feedback">
				<?php echo form_input($identity);?>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<?php echo form_input($password);?>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<label>
						<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> <?php echo explode(':', lang('login_remember_label', 'remember'))[0];?>
					</label>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-primary btn-block btn-flat"');?>
				</div>
				<!-- /.col -->
			</div>
		<?php echo form_close();?>

		<a href="register.html" class="text-center">Register a new membership</a>
	</div>
</div>