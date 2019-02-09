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
		Company Docs
	</title>
<script>
	function jobSelect(theval) {
		window.location.href = "18jobs.php?job=" + theval;
	}
</script>

<style type="text/css">
td a { display: block; width: 100%; height: 100%; }
</style>

<?php
/*								UNNEEDED DATABASE CONNECTION (for now)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bfpdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to query the database
$sql = "SELECT jobnum, jobgen, jobname, jobaddy, jobpin FROM 18joblist";
$result = $conn->query($sql);
*/
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
			<li><a href="18joblist.php">2018 Joblist</a></li>
			<li><a href="19joblist.php">2019 Joblist</a></li>
			<li><a href="equiplist.php">Equipment</a></li>
			<!-- Lets put these on hold for now
				<li><a href="pnplist.php">Pits and Plants</a></li>
				<li class="active"><a href="docs.php">Company Docs</a></li>
			-->
			<li><a href="../../FR/current/index.php">Foreman Reports</a></li>
	  </ul>
  </div>
</nav>



<div style="width:100%">
	<div id="centerthis92">
	
		<div id="selectbar">
			<!-- No Select Bar Needed -->
		</div> <!-- Close selectbar DIV -->
		
<script>
function loadDoc(url, cFunction) {							// buton1 = loadDoc("ajax.txt", myFunction)
	var xhttp;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			cFunction(this);								// myFunction(this) || "(this)" returns XMLHttpRequest Object, which after executed
		}													// conatins all data from "ajax.txt" (depending which button was pressed)
	};
	xhttp.open("GET", url, true);
	xhttp.send();
}

function getDocs(xhttp) {								// The var xhttp contains the return of loadDoc()
	document.getElementById("docsDisplay").innerHTML = xhttp.responseText;
}

function getDocs2(xhttp) {
	document.getElementById("docsDisplay").innerHTML = xhttp.responseText;
}
</script>
		
<div style="background-color:#fff;margin-left:auto;margin-right:auto;width:90%;">
	<ul class="flex-container">


		<li class='flex-item' style='margin-bottom:50px;width:250px;border:none;text-align:right'>
			<ul id="docs" style="list-style:none">
				<style> #docs a {color:#115e00;font-size:1.1em;}</style>
				<li><a href="#" onclick="loadDoc('Docs/fielddocs.php', getDocs)">Field Docs</a></li>
				<li><a href="#" onClick="loadDoc('Docs/safetysheets.php', getDocs)">Safety Sheets</a></li>
				<li><a href="#" onClick="loadDoc('Docs/swppps.php', getDocs)">SWPPPs</a></li>
			</ul>
		</li>
								
		<li class='flex-item' style="text-align:unset;border:none">
			<div id="docsDisplay">
			</div>
		</li>


	</ul>
</div>



	</div>
</div>


<br /><br /><br /><br />
</body>
</html>