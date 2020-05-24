<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>

<?php

if(isset($_POST['submit'])){

	$name= $_POST['name'];
	$village= $_POST['village'];
	$mandal= $_POST['mandal'];
	$district= $_POST['district'];
	$email= $_POST['email'];
	$mobile= $_POST['mobile'];
	
	$usql ="INSERT INTO `school`(name,village,mandal,district,mobile,email) VALUES ('$name','$village','$mandal','$district','$email','$mobile')";
	
	$result = mysql_query($usql);
	
	$smsg = "Scholl Added Successfully";
}

?>
<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Create New School</h3>
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					
					<div>
						<span>Scholl Name</span> <input type="text" name="name"
							id="name" required
							<?php echo isset($_POST['name'])?$_POST['name']:'';?>>
					</div>

					<div>
						<span>Village</span> <input type="text" name="village"
							id="village" required
							<?php echo isset($_POST['village'])?$_POST['village']:'';?>>
					</div>
					<div>
						<span>Mandal</span> <input type="text" name="mandal"
							id="mandal" required
							<?php echo isset($_POST['mandal'])?$_POST['mandal']:'';?>>
					</div>

					<div>
						<span>District</span> <input type="text" name="district"
							id="district" required
							<?php echo isset($_POST['district'])?$_POST['district']:'';?>>
					</div>

					<div>
						<span>Mobile</span> <input type="text" name="mobile"
							id="mobile" required
							<?php echo isset($_POST['mobile'])?$_POST['mobile']:'';?>>
					</div>

					<div>
						<span>Email</span> <input type="text" name="email"
							id="email" required
							<?php echo isset($_POST['email'])?$_POST['email']:'';?>>
					</div>

					<input type="submit" name="submit" value="Add School">
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
