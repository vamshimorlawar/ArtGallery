<?php
	include('dbconfig.php');
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $db->prepare('SELECT image FROM products WHERE id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("../img/art/".$imgRow['image']);

		// it will delete an actual record from db
		$stmt_delete = $db->prepare('DELETE FROM products WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();

		header("Location: indeximage.php");
	}

	include ('header.php');
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
					<h1 class="h2">All Photos. / <a class="btn btn-default" href="addnewimages.php"> <span class="glyphicon glyphicon-plus"></span> &nbsp; add new </a></h1>
				</div>
			
			<br />
			
			<div class="row">
			<?php
			
				$stmt = $db->prepare('SELECT id, name, image FROM products ORDER BY id DESC');
				$stmt->execute();
			
				if($stmt->rowCount() > 0)
				{
					while($row=$stmt->fetch(PDO::FETCH_ASSOC))
					{
						extract($row);
						?>
						<div class="col-xs-3">
							<p class="page-header"><?php echo $name; ?></p>
							<img src="../img/art/<?php echo $row['image']; ?>" class="img-rounded" width="250px" height="250px" />
							<p class="page-header">
							<span>
							<a class="btn btn-info" href="editimages.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a>
							<a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
							</span>
							</p>
						</div>
						<?php
					}
				}
				else
				{
					?>
					<div class="col-xs-12">
						<div class="alert alert-warning">
							<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
						</div>
					</div>
					<?php
				}
			
			?>
			</div>			
		</div> <!-- .content-wrapper -->
	</main> <!-- .cd-main-content -->
<?php
    include('footer.php');
?>








