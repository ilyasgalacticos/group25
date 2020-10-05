<?php 
	
	require_once 'core/functions.php';
	require_once 'core/DBManager.php';

	$dbManager = new DBManager();

	require_once 'core/user.php';

	$page = "index.php";

	$redirect = "";
	
	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_GET['act'])){

			if($_GET['act']==='authorize'){

				$redirect = "/login?usererror";

				if(isset($_POST['email']) && isset($_POST['password'])){

					$user = $dbManager->getUser($_POST['email']);

					if($user!=null){

						$redirect = "/login?passworderror";

						if($user['password']===sha1($_POST['password'])){

							$redirect = "profile";
							$_SESSION['CURRENT_USER'] = $user;

						}

					}

				}

			}else if($_GET['act']==='toregister'){

				$redirect = "register?error=1";

				if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['re_password'])&&isset($_POST['full_name'])){

					if($_POST['password']===$_POST['re_password']){

						$checkUser = $dbManager->getUser($_POST['email']);

						if($checkUser==null){

							$id = $dbManager->addUser(htmlspecialchars($_POST['email']), sha1($_POST['password']), htmlspecialchars($_POST['full_name']));
							$dbManager->addPasswordHistory($id, sha1($_POST['password']));
							$redirect = "register?success";

						}else{

							$redirect = "register?error=2";

						}

					}

				}

			}else if($_GET['act']==='logout'){

				session_destroy();
				$redirect = "login";

			}else if($_GET['act']==='touploadavatar'){

				if(isset($_FILES['avatar'])&&($_FILES['avatar']['type']=='image/jpeg'||$_FILES['avatar']['type']=='image/png')&&$_FILES['avatar']['size']<=2*1024*1024){

					$tmpFile = $_FILES['avatar']['tmp_name'];
					$imgSizes = getimagesize($tmpFile);

					$originalWidth = $imgSizes[0];
					$originalHeight = $imgSizes[1];

					$imageLargeWidth = 500;
					$imageMediumWidth = 250;
					$imageSmallWidth = 100;

					$imageLargeHeight = ($imageLargeWidth*$originalHeight)/$originalWidth;
					$imageMediumHeight = ($imageMediumWidth*$originalHeight)/$originalWidth;
					$imageSmallHeight = ($imageSmallWidth*$originalHeight)/$originalWidth;

					$largeImage = imagecreatetruecolor($imageLargeWidth, $imageLargeHeight);
					$mediumImage = imagecreatetruecolor($imageMediumWidth, $imageMediumHeight);
					$smallImage = imagecreatetruecolor($imageSmallWidth, $imageSmallHeight);

					$imageName = sha1($USER['id']."_avatar");

					$originalImageSource = imagecreatefromjpeg($tmpFile);

					imagecopyresized($largeImage, $originalImageSource, 0, 0, 0, 0, $imageLargeWidth, $imageLargeHeight, $originalWidth, $originalHeight);
					imagecopyresized($mediumImage, $originalImageSource, 0, 0, 0, 0, $imageMediumWidth, $imageMediumHeight, $originalWidth, $originalHeight);
					imagecopyresized($smallImage, $originalImageSource, 0, 0, 0, 0, $imageSmallWidth, $imageSmallHeight, $originalWidth, $originalHeight);

					imagejpeg($largeImage, "avatars/".$imageName."_large.jpg");
					imagejpeg($mediumImage, "avatars/".$imageName."_medium.jpg");
					imagejpeg($smallImage, "avatars/".$imageName."_small.jpg");


					$dbManager->updateUserPhotoName($USER['id'], $imageName);

					$_SESSION['CURRENT_USER']['imagename'] = $imageName;


				}

				$redirect = "profile?avatarsuccess";

			}

		}

		header("Location:".base_url($redirect));

	}else if($_SERVER['REQUEST_METHOD']==='GET'){

		if(isset($_GET['page'])){

			if(ONLINE){

				if($_GET['page']==='index'){

					$page = "index.php";

				}else if($_GET['page']==='profile'){

					$page = "profile.php";

				}

			}else{

				if($_GET['page']==='index'){

					$page = "index.php";

				}else if($_GET['page']==='login'){

					$page = "login.php";

				}else if($_GET['page']==='register'){

					$page = "register.php";

				}

			}

		}

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<!-- CSS only -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

		<!-- JS, Popper.js, and jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #540614;">
			  <a class="navbar-brand" href="<?php echo base_url(); ?>">BBC NEWS</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			    	<?php
			    		if(ONLINE){
			    	?>
				      <li class="nav-item">
				        <a class="nav-link" href="<?php echo base_url('profile'); ?>"><?php echo USER['full_name']; ?> </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="JavaScript:void(0)" onclick="logout()">Logout</a>
				      </li>
				      <form action="logout" method="post" id = "logout_form"></form>
				      <script type="text/javascript">
				      	function logout() {
				      		document.getElementById('logout_form').submit();
				      	}
				      </script>
				    <?php
				  		}else{
				  	?>
				  	  <li class="nav-item">
				        <a class="nav-link" href="<?php echo base_url(); ?>">Home </a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="<?php echo base_url('register'); ?>">Register</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="<?php echo base_url('login'); ?>">Login</a>
				      </li>	
				  	<?php		
				  		}
				    ?>
			    </ul>
			    <form class="form-inline my-2 my-lg-0">
			      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
			    </form>
			  </div>
			</nav>
		</div>
		<div class="container mt-3" style="min-height: 700px;">
			<?php
				require_once "views/$page";
			?>
		</div>
		<div class="container">
			<div class="row mt-3 p-3" style="background-color: black; color: white;">
				<div class="col-sm-12">
					<h6 class="text-center">Copyright (C) 2020, All Rights Reserved</h6>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	
	}

?>