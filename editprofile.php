<?php
	include('db.php');
	include('session.php');
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
		<?php 
			function has_header_injection($str){
		    	return preg_match("/[\r\n]/", $str);
			}
			if(isset($_POST['submit'])) {
			    $fullname = $_POST['fullname'];
			    $email = $_POST['email'];
			    $user = $_POST['username'];
			    $bio = $_POST['bio'];
			    $gender = $_POST['gender'];
			    $country = $_POST['country'];
			    $fb = $_POST['fb'];
			    $twit = $_POST['twit'];
			    $pin = $_POST['pin'];
			    if(has_header_injection($fullname) || has_header_injection($email) || has_header_injection($user) || has_header_injection($bio) || has_header_injection($gender) || has_header_injection($country) || has_header_injection($fb) || has_header_injection($twit)|| has_header_injection($pin)){
			        die();
			    }

			    $sql = "UPDATE artist SET fullname = '$fullname', email = '$email', username = '$user', bio = '$bio', gender = '$gender', country = '$country', facebook = '$fb', twitter = '$twit', pinterest = '$pin' WHERE id = $loggedin_id";

				if ($db->query($sql) === TRUE) {
				    echo "New record created successfully";
				    header('refresh: 1; url=profile.php');
				} else {
				    echo "Error: " . $sql . "<br>" . $db->error;
				}
			}else{	
		?>
			<h1>Edit Profile / <a class="btn btn-default" href="profile.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Profile </a> </h1>
			<div>
			<form method="post" enctype="multipart/form-data">
				<label name="fullname">Full Name :-</label>
				<input type="text" placeholder="Enter Your Name" name="fullname" value="<?php echo $row['fullname']; ?>" id="fullname">
				<label name="email">Email :-</label>
				<input type="email" placeholder="Enter Your Email" name="email" value="<?php echo $row['email']; ?>" id="email">
				<label name="username">Username :-</label>
				<input type="text" placeholder="Enter Your Username" name="username" value="<?php echo $row['username']; ?>" id="username">
				<label name="bio">Bio :-</label>
				<textarea name="bio" placeholder="Enter Your Bio" value="<?php echo $row['bio']; ?>" id="bio" rows="5"></textarea>
				<label name="gender">Gender :-</label>
				<input type="text" placeholder="Enter Your Gender" name="gender" value="<?php echo $row['gender']; ?>" id="gender">
				<label name="country">Country :-</label>
				<input type="text" placeholder="Enter Living Country" name="country" value="<?php echo $row['country']; ?>" id="country">
				<label name="fb">Facebook Link :-</label>
				<input type="text" placeholder="Enter Link of Facebook" name="fb" value="<?php echo $row['facebook']; ?>" id="fb">
				<label name="twit">Twitter Link:-</label>
				<input type="text" placeholder="Enter Link of Twitter" name="twit" value="<?php echo $row['twitter']; ?>" id="twit">
				<label name="pin">Pinterest Link :-</label>
				<input type="text" placeholder="Enter Link of Pinterest" name="pin" value="<?php echo $row['pinterest']; ?>" id="pin">
				<input type="submit" name="submit" id="submit" value="Update">
			</form>
			</div> 
		<?php } ?>
		</div><!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<?php
    include('footer.php');
?>	