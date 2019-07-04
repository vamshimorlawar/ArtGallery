<?php

	error_reporting( ~E_NOTICE );

	require_once 'dbconfig.php';

	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $db->prepare('SELECT name, image FROM products WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: indeximage.php");
	}



	if(isset($_POST['btn_save_updates']))
	{
		$alt = $_POST['name'];

		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		if($imgFile)
		{
			$upload_dir = '../img/art/';
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$image = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['image']);
					move_uploaded_file($tmp_dir,$upload_dir.$image);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			}
		}
		else
		{
			// if no image selected the old image remain as it is.
			$image = $edit_row['image']; // old image from database
		}


		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $db->prepare('UPDATE products
									     SET name=:uname,
										     image=:upic
								       WHERE id=:uid');
			$stmt->bindParam(':uname',$alt);
			$stmt->bindParam(':upic',$image);
			$stmt->bindParam(':uid',$id);

			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='indeximage.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}

		}


	}
	include('header.php');
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
			    	<h1 class="h2">Update Image. <a class="btn btn-default" href="indeximage.php"> All Images </a></h1>
			    </div>

			<div class="clearfix"></div>

			<form method="post" enctype="multipart/form-data" class="form-horizontal">


			    <?php
				if(isset($errMSG)){
					?>
			        <div class="alert alert-danger">
			          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
			        </div>
			        <?php
				}
				?>


				<table class="table table-bordered table-responsive">

			    <tr>
			    	<td><label class="control-label">Alternate Text.</label></td>
			        <td><input class="form-control" type="text" name="alt" value="<?php echo $alt; ?>" required /></td>
			    </tr>



			    <tr>
			    	<td><label class="control-label">Image.</label></td>
			        <td>
			        	<p><img src="../img/art/<?php echo $image; ?>" height="200" width="200" /></p>
			        	<input class="input-group" type="file" name="user_image" accept="image/*" />
			        </td>
			    </tr>

			    <tr>
			        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
			        <span class="glyphicon glyphicon-save"></span> Update
			        </button>

			        <a class="btn btn-default" href="indeximage.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>

			        </td>
			    </tr>

			    </table>

			</form>


			</div>
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->




<?php
	include('footer.php');
?>