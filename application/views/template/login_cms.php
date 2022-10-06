<style type="text/css">
	body,html {
	  height: 100%;
	}

</style>
<div class="container-fluid h-100 d-flex justify-content-center align-items-center bg-login">
	<div class="card shadow">

		<div class="card-body">
			<div class="text-center mb-5">
				<img class="img" src="<?= base_url('').'assets/files/logo_large.png' ?>" style="max-width: 250px;">
			</div>

			<?php if ($this->session->has_userdata('message_login_error')) { ?>
				<div class="alert alert-danger text-center" role="alert">
					<?= $this->session->userdata('message_login_error') ?>
					<br>
					HINT : Admin pass
				</div>
			<?php } ?>

			<form action="<?= base_url('Auth/Login') ?>" method="POST">

				<div class="mb-3 row">
					<div class="col-4 ">
						<span class="form-label align-middle">Username</span>
					</div>
					<div class="col-8">
						<input type="text" class="form-control form-control-sm" name="USERNAME" required value="">
					</div>
				</div>

				<div class="mb-3 row">
					<div class="col-4">
						<span class="form-label align-middle">Password</span>
					</div>
					<div class="col-8">
						<input type="Password" class="form-control form-control-sm" name="PASSWORD" required value="">
					</div>
				</div>	

				<input type="submit" class="btn btn-primary float-end" value="Login">	
			</form>			
		</div>
	</div>

</div>

