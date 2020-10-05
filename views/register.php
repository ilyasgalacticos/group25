<div class="row">
	<div class="col-sm-12">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Register</li>
		  </ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 offset-3">
		<?php
			if(isset($_GET['success'])){
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  User added successfully!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php
			}
		?>

		<?php
			if(isset($_GET['error'])){
				if($_GET['error']=='1'){
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Error on adding user!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php
				}else if($_GET['error']=='2'){
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  User with such email exists!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php
				}
			}
		?>
		<form action="<?php echo base_url('toregister');?>" method = "post">
			<div class="form-group">
				<label>
					EMAIL : 
				</label>
				<input type="email" name="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label>
					PASSWORD : 
				</label>
				<input type="password" name="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label>
					RE PASSWORD : 
				</label>
				<input type="password" name="re_password" class="form-control" required>
			</div>
			<div class="form-group">
				<label>
					FULL NAME : 
				</label>
				<input type="text" name="full_name" class="form-control" required>
			</div>
			<div class="form-group">
				<button class="btn btn-success">SIGN UP</button>
			</div>
		</form>
	</div>
</div>