<!DOCTYPE html>
<html>
<head>
	<title>Company Name</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
</head>
<body>
	<div class="container" align="middle">
		<br /><br /><br />
		<form method="post" action="<?php echo base_url();?>index.php/main/login_validation">
			<div class="col-md-4">
				<div class="btn btn-lg">
					<a href="#">Company Name or Logo</a>
				</div>
				<div class="form-group">
					<!-- <label>Enter Username</label> -->
					<input type="text" name="username" class="form-control" placeholder="Username" required autofocus/>
					<span class="text-danger"><?php echo form_error('username');?></span>
				</div>
				<div class="form-group">
					<!-- <label>Enter Password</label> -->
					<input type="password" name="password" class="form-control" placeholder="Password" required autofocus/>
					<span class="text-danger"><?php echo form_error('username');?></span>
				</div>
				<div class="form-group">
					<input type="submit" name="insert" value="Login" class="btn btn-lg btn-primary btn-block">
					<?php
					echo '<label class="text-danger">'.$this->session->flashdata('error');
					?>
				</div>
			</div>
		</form>
	</div>
</body>
</html>