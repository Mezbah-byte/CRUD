<!DOCTYPE html>
<html>
<head>
	<title><?php echo $this->session->userdata('name');?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/custom.css'?>">
</head>
<body>
	<div class="navbar navbar-dark bg-dark">
		<div class="container">
			<a href="#" class="navbar-brand">Company Name</a>
		</div>
		<ul class="navbar-right">
                <a href="<?php echo base_url().'index.php/main/logout"';?>" class="nav navbar-brand navbar-right">Sign Out</a>
        </ul>
	</div>
	<div class="container" align="middle">
		<br /><br /><br />
		<form method="post" action="<?php echo base_url();?>index.php/main/login_validation">
			<div class="col-md-4" align="middle">
				<!-- <div class="btn btn-lg">
					<a href="#">Company Name or Logo</a>
				</div> -->
				<div>
					<img width="150" height="150" src="<?php echo base_url().'assets/img.jpg';?>">
				</div>
				<div>
					<label></label>
				</div>
				<div class="form-group">
					<!-- <label>Enter Username</label> -->
					<h2><?php echo $this->session->userdata('name');?></h2>
				</div>
				<div class="form-group" align="middle">
					<h2><?php echo $this->session->userdata('email');?></h2>
				</div>
				<div class="form-group">
					<label><?php echo $this->session->userdata('post');?></label>
				</div>
				<div class="form-group">
					<label><?php echo $this->session->userdata('level');?></label>
				</div>
				<div class="form-group">
				</div>
			</div>
		</form>
	</div>
</body>
</html>