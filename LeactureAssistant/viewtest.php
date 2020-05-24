<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>
<?php require_once('includes/Pagination.class.php');

$count = mysql_query("SELECT * FROM  test");
$total_rows = mysql_num_rows($count);


$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1;

if (!isset($_SESSION['perpage']) && !isset($_GET['per']))
$_SESSION['perpage'] = 10;
else if (isset($_GET['per']))
$_SESSION['perpage'] = (int) $_GET['per'];
$per_page = $_SESSION['perpage'];

$page = ($page == 0) ? 1 : $page;

$pagination = new Pagination($page, $total_rows);
$pagination->setRPP($per_page); //setting  no.of rows per page
$pagination_markup = $pagination->parse();
$row_start = abs(($page - 1) * $per_page);

$sql ="SELECT * FROM  test   LIMIT $row_start, $per_page";
$result = mysql_query($sql);

?>

<div id="page-wrapper">

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				
				<?php
					if($user_type==1)
					{
				?>
						<div class="panel-heading">
							<center>  <a href="addtest.php"> <font color="white"> Add Test </font> </a>  </center>
						</div>
				<?php
					}
				?>

				<?php
					if($user_type==3)
					{
				?>
						<div class="panel-heading">
							<center> 
								<?php
									
									$username=$_SESSION['username'];
									
									$resultx = mysql_query("select (count(status)*100/(select Count(*) From attendance where sid='$username')) as cnt FROM attendance where status='yes' and sid='$username'");
									
									$rowx = mysql_fetch_array($resultx);
									
									$cnt=$rowx["cnt"];
										
								?>
								Current Attendance Percentage:<?php echo $cnt; ?>
							</center>
							
						</div>
				<?php
					}
				?>

				<!-- /.panel-heading -->
				<div class="panel-body">

					<label> No Of Records: <select class="sgrid left-align"
						id="per_page" name="per_page"
						onChange="javascript:loadperpage(this);">
							<option value="10"
							<?php echo ($per_page == 10 ) ? 'selected': ''; ?>>10</option>
							<option value="25"
							<?php echo ($per_page == 25 ) ? 'selected': ''; ?>>25</option>
							<option value="50"
							<?php echo ($per_page == 50 ) ? 'selected': ''; ?>>50</option>
							<option value="100"
							<?php echo ($per_page == 100 ) ? 'selected': ''; ?>>100</option>
					</select> </label>



					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover"
							id="dataTables-example">
							<thead>
								<tr>
									<td width="10%">ID</td>
									<td width="10%">Name</td>
									<td width="10%">Description</td>
									<td width="10%">View Score</td>
									<?php
										if($user_type==1)
										{
									?>
											<td width="10%">Delete</td>
									<?php
										}
									?>

									<?php
										if($user_type==2)
										{
									?>
											<td width="10%">Add Marks</td>
									<?php
										}
									?>
								</tr>
							</thead>
							<tbody>
							<?php $sno=1;$i = $row_start; while($row = mysql_fetch_assoc($result))  {  $i++;?>

								<tr>
									<td><?php echo $row ['testid']; ?></td>
									<td><?php echo $row ['name']; ?></td>
									<td><?php echo $row ['description']; ?></td>

									<?php
										if($user_type==1)
										{
									?>
											<td><a
											href="deletetest.php?testid=<?php echo $row ['testid']; ?>" />Delete
											</a></td>
									<?php
										}
										else if($user_type==2)
										{
									?>
											<td><a
											href="addmarks.php?testid=<?php echo $row ['testid']; ?>" />Add Marks
											</a></td>
									<?php
										}
									?>

									<?php
										if($user_type==3)
										{
									?>
											<td><a
											href="viewstudenttestscore.php?testid=<?php echo $row ['testid']; ?>" />View Score
											</a></td>
									<?php
										}
										else
										{
									?>
											<td><a
											href="viewclasstestscore.php?testid=<?php echo $row ['testid']; ?>" />View Score
											</a></td>
									<?php
										}
									?>

								</tr>
								<?php
							}
							if ($total_rows == 0) {
								echo '<tr><td colspan="4">No records found to display.</td></tr>';
							}
							?>
							</tbody>
						</table>

						<span class="pull-left" style="margin-top: 15px; float: "> <?php
						$row_start++;
						if ($total_rows != 0) { echo "Showing $row_start to $i of $total_rows records"; }
						?>
						</span>
						<link href="css/pagination.css" rel="stylesheet">
						<span class="pull-right">
							<div class="pagination">
								<ul style="float: right; margin-right: 10px;">
								<?php echo $pagination_markup; ?>
								</ul>
							</div> </span>
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


