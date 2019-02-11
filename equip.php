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
    die("Connection failed: " . $conn->connect_error); } 

// sql to query the database
$hesql = "SELECT * FROM he";
$heresult = $conn->query($hesql);
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
			<li><a href="../../TS/current/admin.php">Admin Panel</a></li>
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
if (isset($_GET["equipclass"])) {								// If URL contains "equipclass" value, do this:
	$class = $_GET["equipclass"];
	if ($class == "heiron") { echo "<title>Heavy Equipment</title>"; } else if ($class == "hetrucks") { echo "<title>Heavy Trucks</title>"; } else if ($class == "tr") { echo "<title>All Trailers</title>"; } else if ($class == "pt") { echo "<title>All Pickup Trucks</title>"; } else if ($class == "se") { echo "<title>All Small Equipment</title>"; }
	$sql = "SELECT * FROM $class";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "
			<tr>
				<td><a href=equip.php?equipid=".$row["eclass"].$row["enum"].">" . $row["eid"] . "</td>
				<td><a href=equip.php?equipid=".$row["eclass"].$row["enum"].">" . $row["eyear"] . "</td>
				<td><a href=equip.php?equipid=".$row["eclass"].$row["enum"].">" . $row["emanu"] . "</td>
				<td><a href=equip.php?equipid=".$row["eclass"].$row["enum"].">" . $row["emodel"] . " (" . $row["etype"] . ")</td>
				<td><a href=equip.php?equipid=".$row["eclass"].$row["enum"].">" . $row["evin"] . "</td>
			</tr>"; 
		} } }

