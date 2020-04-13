<!DOCTYPE html>
<html>
<head>
	<title>Company Name</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/custom.css'?>">
	<script src="<?php echo base_url().'assets/js/custom.js'?>"></script>
</head>
<body>
	<div class="wrapper">
		<div class="sidebar bg-dark">
	        <div class="bg-dark" align="middle">
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
			            <!-- <li><a href="<?php echo base_url().'index.php/main/employee_list';?>">Employee List</a></li> -->
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
		                <a href="<?php echo base_url().'index.php/main/logout"';?>" class="nav navbar-brand navbar-right">Sign Out</a>
		        </ul>
			</div>
			<div class="info">
				<div class="container" style="padding-top: 10px">
					<h3>Create Employee</h3>
					<hr>
					<form method="post"  name="createemployee" action="<?php echo base_url().'index.php/main/create_employee';?>">
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
									<label>Post</label>
									<select name="post">
										<option>Select</option>
										<option value="M.D">M.D</option>
										<option value="Manager">Manager</option>
										<option value="Engineer">Engineer</option>
										<option>Business Developer</option>
										<option>Customer Service Executive</option>
										<option>Field Officer</option>
									</select>
									<?php echo form_error('post')?>
								</div>

								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" value="<?php echo set_value('password');?>" class="form-control">
									<?php echo form_error('password')?>
								</div>
								
								<div class="form-group">
									<button class="btn btn-primary">Create Employee</button>
									<a href="<?php echo base_url().'index.php/main/employee_list';?>" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
	    </div>
	</div>
</body>
</html>