<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

if(isset($_POST['submit'])){
	
	$username= $_POST['username'];
	$password= $_POST['password'];

	$name= $_POST['name'];
	$email= $_POST['email'];
	$mobile= $_POST['mobile'];

	$qualification= $_POST['qualification'];
	$experience= $_POST['experience'];
	
	$usql ="INSERT INTO `faculty`(facultyid,name,email,mobile,qualification,experience) VALUES ('$username','$name','$email','$mobile','$qualification','$experience')";
	
	$result = mysql_query($usql);
	
	$role="2";

	$usql1 ="INSERT INTO `login` VALUES ('$username','$password','$role')";
	
	$result1 = mysql_query($usql1);

	$smsg = "Faulty Registred Successfully";
}

?>
<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Create New Faculty</h3>
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					<div>
						<span>Faculty ID:</span> <input type="text" name="username"
							id="username" required
							<?php echo isset($_POST['username'])?$_POST['username']:'';?>>
					</div>

					<div>
						<span>Password</span> <input type="password" name="password"
							id="password" required
							<?php echo isset($_POST['password'])?$_POST['password']:'';?>>
					</div>

					<div>
						<span>Faulty Name</span> <input type="text" name="name"
							id="name" required
							<?php echo isset($_POST['name'])?$_POST['name']:'';?>>
					</div>

					<div>
						<span>Email</span> <input type="text" name="email"
							id="email" required
							<?php echo isset($_POST['email'])?$_POST['email']:'';?>>
					</div>

					<div>
						<span>Mobile</span> <input type="text" name="mobile"
							id="mobile" required
							<?php echo isset($_POST['mobile'])?$_POST['mobile']:'';?>>
					</div>

					<div>
						<span>Qualification</span> <input type="text" name="qualification"
							id="qualification" required
							<?php echo isset($_POST['qualification'])?$_POST['qualification']:'';?>>
					</div>
					<div>
						<span>Experience</span> <input type="text" name="experience"
							id="experience" required
							<?php echo isset($_POST['experience'])?$_POST['experience']:'';?>>
					</div>

					<input type="submit" name="submit" value="Add Facutly">
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</div>
</div>
</div>
							<?php include('includes/footer.php'); ?>
