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
	function popSelect(theval) {
		window.location.href = "pnp.php?pop=" + theval;
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
    die("Connection failed: " . $conn->connect_error); } 

// sql to query the database
$sql = "SELECT * FROM pnp";
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
			<li><a href="17joblist.php">2017 Joblist</a></li>
			<li class="active"><a href="18joblist.php">2018 Joblist</a></li>
			<li><a href="19joblist.php">2019 Joblist</a></li>
			<li><a href="equiplist.php">Equipment</a></li>
			<!-- Lets put these on hold for now
				<li class="active"><a href="pnplist.php">Pits and Plants</a></li>
				<li><a href="docs.php">Company Docs</a></li>
			-->
			<li><a href="../../FR/current/index.php">Foreman Reports</a></li>
	  </ul>
  </div>
</nav>



<div style="width:100%">
	<div id="centerthis92">
	
		<div id="selectbar">
		<form action="pnp.php" method="get" style="display:inline;">
			<select name="pop" style="padding:3px 10px;" onchange="popSelect(this.value);">
				<option value="01" selected>Choose Pit/Plant</option>
				<?php
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<option value=" . $row["pid"] . ">" . $row["pname"] . "</option>"; }}
				?>
			</select>
		</form>
		&nbsp;&nbsp;&nbsp;
		<span style="font-size:2em; font-weight:bold"> | </span>
		&nbsp;&nbsp;&nbsp;
		<form style="display:inline" action="pnpsearch.php" method="post">
			<input type="text" name="search" style="padding:1px 5px;">
			<input type="submit" name="submit" value="Search" style="padding:2px 10px;">
		</form>
		<!-- <div id="logo" style="float:right;">
			<img src="bfplogo.png" width="131.33px" height="67.33px" style="margin-right:25px;margin-bottom:5px;"></img>
		</div>-->
		</div> <!-- Close selectbar DIV -->	
	
<table id="joblist">
	<tr>
		<th>Pit Name</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>Hours</th>
		<th>Pin</th>
	</tr>

<?php
$pop = $_GET["pop"];
$sql = "SELECT pid, pname, pproducts, paddy, pnumber, phours, ppin, pnotes FROM pnp WHERE pid = $pop";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
					<tr>
							<td>" . $row["pname"] . "</td>
							<td>" . $row["paddy"] . "</td>
							<td><a href=tel:" . $row["pnumber"] . ">" . $row["pnumber"] . "</a></td>
							<td>" . $row["phours"] . "</td>
							<td><a target=new href=https://goo.gl/maps/".$row["ppin"].">" . $row["ppin"] . "</td>
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
						echo "<title>" . $row["pname"] . "</title>";
						echo "<li class='flex-item' style='margin-bottom:50px'>
						<div class='contentheader'>" . $row["pname"] . "</div>
						<div class='content'>Address: " . $row["paddy"] . "</div>
						<div class='content'>Products: " . $row["pproducts"] . "</div>
						<div class='content'>Location Pin: " . $row["ppin"] . "</div>
						<div class='content' id='estnotes'><h1>PIT or PLANT NOTES:</h1>
						<p>" . $row["pnotes"] . "</p>
						</div>
						</li>";
								
						echo "<li style='width:200px' class='flex-item'>
						<div class='contentheader'>Location Map</div>
						<div class='content' style='text-align:center;padding-left:0px;padding-top:45px'><a href='pnp" . $row["pid"] . ".pdf'><img src='map-icon.png' width='70' height='70'></img></a></div>
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