<?php 
	include "../php/dbconfig.php"; 
	$id = $_GET["id"];

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
	<link href="../css/materialize.css" type="text/css" rel="stylesheet">
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
</head>
<body>
	
		<!-- Navbar -->
			  <nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo center"><img src="../images/logo/Unbenannt-2.png" alt="logo" width="30%"></img></a>
					<ul style="margin-left: 20px;">
				  		<li>Admin Page</li>
						<li class="right" style="margin-right: 40px;"><a href="admin.php">Back</a></li>
				  	</ul>
				</div>
			  </nav>
	
	<!-- Headerr -->
	
	<h3 class="center"><?php echo $cam["name"]; ?></h3>
	
	<div class="container" style="margin-top: 50px;">
	  <div class="row">
		  
    		<form class="col s12 l6">
			  <div class="row">
					<div class="input-field col s12">
					  <input placeholder="Name" id="name" type="text" class="validate" value="<?php echo $cam["name"]; ?>" required>
					  <label for="name">Camera Name</label>
					</div>
					<div class="input-field col s12">
					  <input placeholder="Marke" id="marke" type="text" class="validate" value="<?php echo $cam["marke"]; ?>" required>
					  <label for="marke">Marke</label>
					</div>
				    <div class="input-field col s12">
						<textarea id="beschreibung" class="materialize-textarea" data-length="120" required><?php echo $cam["beschreibung"]; ?></textarea>
						<label for="beschreibung">Textarea</label>
				  	</div>
				  </div>
		  	</form>
		  
		  <div class="col s12 l6">
			  <img src="../<?php echo $cam["bildlink"] ?>" class="right responsive-img" width="200px">
		  </div>		  
      </div>
	</div>
	
		<div class="container">
			  <div class="row">
				  <div class="col s12 l6">
					  <h5 class="center">Main-Bild</h5>
						  <div class="row" style="height: 200px;">
							<div class="col s12 l5">
							  <div class="card small" style="height: 180px;">
								<div class="card-image">
								  <img src="../<?php echo $cam["bildlink"] ?>" style="max-height: 180px;">
								</div>
							  </div>
							</div>
						  </div>
					  <!-- upload Main-Bil -->
					  	  <div class="row">
						   <form action="php/up_one.php?id=<?php echo $cam["id"] ?>" method="post" enctype="multipart/form-data">
							<div class="file-field input-field col s12">
							  <div class="btn">
								<span>File</span>
								<input type="file" name="datei" onChange="changebtn()" id="in_one">
							  </div>
							  <div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							  </div>
							</div>
							<div class="col s12">
								<button class="btn" type="submit" value="Hochladen">Upload</button>
							</div>
						   </form>
					  	  </div>
					  </div>
				  
				  
				  <div class="col s12 l6">
					  <h5 class="center">Weitere-Bilder</h5>
					  <div class="row" style="height: 212px;">
				<?php 
					if ($result_pic->num_rows > 0) {
					// output data of each row
					while($row = $result_pic->fetch_assoc()) {
				  ?>
						<div class="col s6 m4 l3">
						 <div class="card">
								<div class="card-image">
								  <img src="../<?php echo $row["link"] ?>" class="responsive-img">
								</div>
						 </div>
						</div>
				<?php    
					}

				} else {

					echo "<p style='padding-top:100px;padding-left:200px'>Keine Bilder<p>"; 
					}
				?>
					  </div>
					  <div class="row">
					   <form action="#">
						<div class="file-field input-field">
						  <div class="btn">
							<span>File</span>
							<input type="file" multiple>
						  </div>
						  <div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload one or more files">
						  </div>
						</div>
					  </form>
					  </div>
				  </div>
			  </div>
		  </div>
	
	<script>
	
		function changebtn(){
			
			if(document.getElementById("in_one").value != ""){	
				document.getElementById("btn_up_one").innerHTML="Upload";
			}else{
				document.getElementById("btn_up_one").innerHTML="File";	
			}
		}
	
	</script>
</body>
</html>