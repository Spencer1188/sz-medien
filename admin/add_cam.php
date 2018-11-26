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
			$("#pre-loader").load('php/get_pic_ins.php');
		  });
		
		$( "#path" ).change(function() {
  			$("#upload_one").removeClass("hidden");
		});
		
		function save_info(){
			
		}
		
		function insert(){
			do_insert_cam();
			$("#pre-loader").load('php/preloader.php');
		}
	

function do_up_main() {
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
        success: function(php_script_response){
            M.toast({html: "Erfolgreich hochgeladen!"})
			$("#pre-loader").load('php/get_pic_ins.php');// display response from the PHP script, if any
        }
     });
}

</script>
</body>
</html>