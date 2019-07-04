<?php
	
	error_reporting( ~E_NOTICE ); // avoid notice
	include('dbconfig.php');
	include ('header.php');

	if(isset($_POST['btnsave']))
	{
		$alt = $_POST['alt'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];


		if(empty($alt)){
			$errMSG = "Please Enter Username.";
		}

		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = '../img/art/'; // upload directory

			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

			// rename uploading image
			$image = rand(1000,1000000).".".$imgExt;

			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$image);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}
		}


		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $db->prepare('INSERT INTO products(name, image,description,price) VALUES(:uname, :upic,:udesc,:uprice)');
			$stmt->bindParam(':uname',$alt);
			$stmt->bindParam(':upic',$image);
			$stmt->bindParam(':udesc',$description);
			$stmt->bindParam(':uprice',$price);
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;indeximage.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>


<main class="cd-main-content">
		<nav class="cd-side-nav">
			<ul>
                
				<li class="overview">
					<a href="index.php">Overview</a>
				</li>
				<li class="bookmarks">
					<a href="profile.php">Manage profile</a>
				</li>

				<li class="images">
					<a href="indeximage.php">Master Art</a>
				</li>
			</ul>

			

			
		</nav>

		<div class="content-wrapper">
			<div class="container">


				<div class="page-header">
			    	<h1 class="h2">Add New. <a class="btn btn-default" href="indeximage.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
			    </div>


				<?php
				if(isset($errMSG)){
						?>
			            <div class="alert alert-danger">
			            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
			            </div>
			            <?php
				}
				else if(isset($successMSG)){
					?>
			        <div class="alert alert-success">
			              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
			        </div>
			        <?php
				}
				?>

			<form method="post" enctype="multipart/form-data" class="form-horizontal">

				<table class="table table-bordered table-responsive">

			    <tr>
			    	<td><label class="control-label">Name</label></td>
			        <td><input class="form-control" type="text" name="alt" placeholder="Enter Art Name" value="<?php echo $alt; ?>" /></td>
			    </tr>
			  


			    <tr>
			    	<td><label class="control-label">Image.</label></td>
			        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
			    </tr>


			    <tr>
			    	<td><label class="control-label">Description</label></td>
			        <td><input class="form-control" type="text" name="description" placeholder="Enter description" value="<?php echo $description; ?>" /></td>
			    </tr>

			     <tr>
			    	<td><label class="control-label">Price</label></td>
			        <td><input class="form-control" type="text" name="price" placeholder="Enter Price" value="<?php echo $price; ?>" /></td>
			    </tr>
			  
			    <tr>
			        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
			        <span class="glyphicon glyphicon-save"></span> &nbsp;SAVE
			        </button>
			        </td>
			    </tr>

			    </table>

			</form>
		</div> <!-- .content-wrapper -->
</main> <!-- .cd-main-content -->










<?php
	include('footer.php')
?>