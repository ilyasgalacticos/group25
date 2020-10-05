<div class="row">
	<div class="col-sm-12">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Login</li>
		  </ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 offset-3">
		<form action="<?php echo base_url('auth');?>" method = "post">
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
				<input type="password" name="password" class="form-control" >
			</div>
			<div class="form-group">
				<button class="btn btn-success">SIGN IN</button>
			</div>
		</form>
	</div>
</div>