<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>


<?php

if(isset($_POST['submit'])){
	
	$rno= $_POST['rno'];
	$mobile= $_POST['mobile'];
	$year= $_POST['year'];
	$section= $_POST['section'];
	$address= $_POST['address'];
	$school= $_POST['school'];

	$sql ="update `student` set mobile='$mobile',year='$year',section='$section',schoolid='$school',address='$address' where rno='$rno'";
	
	$result = mysql_query($sql);

	header('Location: viewstudents.php');
	exit;
}

?>

<!-- start account -->
<div class="login-page">
	<div class="dreamcrub">
		<div class="account_grid">
			<div class="col-md-6 login-right">
				<h3>Edit Student Info</h3>

				<?php 
					
					$rno =isset($_GET['rno'])?$_GET['rno']:'';
			
					if($rno!=null)
					{
						$sql1 ="SELECT * FROM  student where rno='$rno'";
						
						$result1 = mysql_query($sql1);

							while($row1 = mysql_fetch_assoc($result1))  
							{
			    ?>
				
				<form method="post" class="form form-vertical" id="test-form"
					method="post" onSubmit="loadVal();">

					<input type="hidden" value="<?php echo $rno; ?>" name="rno">

					<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

					<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
					
					<div>
						<span>Mobile</span> <input type="text" name="mobile"
							id="mobile" required value="<?php echo $row1 ['mobile']; ?>">
					</div>

					<div>
						<span>Address</span> <input type="text" name="address" id="address" required value="<?php echo $row1 ['address']; ?>">
							
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

					<div>
						<span>Select Section:</span> 
						<select name="section" id="section" required style="width:460px;">
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
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
