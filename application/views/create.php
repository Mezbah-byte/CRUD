<!DOCTYPE html>
<html>
<head>
	<title>Company Name</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/custom.css'?>">
	<script src="<?php echo base_url().'assets/js/custom.js'?>"></script>
</head>
<body>
	<!-- <div class="navbar navbar-dark bg-dark">
		<div class="container">
			<a href="#" class="navbar-brand">Company Name</a>
		</div>
	</div> -->
	<div class="wrapper">
		<div class="sidebar bg-dark" align="middle">
			<div class="bg-dark">
		        <label></label>
		        <?php if($this->session->userdata('level')==='1'):?>
					<ul class="sidebar bg-dark">
			            <li><a href="<?php echo base_url().'index.php/main/list';?>">Home</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/profile';?>">Profile</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/employee_list';?>">Employee List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/pending';?>">Pending List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/cancle';?>">Cancel List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/schedule';?>">Schedule List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/sold';?>">Sold List</a></li>
			        </ul>
		        <?php elseif($this->session->userdata('level')==='2'):?>
		            <ul class="sidebar bg-dark">
			            <li><a href="<?php echo base_url().'index.php/main/list';?>">Home</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/profile';?>">Profile</a></li>
			            <!-- <li><a href="<?php echo base_url().'index.php/main/employee_list';?>"><i class="fas fa-address-card"></i>Employee List</a></li> -->
			            <li><a href="<?php echo base_url().'index.php/main/pending';?>">Pending List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/cancle';?>">Cancel List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/schedule';?>">Schedule List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/sold';?>">Sold List</a></li>
			        </ul>
		        <?php else:?>
			        <ul class="sidebar bg-dark">
			            <li><a href="<?php echo base_url().'index.php/main/list';?>">Home</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/profile';?>">Profile</a></li>
			            <!-- <li><a href="<?php echo base_url().'index.php/main/employee_list';?>">Employee List</a></li> -->
			            <li><a href="<?php echo base_url().'index.php/main/pending';?>">Pending List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/cancle';?>">Cancel List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/schedule';?>">Schedule List</a></li>
			            <li><a href="<?php echo base_url().'index.php/main/sold';?>">Sold List</a></li>
			        </ul>
		        <?php endif;?>
		        <div class="social_media">
		          <a href="https://web.facebook.com/mazbahur.ayon"><i class="fab fa-facebook-f"></i></a>
		          <!-- <a href="#"><i class="fab fa-twitter"></i></a>
		          <a href="#"><i class="fab fa-instagram"></i></a> -->
		      	</div>
	      	</div>
      	</div>
      	<div class="main_content">
	    <div class="navbar navbar-dark bg-dark">
			<div class="col-md-6">
				<a href="#" class="navbar-brand">Company Name</a>
			</div>
				<ul class="navbar-right">
		            <a href="<?php echo base_url().'index.php/main/logout"';?>" class="nav navbar-brand navbar-right"><?php echo $this->session->userdata('name');?></a>
		        </ul>
		</div> 
        	<div class="info">
        		<div class="container">
					<div class="row">
						<div class="col-md-6">
							<?php
							$success = $this->session->userdata('success');
							if ($success !="") {
							?>
							<div class="alert alert-success"><?php echo $success;?></div>
							<?php
							}
							?>
							<?php
							$failure = $this->session->userdata('failure');
							if ($failure !="") {
							?>
							<div class="alert alert-success"><?php echo $failure;?></div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="container" style="padding-top: 10px">
						<h3>Create User</h3>
						<hr>
						<form method="post"  name="createuser" action="<?php echo base_url().'index.php/main/create';?>">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="name" value="<?php echo set_value('name');?>" class="form-control">
										<?php echo form_error('name');?>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" value="<?php echo set_value('email');?>" class="form-control">
										<?php echo form_error('email')?>
									</div>
									<div class="form-group">
										<label>Comment</label>
										<input type="text" name="comment" value="<?php echo set_value('comment');?>" class="form-control">
									</div>
								<!-- <div class="form-group">
									<label>Status</label>
									<input type="text" name="status" value="<?php echo set_value('status');?>" class="form-control">
									<?php echo form_error('status')?>
								</div> -->
									<div class="form-group">
										<button class="btn btn-primary">Create</button>
										<a href="<?php echo base_url().'index.php/main/list';?>" class="btn btn-secondary">Cancel</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>