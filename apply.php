<?php 

include("include/connection.php");

if (isset($_POST['apply'])) {


	$firstname = $_POST['fname'];
	$lastname = $_POST['sname'];
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$phone = $_POST['number'];
	$country = $_POST['country'];
	$password = $_POST['pass'];
	$confirm_password = $_POST['con_pass'];



	$error = array();


	if (empty($firstname)) {
		$error['apply'] = "Enter Firstname";
	}	
	else if (empty($lastname)) {
		$error['apply'] = "Enter Lasttname";
	
	}else if (empty($username)){
		$error['apply'] = "Enter Username";

	}else if (empty($email)) {
		$error['apply'] = "Enter Email";	

	}else if ($gender == "") {
		$error['apply'] = "Select your Gender";
		
	}else if (empty($phone)) {
		$error['apply'] = "Enter Phone Number";

	}else if ($country == "") {
		$error['apply'] = "Select your Country";
		
	}else if (empty($password)) {
		$error['apply'] = "Enter Password";
		
	}else if ($confirm_password != $password) {
		$error['apply'] = "Password does not match";
		
	}
	
	if (count($error) ==0) {
		$query = "INSERT INTO doctors(firstname,lastname,username,email,gender,phone,country,password,salary,data_reg,status,profile) VALUES('$firstname','$lastname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg')";


		$result = mysqli_query($connect,$query);

		if ($result) {

			echo "<script>alert('You have successfully applied')</script>";
			header("Location: doctorlogin.php");
			# code...
		}else{
			echo "<script>alert('Failed')</script>";
		}

		# code...
	}
}

if (isset($error['apply'])) {
	$s = $error['apply'];

	$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
	# code...
}else{
	$show = "";
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Apply Now!!</title>
</head>
<body>

	<?php 

		include("include/header.php");

	 ?>

	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3"></div>
	 			<div class="col-md-6 my-3 jumbotron">
	 				<h5 class="text-center">Apply Now</h5>
	 					<div>
	 						<?php echo $show; ?>

	 					</div>
	 				<form method="post">
	 					<div class="form-group">
	 						<label>Firstname</label>
	 						<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname"
	 						value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];  ?>">
	 					</div>

	 					<div class="form-group">
	 						<label>Lastname</label>
	 						<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Lastname"
	 						value="<?php if(isset($_POST['sname'])) echo $_POST['sname'];  ?>">
	 					</div>

	 					<div class="form-group">
	 						<label>Username</label>
	 						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"
	 						value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];  ?>">
	 					</div>

	 					<div class="form-group">
	 						<label>Email</label>
	 						<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter email"
	 						value="<?php if(isset($_POST['email'])) echo $_POST['email'];  ?>">
	 					</div>

	 					<div class="form-group">
	 						<label>Select Gender</label>
	 						<select name="gender" class="form-control" style="width: 300px;">
	 							<option value="">Select Gender</option>
	 							<option value="Male">Male</option>
	 							<option value="Female">Female</option>

	 							
	 						</select>
	 						

	 					</div>

	 					<div class="form-group">
	 						<label>Phone Number</label>
	 						<input type="text" name="number" class="form-control" autocomplete="off" placeholder="Enter Phone Number value="<?php if(isset($_POST['number'])) echo $_POST['number'];  ?>"">
	 					</div>

	 						<div class="form-group">
	 						<label>Select Country</label>
	 						<select name="country" class="form-control" style="width: 300px;">
	 							<option value="">Select Country</option>
	 							<option value="Sri Lanka">Russia</option>
	 							<option value="India">India</option>
	 							<option value="United States">United States</option>
	 							<option value="Australia">Australia</option>
	 							<option value="Bangaladesh">Bangaladesh</option>
	 							<option value="United Kingdom">United Kingdom</option>
	 						</select>
	 					
	 					</div>

	 					<div class="form-group">
	 						<label>Password</label>
	 						<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
	 						
	 					</div>

	 					<div class="form-group">
	 						<label>Confirm Password</label>
	 						<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
	 						
	 					</div>

	 					<input type="submit" name="apply" value="Apply Now" class="btn btn-success">
	 					<p>I Already have an account <a href="doctorlogin.php">Cick here</a></p>



	 					
	 				</form>
	 			</div>
	 			<div class="col-md-3"></div>
	 				
	 			</div>
	 			
	 		</div>
	 		
	 	</div>

</body>
</html>