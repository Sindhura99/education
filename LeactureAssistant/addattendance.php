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
						
					 <form action="submitattendance.php">
						
						<table class="table table-striped table-bordered table-hover"
							id="dataTables-example">
							
							<thead>
								<tr>
									<td width="10%">Select Date</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<tr>
										<td width="10%"><input type="date" name="date"id="date" required><?php echo isset($_POST['date'])?$_POST['date']:'';?></td>
									</tr>
								</tr>
							</tbody>

						 </table>

						 <table class="table table-striped table-bordered table-hover"
							id="dataTables-example">

							<thead>
								<tr>
									<td width="10%">Roll Number</td>
									<td width="10%">is Attended?</td>
								</tr>
							</thead>

							<tbody>
							
							<?php while($row = mysql_fetch_assoc($result))  {  ?>

								<tr>
									<td><?php echo $row ['rno']; ?></td>
									<td> 
										<input type="radio" name="<?php echo $row ['rno'];?>" id="attended" value="yes" >Yes
										<input type="radio" name="<?php echo $row ['rno'];?>" id="attended" value="no" checked="checked">No
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














