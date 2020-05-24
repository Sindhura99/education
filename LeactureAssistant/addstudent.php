<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

if(isset($_POST['submit'])){
	
	$username= $_POST['username'];
	$password= $_POST['password'];

	$name= $_POST['name'];
	$address= $_POST['address'];
	$mobile= $_POST['mobile'];

	$gender= $_POST['gender'];
	$dob= $_POST['dob'];
	
	$usql ="INSERT INTO `student`(rno,name,mobile,gender,dob,address) VALUES ('$username','$name','$mobile','$gender','$dob','$address')";
	
	$result = mysql_query($usql);
	
	$role="3";

	$usql1 ="INSERT INTO `login` VALUES ('$username','$password','$role')";
	
	$result1 = mysql_query($usql1);

	$smsg = "Student Registred Successfully";
}

?>
<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Add Student</h3>
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					<div>
						<span>Roll Number:</span> <input type="text" name="username"
							id="username" required
							<?php echo isset($_POST['username'])?$_POST['username']:'';?>>
					</div>

					<div>
						<span>Password</span> <input type="password" name="password"
							id="password" required
							<?php echo isset($_POST['password'])?$_POST['password']:'';?>>
					</div>

					<div>
						<span>Student Name</span> <input type="text" name="name"
							id="name" required
							<?php echo isset($_POST['name'])?$_POST['name']:'';?>>
					</div>

					<div>
						<span>Mobile</span> <input type="text" name="mobile"
							id="mobile" required
							<?php echo isset($_POST['mobile'])?$_POST['mobile']:'';?>>
					</div>

					<div>
						<span>Select Gender:</span> 
						<select name="gender" id="gender" required style="width:460px;">
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>

					<div>
						<span>Date of Birth</span> <input type="date" name="dob" style="width:460px;"
							id="dob" required
							<?php echo isset($_POST['dob'])?$_POST['dob']:'';?>>
					</div>

					<div>
						<span>Address</span> <textarea name="address" id="address" required cols="62"> </textarea>
					</div>

					<input type="submit" name="submit" value="Add Student">
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
