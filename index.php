<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>SZ-Medien</title>
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet">
	<script language="javascript" type="text/javascript" src="js/materialize.js"></script>
		<?php include "php/dbconfig.php"; 
	$select_cam = "SELECT * FROM cameras";
	$result_cam = $conn->query($select_cam);
?>
</head>
<body>
			  <nav>
				<div class="nav-wrapper grey lighten-1">
					<a class="brand-logo"><img src="images/logo/Unbenannt-2.png" alt="logo" width="30%"></img></a>

				</div>
			  </nav>
	<div class="container">
		<div class="section">
			<div class="row">
	<?php 
	if ($result_cam->num_rows > 0) {
    // output data of each row
    while($row = $result_cam->fetch_assoc()) {
?>

				<div class="col s3">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
						  <a href="info.php"><img class="activator" src="images/cameras/test1.jpg"></a>
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">Camera Test<i class="material-icons right">more_vert</i></span>
						  <p><a href="info.php">More Information</a></p>
						</div>
						<div class="card-reveal">
						  <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
						  <p>Here is some more information about this product that is only revealed once clicked on.</p>
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
	
</body>
</html>