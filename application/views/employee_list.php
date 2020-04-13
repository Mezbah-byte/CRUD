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
					<div class="row">
						<div class="col-md-10"><h3>Employee</h3></div>
							<div class="col-md">
								<a href="<?php echo base_url().'index.php/main/create_employee';?>" class="btn btn-primary">Create</a>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-striped">
									<td>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Post</th>
										<?php if($this->session->userdata('level')==='1'):?>
											<th width="60">Edit</th>
											<th width="100">Delete</th>
						                <?php elseif($this->session->userdata('level')==='2'):?>
						                  	<th width="60">Edit</th>
											<th width="100">Delete</th>
						                	
						                <?php else:?>
							                <!-- <th width="60">Edit</th>
											<th width="100">Delete</th> -->
						                <?php endif;?>
									</tr>
									<?php if(!empty($employees)) { foreach($employees as $employee) { ?>
									<tr>
										<td><?php echo $employee['id'];?></td>
										<td><?php echo $employee['name'];?></td>
										<td><?php echo $employee['email'];?></td>
										<td><?php echo $employee['post'];?></td>

										<?php if($this->session->userdata('level')==='1'):?>
											<td>
												<a href="<?php echo base_url().'index.php/main/employee_edit/'. $employee['id']?>" class="btn btn-primary">Edit</a>
											</td>
											<td>
												<a href="<?php echo base_url().'index.php/main/employee_delete/'. $employee['id']?>" class="btn btn-danger">Delete</a>
											</td>
						                <?php elseif($this->session->userdata('level')==='2'):?>
						                  	<td>
												<a href="<?php echo base_url().'index.php/main/employee_edit/'. $employee['id']?>" class="btn btn-primary">Edit</a>
											</td>
											<td>
												<a href="<?php echo base_url().'index.php/main/employee_delete/'. $employee['id']?>" class="btn btn-danger">Delete</a>
											</td>
						                <?php else:?>
							                <!-- <td>
												<a href="<?php echo base_url().'index.php/main/employee_edit/'. $employee['id']?>" class="btn btn-primary">Edit</a>
											</td>
											<td>
												<a href="<?php echo base_url().'index.php/main/employee_delete/'. $employee['id']?>" class="btn btn-danger">Delete</a>
											</td> -->
						                <?php endif;?>
									</tr>
									<?php } }else {  ?>
									<tr>
										<td colspan="5">Record not found</td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>