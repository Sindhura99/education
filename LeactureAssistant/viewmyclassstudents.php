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
				<!-- /.panel-heading -->
				<div class="panel-body">

					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="dataTables-example">
							<thead>
								<tr>
									<td width="10%">Student ID</td>
									<td width="10%">Name</td>
									<td width="10%">Mobile</td>
									<td width="10%">Gender</td>
									<td width="10%">DOB</td>
									<td width="10%">Address</td>
									<td width="10%">School</td>
									<td width="10%">Year</td>
									<td width="10%">Section</td>
								</tr>
							</thead>
							<tbody>

							<?php while($row = mysql_fetch_assoc($result))  { ?>

								<tr>
									<td><?php echo $row ['rno']; ?></td>
									<td><?php echo $row ['name']; ?></td>
									<td><?php echo $row ['mobile']; ?></td>
									<td><?php echo $row ['gender']; ?></td>
									<td><?php echo $row ['dob']; ?></td>
									<td><?php echo $row ['address']; ?></td>
									<td><?php echo $row ['schoolid']; ?></td>
									<td><?php echo $row ['year']; ?></td>
									<td><?php echo $row ['section']; ?></td>
								</tr>
								<?php
							}
							?>
							</tbody>
						</table>

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


