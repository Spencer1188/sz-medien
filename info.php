<!-- ID setzen und Datenbank einbinden -->
<?php
	$id = $_GET["id"];
	
	include "php/dbconfig.php";
	$sql_bilder = "SELECT distinct * FROM `bilder` WHERE id = $id";
	$result_pic = $conn->query($sql_bilder);
	$result = $link->query("SELECT * FROM cameras where id=$id");
	$cam = $result->fetch_assoc();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet">
	<script language="javascript" type="text/javascript" src="js/materialize.js"></script>
</head>
<body>
		<!-- Navbar -->
			  <nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo"><img src="images/logo/Unbenannt-2.png" alt="logo" width="30%"></img></a>
				    <ul id="nav-mobile" class="right abst20">
						<li><a href="index.php">Back</a></li>
					</ul>
				</div>
			</nav>

<div class="container">
	<div class="section">
		<div class="row">
			<!--- Header Information -->
			<div class="col s12 l6" style="padding-top: 60px;">
				<h4><?php echo $cam["name"] ?></h4>
				<ul>
					<li>Megapixel</li>
					<li>Kameratyp</li>
					<li>Akkulaufzeit</li>
				</ul>
			</div>
				
		<!-- Carousel -->
		   <div class="carousel col s12 l6">
				<?php 
					if ($result_pic->num_rows > 0) {
					// output data of each row
					while($row = $result_pic->fetch_assoc()) {
				  ?>
				<a class="carousel-item" href="#!"><img src="<?php echo $row["link"] ?>"></a>	
				<?php    
				}

			} else {
						
				echo "<p style='padding-top:100px;padding-left:200px'>Keine Bilder<p>"; 
				}
				?>
			</div>	
		</div>
	</div>
</div>
	<?php if($cam["videolink"] != ""){?>
<div class="container" style="margin-bottom: 50px;">
	<div class="section">
		<div class="row">
				<video class="col s12 l12" controls>
					<source src="<?php echo $cam["videolink"]; ?>" type="video/mp4">
				</video>
		</div>
	</div>
</div>
	<?php } ?>
	<script>
	  document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.carousel');
		var instances = M.Carousel.init(elems,200);
	  });
	</script>
	
	<?php include "footer.php"; ?>
</body>
</html>