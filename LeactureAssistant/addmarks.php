<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>
<?php 

$username=$_SESSION['username'];

$school="";
$year="";

$sql2 ="SELECT * FROM  faculty where facultyid='$username'";
$result2 = mysql_query($sql2);
while($row2 = mysql_fetch_assoc($result2))  
{
	$school=$row2 ['schoolid'];
	$year=$row2 ['year'];
}	

$sql ="SELECT * FROM  student where schoolid='$school' and year='$year'";
$result = mysql_query($sql);

$testid =isset($_GET['testid'])?$_GET['testid']:'';

?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong> Submit Attendance </strong>
				</div>

				<!-- /.panel-heading -->
				<div class="panel-body">

					<div class="table-responsive">
						
					 <form action="submitmarks.php">

					 	<input type="hidden" value="<?php echo $testid;?>" name="testid">
						
						<table class="table table-striped table-bordered table-hover"
							id="dataTables-example">
							
							<thead>
								<tr>
									<td width="10%">Select Subject</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<tr>
										<td width="10%">
											<select name="subject" id="subject" required>
												<?php
													$sql3 ="SELECT * FROM  subjects where year='$year'";
													$result3 = mysql_query($sql3);
													while($row3 = mysql_fetch_assoc($result3))  
													{
												?>
														<option value="<?php echo $row3 ['subjectname']; ?>"><?php echo $row3 ['subjectname']?></option>
												<?php 
													}	
												?>	
												</select>
										</td>
									</tr>
								</tr>
							</tbody>

						 </table>

						 <table class="table table-striped table-bordered table-hover"
							id="dataTables-example">

							<thead>
								<tr>
									<td width="10%">Roll Number</td>
									<td width="10%">Score</td>
								</tr>
							</thead>

							<tbody>
							
							<?php while($row = mysql_fetch_assoc($result))  {  ?>

								<tr>
									<td><?php echo $row ['rno']; ?></td>
									<td> 
										<input type="number" name="<?php echo $row ['rno'];?>" >
									</td>
								</tr>
							<?php
								}
							?>
								<tr>
									<td colspan="3" align="center"><input type="submit" name="submit" value="Submit"></td>
								<tr/>

							</tbody>
						</table>
						</form>
					</div>
					<!-- /.table-responsive -->

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>

</div>

</div>

</div>
</div>

<?php include('includes/footer.php'); ?>














