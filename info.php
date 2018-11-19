<!doctype html>
<?php
	$id = $_GET["id"];
	
	include "php/dbconfig.php";
	$sql_bilder = "SELECT distinct * FROM `bilder` WHERE id = $id";
	$result_pic = $conn->query($sql_bilder);
	$result = $link->query("SELECT * FROM cameras where id=$id");
	$cam = $result->fetch_assoc();

?>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
	<?php include "main_header.php" ?>
</head>
<body>
		<!-- Navbar -->
	<header>
			  <nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo"><img src="images/logo/Unbenannt-2.png" alt="logo" width="30%" class="logo-img"></img></a>
				    <ul id="nav-mobile" class="right abst20">
						<li><a href="index.php">Back</a></li>
					</ul>
				</div>
			</nav>
	</header>
	<main>
<div class="container">
	<div class="section">
		<div class="row">
			<!--- Header Information -->
			<div class="col s12 center">
				<h2><?php echo $cam["name"] ?></h2>
			</div>
		</div>
		
		<div class="row fix-height-400" style="height: 300px;">
					<!-- Carousel -->
		   <div class="col s12 l2 center" style="margin-top: -30px; padding: 10px;">
			   <ul style="height: 200px;width: 100px;">
				<?php 
					if ($result_pic->num_rows > 0 && $cam["bildlink"] != "") { ?>
				<li class="fix-height-100 fix-width-100" onClick="change_image(20000)" href="#">
					<img src="<?php echo $cam["bildlink"] ?>" class="z-depth-1 hoverable" id="20000" width="50px" height="50px">
			    </li>	
				<?php	// output data of each row
					while($row = $result_pic->fetch_assoc()) {
				  ?>
				<li class="fix-height-100 fix-width-100"  href="#" onClick="change_image(<?php echo $row["num"] ?>)">
					<img src="<?php echo $row["link"] ?>" class="z-depth-1 hoverable" id="<?php echo $row["num"] ?>" width="50px" height="50px">
			    </li>	
				<?php    
				}

			} else if($cam["bildlink"] != "") { ?>
				<li class="fix-height-100 fix-width-100"  href="#">
					<img src="<?php echo $cam["bildlink"] ?>" class="z-depth-1 hoverable" id="" width="50px" height="50px">
			    </li>		
				
				<?php }else{
						echo "<p style='padding-top:100px;padding-left:200px'>Keine Bilder<p>"; 
					}
				?>
				   </ul>
			</div>	
			<div class="center col s12 l5">
			
				<img src="<?php echo $cam["bildlink"]; ?>" id="img" alt="Bild" width="40%">
			
			</div>	
			<div class=" col s12 l5">
				 <ul class="collection with-header">
				  <li class="collection-header"><h4>Informationen</h4></li>
				  <li class="collection-item">Marke: <?php echo $cam["marke"] ?></li>
				  <li class="collection-item">Kameratyp: <?php echo $cam["Kameratyp"] ?></li>
				  <li class="collection-item">Dimensionen: <?php echo $cam["Größe"] ?></li>
				  <li class="collection-item">Gewicht: <?php echo $cam["Gewicht"] ?></li>
				  <li class="collection-item">Auflösung <?php echo $cam["Auflösung"] ?></li>
				</ul>
			</div>	
		</div>
	</div>
</div>
	<?php if($cam["videolink"] != ""){?>
<div class="container" style="margin-bottom: 50px;">
	<div class="section">
		<div class="row" style="width: 70%; padding: 0px;">
				<video class="col s12 l12 z-depth-1" controls style="padding: 0px;">
					<source src="<?php echo $cam["videolink"]; ?>" type="video/mp4">
				</video>
		</div>
	</div>
</div>
	<?php } ?>
	</main>
	<?php include "footer.php"; ?>
		
</body>
	<script language="javascript" type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="js/my.js"></script>
	<script>
	
		function change_image(id){
			src = $("#"+id).attr('src');
			$("#img").attr("src", src);
		}
	

	</script>
</html>