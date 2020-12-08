<?php 
session_start();
 ?>


<!DOCTYPE html>
<html>
<head> 	<script type="text/javascript">
 		function preback(){window.history.forward();}
 		setTimeout("preback()",0);
 		window.onunload=function(){null};


 	</script>
	<title>Admin</title>
</head>
<body>
	<?php 

include("../include/header.php");

	 ?>
<div class="container-fluid">
<div class="col-md-12">
<div class="row">
<div class="col-md-2" style="margin-left: -30px;">
	
<?php 
include("sidenav.php");
include("../include/connection.php");

 ?>

</div>
		<div class="col-md-10">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
					<h5 class="text-center">All Admins</h5>



						<div class="table-responsive">

							<?php 

								$query = "SELECT * FROM admin";
								$query_run = mysqli_query($connect,$query);


							 ?>

							<table class="table table-bordered" id="dataTable" style="width: 500px;" >
								<thead>
									<tr>
										<th>Id</th>
										<th>Username</th>
										<th>Password</th>
										<th>Action</th>

									</tr>

								</thead>
						
							<tbody>

									<?php 

										if (mysqli_num_rows($query_run)  > 0) 
										{
												
												while ($row = mysqli_fetch_assoc($query_run)) 
												{
													
													?>


										



								<tr>

									<td> <?php echo $row['id']; ?></td>
									<td> <?php echo $row['username']; ?></td>
									<td> <?php echo $row['password']; ?></td>

									<td>
										<form method="post"> 
											<input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
										<button type="submit" name="delete_btn" class="btn btn-danger">Remove</button>
										</form>
									</td>
									
									

								</tr>

												<?php 	
																								
												}										
										}
										else{
												echo "No New User";
										}
									 ?>


							</tbody>
							


						</div>

					</table>


					<?php 


if (isset($_POST['delete_btn'])) 
{
	$id = $_POST['delete_id'];
	$query = "DELETE FROM admin WHERE id='$id' ";
	$query_run =mysqli_query($connect, $query);

	if ($query_run)

	{
				
	}
	else
	{

		

	}	
}

?>

						


					</div>
					<div class="col-md-6">

						<?php 

							if (isset($_POST['add'])) {

								$uname = $_POST['uname'];
								$pass = $_POST['pass'];
								$image = $_FILES['img']['name'];

								$error = array();
								if (empty($uname)) {
									$error['u'] = "Enter Admin Username";
									# code...
								}elseif (empty($pass)) {
									$error['u'] = "Enter Admin Password";
									# code...
								}elseif (empty($image)) {
									$error['u'] = "Add Admin Photo";
									# code...
								}

								if (count($error) ==0) {

									$q ="INSERT INTO admin(username,password,profile) VALUES('$uname','$pass','$image')";
									# code...
									$result =mysqli_query($connect,$q);
									if ($result) {

										move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
										
									}else{

									}
								}
								  
							}

							
							if (isset($error['u'])) {
								$er = $error['u'];
								$show = "<h5 class='text-center alert alert-danger'>$er</h5>";
							}else{
								$show = "";
							}


						 ?>
						 <br>
						 
						<h5 class="text-center">Add New Admin</h5>
						<form  method="post" enctype="multipart/form-data">
							<div>
								<?php echo $show; ?>
							</div>
							<div class="from-group">
								<label>Username</label>
								<input type="text" name="uname" class="form-control" autocomplete="off">
								
							</div>
							<div class="from-group">
								<label>Password</label>
								<input type="password" name="pass" class="form-control">
								
							</div>
							<div class="from-group">
								<label>Add Admin Picture</label>
								<input type="file" name="img" class="form-control">

								
							</div><br>
							<input type="submit" name="add" value="Add New Admin" class="btn btn-success">
						</form>
						
					</div>
				</div>
			</div>
			
		</div>
</div>
</div>
</div>

</body>
</html>