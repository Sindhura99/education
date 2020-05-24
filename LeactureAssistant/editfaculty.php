<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>


<?php

if(isset($_POST['submit'])){
	
	$facultyid= $_POST['facultyid'];
	$mobile= $_POST['mobile'];
	$email= $_POST['email'];

	$school= $_POST['school'];
	$year= $_POST['year'];

	$qualification= $_POST['qualification'];
	$experience= $_POST['experience'];
	

	$sql ="update `faculty` set qualification='$qualification',year='$year',experience='$experience',schoolid='$school',mobile='$mobile',email='$email' where facultyid='$facultyid'";
	
	$result = mysql_query($sql);

	header('Location: viewfaculty.php');
	exit;
}

?>

<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Edit Faculty Info</h3>

				<?php 
					
					$facultyid =isset($_GET['facultyid'])?$_GET['facultyid']:'';
			
					if($facultyid!=null)
					{
						$sql1 ="SELECT * FROM  faculty where facultyid='$facultyid'";
						
						$result1 = mysql_query($sql1);

							while($row1 = mysql_fetch_assoc($result1))  
							{
			    ?>
				
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();">

					<input type="hidden" value="<?php echo $facultyid; ?>" name="facultyid">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					
					<div>
						<span>Mobile</span> <input type="text" name="mobile"
							id="mobile" required value="<?php echo $row1 ['mobile']; ?>">
					</div>

					<div>
						<span>Email</span> <input type="text" name="email"
							id="email" required value="<?php echo $row1 ['email']; ?>">
					</div>

					<div>
						<span>Qualification</span> <input type="text" name="qualification"
							id="qualification" required value="<?php echo $row1 ['qualification']; ?>">
					</div>
					<div>
						<span>Experience</span> <input type="text" name="experience"
							id="experience" required value="<?php echo $row1 ['experience']; ?>">
					</div>
					<div>
						<span>Select School:</span> 
						<select name="school" id="school" required style="width:460px;">
						
						<?php
							$sql2 ="SELECT * FROM  school";
							$result2 = mysql_query($sql2);
							while($row2 = mysql_fetch_assoc($result2))  
							{
						?>
								<option value="<?php echo $row2 ['schoolid']; ?>"><?php echo $row2 ['name']."-".$row2 ['village'] ?></option>
						<?php 
							}	
						?>	
						</select>
					</div>

					<div>
						<span>Select Year:</span> 
						<select name="year" id="year" required style="width:460px;">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>

					<input type="submit" name="submit" value="Update">

				</form>

				<?php 
							}
					}
				?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</div>
</div>
</div>
							<?php include('includes/footer.php'); ?>
