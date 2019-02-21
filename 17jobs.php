<!DOCTYPE HTML>  
<html lang="en">
<head>
	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

<script>
	function jobSelect(theval) {
		window.location.href = "17jobs.php?job=" + theval;
	}
</script>

<style type="text/css">
td a { display: block; width: 100%; height: 100%; }
</style>

<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bfpahost_bfpdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to query the database
$sql = "SELECT jobnum, jobname, jobaddy, jobpin FROM 17joblist";
$result = $conn->query($sql);
?>	
	

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" style="padding-right:60px;font-size:2em">BFP</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="17joblist.php">2017 Joblist</a></li>
			<li><a href="18joblist.php">2018 Joblist</a></li>
			<li><a href="19joblist.php">2019 Joblist</a></li>
			<li><a href="equiplist.php">Equipment</a></li>
			<li><a href="../../FR/current/index.php">Foreman Report</a></li>
            <li><a href="../../FR/current/OfficeOnly/reports.php">Get Reports</a></li>
			<li><a href="../../FR/current/OfficeOnly/admin.php">Admin Panel</a></li>
		</ul>
	</div>
</nav>



<div style="width:100%">
	<div id="centerthis92">

		<div id="selectbar">
		<form action="17jobs.php" method="get" style="display:inline;">
			<select name="job" style="padding:3px 10px;" onchange="jobSelect(this.value);">
				<option selected>Job Number</option>
				<?php
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo "<option>".$row["jobnum"]."</option>";
					}
				}
				?>
			</select>
		</form>
		&nbsp;&nbsp;&nbsp;
		<span style="font-size:2em; font-weight:bold"> | </span>
		&nbsp;&nbsp;&nbsp;
		<form style="display:inline" action="17search.php" method="post">
			<input type="text" name="search" style="padding:1px 5px;">
			<input type="submit" name="submit" value="Search" style="padding:2px 10px;">
		</form>
		<!-- <div id="logo" style="float:right;">
			<img src="bfplogo.png" width="131.33px" height="67.33px" style="margin-right:25px;margin-bottom:5px;"></img>
		</div>-->
		</div> <!-- Close selectbar DIV -->

<table id="joblist">
	<tr>
		<th>Job Number</th>
		<th>Job Name</th>
		<th>Address</th>
		<th>Pin</th>
	</tr>

<?php
$job = $_GET["job"];
$sql = "SELECT jobnum, jobname, jobaddy, jobpin, jobest, basetype, basefrom, astype, asfrom, jobnotes FROM 17joblist WHERE jobnum = $job";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<title> Job #" . $row["jobnum"] . "</title>";
        echo "
					<tr>
							<td>" . $job . "</td>
							<td>" . $row["jobname"] . "</td>
							<td>" . $row["jobaddy"] . "</td>
							<td><a target=new href=https://goo.gl/maps/".$row["jobpin"].">" . $row["jobpin"] . "</td>
</tr>"; } }

$result = $conn->query($sql);
$conn->close();
?>

</table>



<br /><br />
<div style="background-color:#fff;margin-left:auto;margin-right:auto;width:90%;">
	<ul class="flex-container">

			<?php
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<title>Job #" . $row['jobnum'] . "</title>";
						echo "<li class='flex-item' style='margin-bottom:50px'>
						<div class='contentheader'>Job #" . $row["jobnum"] . " - " . $row["jobname"] . "</div>
						<div class='content'>Estimator: " . $row["jobest"] . "</div>
						<div class='content'>" . $row["basetype"] . " roadbase from " . $row["basefrom"] . ".</div>
						<div class='content'>" . $row["astype"] . " asphalt from " . $row["asfrom"] . ".</div>
						<div class='content' id='estnotes'><h1>JOB NOTES:</h1>
						<p>" . $row["jobnotes"] . "</p>
						</div>
						</li>";
								
						echo "<li style='width:200px' class='flex-item'>
						<div class='contentheader'>Work Order</div>
						<div class='content' style='text-align:center;padding-left:0px;padding-top:45px'><a href='Work_Orders/" . $row["jobnum"] . ".pdf'><img src='pdf-icon.png' width='70' height='70'></img></a></div>
						</li>";
						
						}}
			?>

	</ul>
</div>



	</div>
</div>

<br /><br /><br /><br />
</body>
</html>