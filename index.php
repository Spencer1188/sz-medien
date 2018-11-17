	<!-- Datenbank einbindung -->
<?php include "php/dbconfig.php"; 
	$select_cam = "SELECT * FROM cameras";
	$result_cam = $conn->query($select_cam);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>SZ-Medien</title>
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet">
	<script language="javascript" type="text/javascript" src="js/materialize.js"></script>
</head>
<body>
	
	<!-- Navbar -->
			  <nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo center"><img src="images/logo/Unbenannt-2.png" alt="logo" width="30%"></img></a>

				</div>
			  </nav>
	<!-- Main Bereich - Cards Auflistung -->
	<div class="container">
		<div class="section">
			<div class="row">
	<?php 
	if ($result_cam->num_rows > 0) {
    // output data of each row
    while($row = $result_cam->fetch_assoc()) {
?>

				<div class="col s6 m4 l3">
					<div class="card small">
						<div class="card-image waves-effect waves-block waves-light">
						  <a href="info.php?id=<?php echo $row["id"]; ?>"><img class="activator" src="<?php echo $row["bildlink"] ?>"></a>
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4"><?php echo $row["name"] ?><i class="material-icons right">more_vert</i></span>
						  <p><a href="info.php?id=<?php echo $row["id"]; ?>">More Information</a></p>
						</div>
						<div class="card-reveal">
						  <span class="card-title grey-text text-darken-4"><?php echo $row["name"] ?><i class="material-icons right">close</i></span>
						  <p><?php echo $row["beschreibung"]; ?></p>
						</div>
					  </div>
					</div>
<?php    
	}
		
} else {
    echo "0 results"; 
	}
	?>
			</div>
		</div>
	</div>
	<?php include "footer.php" ?>
</body>
</html>