<div class="row">
	<div class="col-sm-12">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
		    <li class="breadcrumb-item active" aria-current="page">
		    	My Profile

		    </li>
		  </ol>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 offset-3">
		<?php
			if(isset($_GET['success'])){
				if($_GET['success']=='1'){
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  User updated successfully!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php
				}else if($_GET['success']=='2'){
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Password updated successfully!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php
				}
			}
		?>

		<?php
			if(isset($_GET['error'])){
				if($_GET['error']=='1'){
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Couldn't update user!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php
				}else if($_GET['error']=='2'){
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Passwords are not same!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php
				}else if($_GET['error']=='3'){
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  Old password is not correct!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php
				}else if($_GET['error']=='4'){
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  You have already used this password!
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>			
		<?php
				}
			}
		?>
		<form action="<?php echo base_url('touploadavatar'); ?>" method="post" enctype="multipart/form-data">
			<div class="card">
				<div class="card-body">
					<?php

						$imageURL = "avatars/default_user.png";

						if(isset($USER["imagename"])&&$USER["imagename"]!=""){

							$imageURL = "avatars/".$USER["imagename"]."_large.jpg";

							if(!file_exists($imageURL)){
								$imageURL = "avatars/default_user.png";
							}

						}

					?>
					<img src="<?php echo $imageURL; ?>" width="100%">
					<div class="custom-file mt-3">
					  <input type="file" class="custom-file-input" id="customFile" name="avatar">
					  <label class="custom-file-label" for="customFile">Choose Profile Picture</label>
					</div>
					<div class="form-group mt-3">
						<button class="btn btn-success">UPLOAD PICTURE</button>
					</div>
				</div>
			</div>
		</form>
		<form action="" method="post">
			<div class="form-group">
				<label>
					FULL NAME : 
				</label>
				<input type="text" name="full_name" class="form-control" required value="<?php echo USER['full_name'];?>">
			</div>
			<div class="form-group">
				<button class="btn btn-success">UPDATE PROFILE</button>
			</div>
		</form>
		<form action="" method="post" class="mt-5">
			<div class="form-group">
				<label>
					OLD PASSWORD : 
				</label>
				<input type="password" name="old_password" class="form-control" required>
			</div>
			<div class="form-group">
				<label>
					PASSWORD : 
				</label>
				<input type="password" name="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label>
					REPEAT PASSWORD : 
				</label>
				<input type="password" name="re_password" class="form-control" required>
			</div>							
			<div class="form-group">
				<button class="btn btn-success">UPDATE PASSWORD</button>
			</div>
		</form>
		<?php

			$imageURL = "avatars/default_user.png";

			if(isset($USER["imagename"])&&$USER["imagename"]!=""){

				$imageURL = "avatars/".$USER["imagename"]."_small.jpg";

				if(!file_exists($imageURL)){
					$imageURL = "avatars/default_user.png";
				}

			}

		?>
		<img src="<?php echo $imageURL; ?>">
		<br><br>
		<?php

			$imageURL = "avatars/default_user.png";

			if(isset($USER["imagename"])&&$USER["imagename"]!=""){

				$imageURL = "avatars/".$USER["imagename"]."_medium.jpg";

				if(!file_exists($imageURL)){
					$imageURL = "avatars/default_user.png";
				}

			}

		?>
		<img src="<?php echo $imageURL; ?>">
	</div>
</div>