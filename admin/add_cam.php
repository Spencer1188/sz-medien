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

	<div class="container center" style="margin-top: 50px;" id="pre-loader">

	
	</div>
	
	
	<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="../js/my.js"></script>
	<script language="javascript" type="text/javascript" src="js/upload.js"></script>

	<script>
		
		$(document).ready(function(){	 
			$("#upload_one").addClass("hidden");
			$("#pre-loader").load('php/get_cam_ins.php');
		  });
		
		$( "#path" ).change(function() {
  			$("#upload_one").removeClass("hidden");
		});

		
		function insert(){
			do_insert_cam();
			$("#pre-loader").load('php/preloader.php');
		}
	

function do_up_main() {
	ina = $("#path_main").val();
	
	if(ina != ""){
    var file_data = $('#in_main').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);                            
    $.ajax({
        url: 'php/do_up_main.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                        
        type: 'post',
        success: function(data){
			if(data == "ok"){
			   M.toast({html: "Erfolgreich hochgeladen!"})
				$("#pre-loader").load('php/get_pic_ins.php');
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
        url: 'php/do_up_more.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                        
        type: 'post',
        success: function(data){
			if(data == "ok"){
			   M.toast({html: "Erfolgreich hochgeladen!"})
				$("#pre-loader").load('php/get_pic_ins.php');
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
				  $("#pre-loader").load('php/get_pic_ins.php');
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
				  $("#pre-loader").load('php/get_pic_ins.php');
			  },			
			  error:function() {
				  M.toast({html: 'Bild löschen fehlgeschlagen!'})
			  }
			  });
		}
</script>
</body>
</html>