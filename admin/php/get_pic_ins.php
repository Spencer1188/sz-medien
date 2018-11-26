<?php 
	session_start();
	include "../../php/dbconfig.php"; 	
	$id = $_SESSION["last_id"];
	$sql_bilder = "SELECT distinct * FROM `bilder` WHERE id = $id";
	$result_pic = $conn->query($sql_bilder);
	$result = $link->query("SELECT * FROM cameras where id=$id");
	$cam = $result->fetch_assoc();
?>		
			<div class="row">
				
			  <div class="row col s12 l6">
					  <h5 class="center">Main-Bild</h5>
				  <div class="col s12 center">
					  <div class="row" style="height: 212px;">
					  <?php if($cam["bildlink"] != ""){ ?>
							<div class="col s12">
								  <img src="../<?php echo $cam["bildlink"] ?>" width="40%">
							</div>
					  <?php }else{ ?>
						<div class="col s6 m4 l3 center">
						 <div class="center">
						 </div>
						</div>
				<?php } ?>
						
					</div>
				  </div>
					  <!-- upload Main-Bil -->
					  	  <div class="col s12 center">
						   <form action="php/up_one.php?id=<?php echo $cam["id"] ?>" method="post" enctype="multipart/form-data">
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								  <input type="file" name="datei" id="in_main" style="width: 30%"></input>
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path"></input>
							  </div>
								
						   </form>
							  <div class="col s2" style="margin-top: 10px;" id="upload_one" onClick="do_up_main()">
								<i class="material-icons">file_upload</i>
							  </div>
							</div>
						</div>
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

				} else {?>

						<div class="col s6 m4 l3">
						 <div class="center">
						 </div>
						</div>
				<?php } ?>
					  </div>
					  <div class="row">
					   <form action="#">
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								<input type="file" name="datei" id="in_one" multiple>
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path">
							  </div>
							  <div class="col s2" style="margin-top: 10px;" id="upload_one" >
								<i class="material-icons">file_upload</i>
							  </div>
							</div>
					  </form>
					  </div>
				  </div>
			  </div>
<br><br><hr><br><br>
			<div class="row">
				
					   <form action="#" class="col s12 m6 l6">
						   <div>
							   <h5>PDF</h5>
						   </div>
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								<input type="file" name="datei" id="in_one" multiple>
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path">
							  </div>
							  <div class="col s2" style="margin-top: 10px;" id="upload_one">
								<i class="material-icons">file_upload</i>
							  </div>
							</div>
					  </form>
					  <form action="#" class="col s12 m6 l6">
						   <div>
							   <h5>Video</h5>
						   </div>
							<div class="file-field input-field col s12 row">
							  <div class="btn col s2">
								<span>File</span>
								<input type="file" name="datei" id="in_one" multiple>
							  </div>
							  <div class="file-path-wrapper col s8">
								<input class="file-path validate" type="text" id="path">
							  </div>
							  <div class="col s2" style="margin-top: 10px;" id="upload_one">
								<i class="material-icons">file_upload</i>
							  </div>
							</div>
					  </form>
				
			</div>