if (isset($_GET["equipid"])) {									// If URL contains "equipid" value, do this:
	$class = $_GET["equipid"];									// Get value from URL equal to "equipid" and set to $class
	$class = preg_replace('/[0-9]+/', '', $class);				// Trim value of numbers to get "eclass" DB value
	//$class = strtolower($class);								// Not needed because vvv 'class == "HE"' instead of "he"
	$num = $_GET["equipid"];									// Get value from URL equal to "equipid" and set to $num
	$num = preg_replace('/[A-Z]+/', '', $num);					// Trim value of letters to get "enum" DB value
	echo "<title>" . $class . " " . $num . "</title>";
	
	if ($class == "HE") {										// If trimmed $class is "he" run this code		
		$sql = "SELECT * FROM heiron WHERE enum = $num";		// First search "heiron" table
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {							// Does "heiron" table have a matching $num?
			while($row = $result->fetch_assoc()) {
				echo "
				<tr>
					<td>" . $row["eid"] . "</td>
					<td>" . $row["eyear"] . "</td>
					<td>" . $row["emanu"] . "</td>
					<td>" . $row["emodel"] . " - " . $row["etype"] . "</td>
					<td>" . $row["evin"] . "</td>
				</tr>"; }
		} else {												// If "heiron" table doesnt have a match, do this:
			$class = strtolower($class);		
			$sql = "SELECT * FROM hetrucks WHERE enum = $num";	// Search "hetrucks" for a match to $num
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {						// If the $sql query returns any values, do this:
				while($row = $result->fetch_assoc()) {			// Output data of each row
					echo "
					<tr>
						<td>" . $row["eid"] . "</td>
						<td>" . $row["eyear"] . "</td>
						<td>" . $row["emanu"] . "</td>
						<td>" . $row["emodel"] . "</td>
						<td>" . $row["evin"] . "</td>
					</tr>"; }
			}
		}
	} else {													// If $class isnt "he" do this:
		$class = strtolower($class);
		$sql = "SELECT * FROM $class WHERE enum = $num";		// Search $class table for $num enum value
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {							// If the $sql query returns any values, do this:
			while($row = $result->fetch_assoc()) {				// Output data of each row
				echo "
				<tr>
					<td>" . $row["eid"] . "</td>
					<td>" . $row["eyear"] . "</td>
					<td>" . $row["emanu"] . "</td>
					<td>" . $row["emodel"] . "</td>
					<td>" . $row["evin"] . "</td>
				</tr>"; }
		}
	}
}
?>

</table>

<br />
<div style="background-color:#fff;margin-left:auto;margin-right:auto;width:90%;">
	<ul class="flex-container">

		<?php
					
if (isset($_GET["equipid"])) {									// If URL contains "equipid" value, do this:
	$class = $_GET["equipid"];									// Get value from URL equal to "equipid" and set to $class
	$class = preg_replace('/[0-9]+/', '', $class);				// Trim value of numbers to get "eclass" DB value
	//$class = strtolower($class);								// Not needed because vvv 'class == "HE"' instead of "he"
	$num = $_GET["equipid"];									// Get value from URL equal to "equipid" and set to $num
	$num = preg_replace('/[A-Z]+/', '', $num);					// Trim value of letters to get "enum" DB value
	echo "<title>" . $class . " " . $num . "</title>";
	
	if ($class == "HE") {										// If trimmed $class is "he" run this code		
		$sql = "SELECT * FROM heiron WHERE enum = $num";		// First search "heiron" table
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {							// Does "heiron" table have a matching $num?
			while($row = $result->fetch_assoc()) {
				echo "<li class='flex-item' style='width:40%'>
					<div class='contentheader'>" . $row["eid"] . " - " . $row["eyear"] . " " . $row["emanu"] . " " . $row["emodel"] . "</div>
					<div class='content'>" . $row["etype"] . "</div>
					<div class='content'>" . $row["esearch"] . ".</div>
					<div class='content'>" . $row["evin"] . ".</div>
					<div class='content' id='estnotes'><h1>EQUIPMENT NOTES:</h1>
					<p>" . $row["enotes"] . "</p>
					</div>
					</li>";
						
				echo "<li style='width:200px' class='flex-item'>
					<div class='pictureheader'>
						<a href='#' onClick='picback()' style='float:left'>
							<img src='arrow_back.png' width='24px' height='24px' style='display:inline'></img>
						</a>
						<a href='#' onClick='picforward()' style='float:right'>
							<img src='arrow_forward.png' width='24px' height='24px' style='display:inline'></img>
						</a>
					</div>
					<div class='content' style='text-align:center;padding-left:0px;padding-top:45px'><a href='" . $row["eid"] . ".pdf'><img src='pdf-icon.png' width='70' height='70'></img></a></div>
					</li>";

// This is the start of the equipmentrecords portion.
// CONNECTING TO A SECOND DATABASE //////////////////////////////////////////////////////////////
				$servername2 = "localhost";		// But only does shit for the HE IRON entires.
				$username2 = "root";
				$password2 = "";
				$dbname2 = "equipmentrecords";
				$record = $_GET["equipid"];
				$record = strtolower($record);
				
				$conn2 = new mysqli($servername2, $username2, $password2, $dbname2);
				$sql2 = "SELECT * FROM $record
                        WHERE PlaceLastUsed IS NOT NULL
                        ORDER BY id DESC";
                $result2 = $conn2->query($sql2);
				if ($conn2->connect_error) {
					die("Connection failed: " . $conn2->connect_error);
				}
				
				echo "<li style='width:78%;margin:auto;margin-bottom:20px;' class='flex-item'>
					<div class=''>
					</div>
					<div class='content' style='text-align:center;padding-left:0px;padding-top:25px;'>";
								
				if ($result2->num_rows > 0) {
                    $c = 1;
					while($row2 = $result2->fetch_assoc()) {
                        if ($c < 5) { // Only want 4 rows to show.
                            echo "<h4 style='margin:0;'><a href='../../FR/current/getr.php?r=" . $row2["frnum"] . "&f=" . $row2["WhoLastUsed"] . "'>Last used by " . ucfirst($row2["WhoLastUsed"]) . "'s crew on " . $row2["DateLastUsed"] . " at Job #: " . $row2["PlaceLastUsed"] . "</a></h4><br />";
                            $c++;
                        }
                    }
				} else {
					echo "<h3>No work history for this piece yet.</h3>";
				}
				
				echo "</div>
					</li>";						
					
	////////////////////////////////////////////////////////////////////////////////////////
				$sql3 =	"SELECT *
                        FROM $record
                        WHERE LastServiceDate IS NOT NULL
                        ORDER BY id DESC";
				$result3 = $conn2->query($sql3);
				if ($conn2->connect_error) {
					die("Connection failed: " . $conn2->connect_error);
				}
				
				echo "<li style='width:78%;margin:auto;' class='flex-item'>
					<div class=''>
					</div>
					<div class='content' style='text-align:center;padding-left:0px;padding-top:25px'>";
								
				if ($result3->num_rows > 0) {
                    $c = 1;
					while($row3 = $result3->fetch_assoc()) {
                        if($c < 5) {
                            echo "<h3 style='margin:0;'>Last service was on " . $row3["LastServiceDate"] . " at " . $row3["LastServiceOdo"] . " " . $row3["OdoType"] . "</h3>";
                            $c++;
                            }
				        }
                }else {
					echo "<h3>No service records for this piece yet.</h3>";
				}
				
				echo "</div>
					</li>";		

					
// END of the equipmentrecords database portion!
//////////////////////////////////////////////////////////////////////////////////////////////
				
	
	
			}
		} else {												// If "heiron" table doesnt have a match, do this:
			$class = strtolower($class);		
			$sql = "SELECT * FROM hetrucks WHERE enum = $num";	// Search "hetrucks" for a match to $num
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {						// If the $sql query returns any values, do this:
				while($row = $result->fetch_assoc()) {			// Output data of each row
					echo "<li class='flex-item' style='width:40%;'>
						<div class='contentheader'>" . $row["eid"] . " - " . $row["eyear"] . " " . $row["emanu"] . " " . $row["emodel"] . "</div>
						<div class='content'>" . $row["etype"] . "</div>
						<div class='content'>" . $row["esearch"] . ".</div>
						<div class='content'>" . $row["evin"] . ".</div>
						<div class='content' id='estnotes'><h1>EQUIPMENT NOTES:</h1>
						<p>" . $row["enotes"] . "</p>
						</div>
						</li>";
							
					echo "<li style='width:200px' class='flex-item'>
						<div class='contentheader'>" . $row["eid"] . " pictures</div>
						<div class='content' style='text-align:center;padding-left:0px;padding-top:45px'><a href='" . $row["eid"] . ".pdf'><img src='pdf-icon.png' width='70' height='70'></img></a></div>
						</li>";
				}
			}
		}
	} else {													// If $class isnt "he" do this:
		$class = strtolower($class);
		$sql = "SELECT * FROM $class WHERE enum = $num";		// Search $class table for $num enum value
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {							// If the $sql query returns any values, do this:
			while($row = $result->fetch_assoc()) {				// Output data of each row
				echo "<li class='flex-item' style='width:40%;'>
					<div class='contentheader'>" . $row["eid"] . " - " . $row["eyear"] . " " . $row["emanu"] . " " . $row["emodel"] . "</div>
					<div class='content'>" . $row["etype"] . "</div>
					<div class='content'>" . $row["esearch"] . ".</div>
					<div class='content'>" . $row["evin"] . ".</div>
					<div class='content' id='estnotes'><h1>EQUIPMENT NOTES:</h1>
					<p>" . $row["enotes"] . "</p>
					</div>
					</li>";
							
				echo "<li style='width:200px' class='flex-item'>
					<div class='contentheader'>" . $row["eid"] . " pictures</div>
					<div class='content' style='text-align:center;padding-left:0px;padding-top:45px'><a href='" . $row["eid"] . ".pdf'><img src='pdf-icon.png' width='70' height='70'></img></a></div>
					</li>";
			}
		}
	}
}
$conn->close();
		?>

	</ul>
</div>

	</div>
</div>


<br /><br /><br /><br />
</body>
</html>