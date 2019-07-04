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
			<h1>Profile / <a class="btn btn-default" href="editprofile.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; Edit Profile </a> </h1>
			<div class="maincontent">
				<h3>Basic Information</h3><br>
				<p>Full Name :- <?php echo $row['fullname']; ?></p><br>
				<p>Email :- <?php echo $row['email']; ?></p><br>
				<p>User Name :- <?php echo $row['username']; ?></p><br>
				<p>Bio :- <?php echo $row['bio']; ?></p><br>
				<p>Gender :- <?php echo $row['gender']; ?></p><br>
				<p>Country :- <?php echo $row['country']; ?></p><br><br>
				<h3>Social Links</h3><br>
				<p>Facebook :- <?php echo $row['facebook']; ?></p><br>
				<p>Twitter :- <?php echo $row['twitter']; ?></p><br>
				<p>Pinterest :- <?php echo $row['pinterest']; ?></p>
			</div>		

		</div> 
	</main> 
<?php
    include('footer.php');
?>	