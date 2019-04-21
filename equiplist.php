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
	<title>
		BFP Equipment List
	</title>
<script>
	function equipClassSelect(theval) {
		window.location.href = "equip.php?equipclass=" + theval;
	}
</script>

<style type="text/css">
td a { display: block; width: 100%; height: 100%; }
</style>
	
<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bfpahost_equip";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to query the database
$heironsql = "SELECT * FROM heiron";
$heironresult = $conn->query($heironsql);
$hetruckssql = "SELECT * FROM hetrucks";
$hetrucksresult = $conn->query($hetruckssql);
$trsql = "SELECT * FROM tr";
$trresult = $conn->query($trsql);
$ptsql = "SELECT * FROM pt";
$ptresult = $conn->query($ptsql);
$sesql = "SELECT * FROM se";
$seresult = $conn->query($sesql);
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
			<li><a href="18joblist.php">2018 Joblist</a></li>
			<li><a href="19joblist.php">2019 Joblist</a></li>
			<li class="active"><a href="equiplist.php">Equipment</a></li>
			<li><a href="../../FR/current/index.php">Foreman Report</a></li>
            <li><a href="../../FR/current/reports.php">Get Reports</a></li>
			<li><a href="../../FR/current/OfficeOnly/admin.php">Admin Panel</a></li>
		</ul>
	</div>
</nav>



<div style="width:100%">
	<div id="centerthis92">
	
		<div id="selectbar">
		<form action="equip.php" method="get" style="display:inline;">
			<select name="equip" style="padding:3px 10px;" onchange="equipClassSelect(this.value);">
				<option value="heiron" selected>Equipment Type</option>
				<option value="heiron">HE Iron</option>
				<option value="hetrucks">HE Trucks</option>
				<option value="tr">Trailers</option>
				<option value="pt">Pickup Trucks</option>
				<option value="se">Small Equipment</option>
			</select>
		</form>
		&nbsp;&nbsp;&nbsp;
		<span style="font-size:2em; font-weight:bold"> | </span>
		&nbsp;&nbsp;&nbsp;
		<form style="display:inline" action="equipsearch.php" method="post">
			<input type="text" name="search" style="padding:1px 5px;">
			<input type="submit" name="submit" value="Search" style="padding:2px 10px;">
		</form>
		<!-- <div id="logo" style="float:right;">
			<img src="bfplogo.png" width="131.33px" height="67.33px" style="margin-right:25px;margin-bottom:5px;"></img>
		</div>-->
		</div> <!-- Close selectbar DIV -->	

<table id="joblist">
	<tr>
		<th>Equipment ID</th>
		<th>Year</th>
		<th>Manufacturer</th>
		<th>Model</th>
		<th>VIN#</th>
	</tr>

<?php
$heironresult = $conn->query($heironsql);
if ($heironresult->num_rows > 0) {
    while($heironrow = $heironresult->fetch_assoc()) {
        echo "
					<tr>
							<td><a href=equip.php?equipid=".$heironrow["eclass"].$heironrow["enum"].">" . $heironrow["eid"] . "</td>
							<td><a href=equip.php?equipid=".$heironrow["eclass"].$heironrow["enum"].">" . $heironrow["eyear"] . "</td>
							<td><a href=equip.php?equipid=".$heironrow["eclass"].$heironrow["enum"].">" . $heironrow["emanu"] . "</td>
							<td><a href=equip.php?equipid=".$heironrow["eclass"].$heironrow["enum"].">" . $heironrow["emodel"] . " (" . $heironrow["etype"] . ")</td>
							<td><a href=equip.php?equipid=".$heironrow["eclass"].$heironrow["enum"].">" . $heironrow["evin"] . "</td>
					</tr>"; } }
if ($hetrucksresult->num_rows > 0) {
    while($hetrucksrow = $hetrucksresult->fetch_assoc()) {
        echo "
					<tr>
							<td><a href=equip.php?equipid=".$hetrucksrow["eclass"].$hetrucksrow["enum"].">" . $hetrucksrow["eid"] . "</td>
							<td><a href=equip.php?equipid=".$hetrucksrow["eclass"].$hetrucksrow["enum"].">" . $hetrucksrow["eyear"] . "</td>
							<td><a href=equip.php?equipid=".$hetrucksrow["eclass"].$hetrucksrow["enum"].">" . $hetrucksrow["emanu"] . "</td>
							<td><a href=equip.php?equipid=".$hetrucksrow["eclass"].$hetrucksrow["enum"].">" . $hetrucksrow["emodel"] . "</td>
							<td><a href=equip.php?equipid=".$hetrucksrow["eclass"].$hetrucksrow["enum"].">" . $hetrucksrow["evin"] . "</td>
					</tr>"; } }
					
$trresult = $conn->query($trsql);
if ($trresult->num_rows > 0) {
	while($trrow = $trresult->fetch_assoc()) {
		echo "
					<tr>	
							<td><a href=equip.php?equipid=".$trrow["eclass"].$trrow["enum"].">" . $trrow["eid"] . "</td>
							<td><a href=equip.php?equipid=".$trrow["eclass"].$trrow["enum"].">" . $trrow["eyear"] . "</td>
							<td><a href=equip.php?equipid=".$trrow["eclass"].$trrow["enum"].">" . $trrow["emanu"] . "</td>
							<td><a href=equip.php?equipid=".$trrow["eclass"].$trrow["enum"].">" . $trrow["emodel"] . "</td>
							<td><a href=equip.php?equipid=".$trrow["eclass"].$trrow["enum"].">" . $trrow["evin"] . "</td>
					</tr>"; } }
					
$ptresult = $conn->query($ptsql);
if ($ptresult->num_rows > 0) {
    while($ptrow = $ptresult->fetch_assoc()) {
        echo "
					<tr>
							<td><a href=equip.php?equipid=".$ptrow["eclass"].$ptrow["enum"].">" . $ptrow["eid"] . "</td>
							<td><a href=equip.php?equipid=".$ptrow["eclass"].$ptrow["enum"].">" . $ptrow["eyear"] . "</td>
							<td><a href=equip.php?equipid=".$ptrow["eclass"].$ptrow["enum"].">" . $ptrow["emanu"] . "</td>
							<td><a href=equip.php?equipid=".$ptrow["eclass"].$ptrow["enum"].">" . $ptrow["emodel"] ."</td>
							<td><a href=equip.php?equipid=".$ptrow["eclass"].$ptrow["enum"].">" . $ptrow["evin"] . "</td>
					</tr>"; } }
					
$seresult = $conn->query($sesql);
if ($seresult->num_rows > 0) {
	while($serow = $seresult->fetch_assoc()) {
		echo "
					<tr>
							<td><a href=equip.php?equipid=".$serow["eclass"].$serow["enum"].">" . $serow["eid"] . "</td>
							<td><a href=equip.php?equipid=".$serow["eclass"].$serow["enum"].">" . $serow["eyear"] . "</td>
							<td><a href=equip.php?equipid=".$serow["eclass"].$serow["enum"].">" . $serow["emanu"] . "</td>
							<td><a href=equip.php?equipid=".$serow["eclass"].$serow["enum"].">" . $serow["emodel"] . "</td>
							<td><a href=equip.php?equipid=".$serow["eclass"].$serow["enum"].">" . $serow["evin"] . "</td>
					</tr>"; } }
$conn->close();
?>

</table>

	</div>
</div>

<br /><br /><br /><br />
</body>
</html>