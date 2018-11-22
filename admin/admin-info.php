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
<?php include "admin_header.php" ?>
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
		  
    		<div class="col s12">
			  <div class="row">
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="inr" type="text" class="validate" value="<?php echo $cam["inr"]; ?>" required>
					  <label for="name">Inventar Nummer</label>
					</div>
				</div>			
				<div class="row">
				  	<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="name" type="text" class="validate" value="<?php echo $cam["name"]; ?>" required>
					  <label for="name">Name</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="marke" type="text" class="validate" value="<?php echo $cam["marke"]; ?>" required>
					  <label for="marke">Marke</label>
					</div>
				</div>
				<div class="row">
				    <div class="input-field col s12">
						<textarea id="beschreibung" class="materialize-textarea" data-length="120" required><?php echo $cam["beschreibung"]; ?></textarea>
						<label for="beschreibung">Beschreibung</label>
				  	</div>
				</div>
			  <div class="row">
					<div class="input-field col s12 m6 l6">
				  	  <input placeholder="" id="typ" type="text" class="validate" value="<?php echo $cam["Kameratyp"]; ?>" required>
					  <label for="typ">Kameratyp</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="afl" type="text" class="validate" value="<?php echo $cam["afl"]; ?>" required>
					  <label for="afl">Auflösung</label>
					</div>
			 </div>
				<div class="row">
				    <div class="input-field col s12 m6 l6">
				  	  <input placeholder="" id="akl" type="text" class="validate" value="<?php echo $cam["akkulaufzeit"]; ?>" required>
					  <label for="akl">Akkulaufzeit</label>
				  	</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="spmed" type="text" class="validate" value="<?php echo "in arb"; ?>" required>
					  <label for="spmed">Speicherkarte</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="vsz" type="text" class="validate" value="<?php echo $cam["Verschlusszeiten"]; ?>" required>
					  <label for="vsz">Verschlusszeit</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="iso" type="text" class="validate" value="<?php echo $cam["ISO"]; ?>" required>
					  <label for="iso">ISO</label>
					</div>
				  </div>
				<div class="row">
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="gewicht" type="text" class="validate" value="<?php echo $cam["Gewicht"]; ?>" required>
					  <label for="gewicht">Gewicht</label>
					</div>
					<div class="input-field col s12 m6 l6">
					  <input placeholder="" id="dim" type="text" class="validate" value="<?php echo $cam["dim"]; ?>" required>
					  <label for="dim">Dimension</label>
					</div>
				  </div>
				<div>
					<div class="row center">
						<button class="inline-icon btn waves-effect" onClick="save_info(<?php echo $id; ?>)">
							<i class="material-icons inline-icon">check</i>
							Speichern
						</button>
					</div>
				</div>
		 	 </div>
		  </div>		  
      </div>

	
		<div class="container">
			<div class="row">
				
			  <div class="row col s12 l6">
					  <h5 class="center">Main-Bild</h5>
				  <div class="col s12 center">
						  <div class="row" style="height: 200px;">
							<div class="col s12">
								  <img src="../<?php echo $cam["bildlink"] ?>" width="40%">
							</div>
						   </div>
				  </div>
					  <!-- upload Main-Bil -->
					  	  <div class="col s12 center">
						   <form action="php/up_one.php?id=<?php echo $cam["id"] ?>" method="post" enctype="multipart/form-data">
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								<input type="file" name="datei" id="in_one">
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path">
							  </div>
							  <div class="col s2" style="margin-top: 10px;" id="upload_one">
								<i class="material-icons">file_upload</i>
							  </div>
							</div>
						</div>
						   </form>
					  	  </div>
				  
				  
				  <div class="col s12 m6 l6">
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
							<input class="file-path validate" type="text" id="" placeholder="Upload one or more files">
						  </div>
						</div>
					  </form>
					  </div>
				  </div>
			  </div>
		  </div>
		<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="../js/my.js"></script>
	<script>
			 $(document).ready(function(){	 
				$("#upload_one").addClass("hidden");
		  });
		
		$( "#path" ).change(function() {
  			$("#upload_one").removeClass("hidden");
		});
		
		function save_info(id){
			alert("ok");
		 var ivnr = $("#inr").val();
		 var name = $("#name").val();
		 var marke = $("#marke").val();
		 var bes = $("#beschreibung").val();
		 var typ = $("#typ").val();
		 var afl = $("#afl").val();
		 var akl = $("#akl").val();
		 var spmed = $("#spmed").val();
		 var vsz = $("#vsz").val();
		 var iso = $("#iso").val();
		 var gewicht = $("#gewicht").val();
		 var dim = $("#dim").val();
			
		if(ivnr!="" && name!="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/cam_safe.php',
			  data:{
				  id: id,
				  ivnr: ivnr,
				  name: name,
				  marke: marke,
				  bes: bes,
				  typ:typ,
				  afl: afl,
				  akl: akl,
				  spmed: spmed,
				  vsz:vsz,
				  iso:iso,
				  gw:gewicht,
				  dim: dim
			  },
			  success:function(data) {
				  if(data == "ok"){
					   M.toast({html: 'Gespeichert!'})
					  }else{
						  alert(data);
					  }
			  },			
			  error:function() {
				  M.toast({html: 'Cam erstellen fehlgeschlagen!'})
			  }
			  });
		 } else {
		  alert("Please Fill All The Details");
		 } 

		}
	
	</script>
</body>
</html>