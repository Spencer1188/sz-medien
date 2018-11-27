<?php 
	include "../php/dbconfig.php"; 
	$id = $_GET["id"];
	session_start();
	$_SESSION["infid"] = $id;
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
					  <input placeholder="" id="iso" type="text" class="validate" value="<?php echo $cam["iso"]; ?>" required>
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

	
		<div class="container" id="pics_cam">
			
		  </div>
		<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="../js/my.js"></script>
	<script>
		$(document).ready(function(){	 
			$("#pics_cam").load('php/get_cam_info.php');
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
		
function do_up_main() {
	ina = $("#path_main").val();
	
	if(ina != ""){
    var file_data = $('#in_main').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);                            
    $.ajax({
        url: 'php/up_one.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                        
        type: 'post',
        success: function(data){
			if(data == "ok"){
			   M.toast({html: "Erfolgreich hochgeladen!"})
				$("#pics_cam").load('php/get_cam_info.php');
			}else{
				M.toast({html: "Error beim hochladen!"})
			}
        }
     });
		}else{
			M.toast({html: "Kein Bild ausgewählt!"})
		}
}
		
function do_up_more() {
	ina = $("#path_more").val();
	
	if(ina != ""){
    var file_data = $('#in_more').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);                            
    $.ajax({
        url: 'php/up_more.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                        
        type: 'post',
        success: function(data){
			if(data == "ok"){
			   M.toast({html: "Erfolgreich hochgeladen!"})
				$("#pics_cam").load('php/get_cam_info.php');
			}else{
				M.toast({html: "Error beim hochladen!"})
			}
        }
     });
		}else{
			M.toast({html: "Kein Bild ausgewählt!"})
		}
}
		
		function delete_main(id){
			 $.ajax
			  ({
			  type:'post',
			  url:'php/main_delete.php',
			  data:{
			   id:id
			  },
			  success:function(data) {
				  M.toast({html: 'Main-Bild gelöscht!'})
				  $("#pics_cam").load('php/get_cam_info.php');
			  },			
			  error:function() {
				  M.toast({html: 'Main-Bild löschen fehlgeschlagen!'})
			  }
			  });
		}
		
		function delete_more(id){
			 $.ajax
			  ({
			  type:'post',
			  url:'php/more_delete.php',
			  data:{
			   id:id
			  },
			  success:function(data) {
				  M.toast({html: 'Bild gelöscht!'})
				  $("#pics_cam").load('php/get_cam_info.php');
			  },			
			  error:function() {
				  M.toast({html: 'Bild löschen fehlgeschlagen!'})
			  }
			  });
		}
	
	</script>
</body>
</html>