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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet">
</head>
<body>
	
	<!-- Navbar -->
	<header>			  <nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo center"><img src="images/logo/Unbenannt-2.png" alt="logo" class="responsive-img logo-img"></img></a>

				</div>
			  </nav>
	</header>
	<main>
	<!-- Main Bereich - Cards Auflistung -->
	<div class="container">
		<div class="section">
			<div class="row blue-grey lighten-5">
				<div class="col l3 label-icon" style="padding: 20px;">
					<i class="material-icons small icon-ac" onClick="change(1)" id = "1">border_all</i>
					<i class="material-icons small" onClick="change(2)" id = "2">dehaze</i>
					<i class="material-icons small" onClick="change(3)" id = "3">format_list_bulleted</i>
				</div>
			</div>
			
			<div class="row display-kach" id="display-kach">
				
			</div>
		</div>
	</div>
	</main>
	
	<?php include "footer.php" ?>

</body>

	<script language="javascript" type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="js/my.js"></script>
	<script>
		  document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('select');
			var instances = M.FormSelect.init(elems);
		  });
		
		$(document).ready(function() { 
			$("#display-kach").load('php/kacheln.php');
		});
		
		
		function change(id){

			if(id == 1){
				$("#display-kach").load('php/kacheln.php');
				$( "#1" ).addClass( "icon-ac" );
				$( "#2" ).removeClass( "icon-ac" );
				$( "#3" ).removeClass( "icon-ac" );
			   }
			if(id == 2){
				$("#display-kach").load('php/table.php');
				$( "#2" ).addClass( "icon-ac" );
				$( "#1" ).removeClass( "icon-ac" );
				$( "#3" ).removeClass( "icon-ac" );
			}
			if(id == 3){
				$("#display-kach").load('php/detail.php');
				$( "#3" ).addClass( "icon-ac" );
				$( "#2" ).removeClass( "icon-ac" );
				$( "#1" ).removeClass( "icon-ac" );
			   }
		}
	</script>
</html>