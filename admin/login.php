<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Unbenanntes Dokument</title>
	<?php include "admin_header.php" ?>
</head>
<body>
	
	<!--- Header -->
<header>
	<div class="container centered" style="margin-top: 20px;">
		<div class="row" style="width: 30%" >
			<img src="../images/logo/htl.png" class="responsive-img col l6">
			<img src="../images/logo/Unbenannt-2.png" class="responsive-img col l6 abs-top">
		</div>
	</div>
</header>
<main style="margin-top: 50px;">
	<div class="container">  
		<div class="row center">
			<div class="col s12"><h1 class="font-responsive">Admin Login</h1></div>
		</div>
	</div>
	<!--- Login -->
	<div class="container">
		<div class="row row-small">
			<div class="input-field col s12">
			  <i class="material-icons prefix">account_circle</i>
			  <input id="usrname" type="text" name="username">
			  <label for="usrname">Login Name</label>
			</div>
		</div>
		<div class="row row-small">
			<div class="input-field col s12">
			  <i class="material-icons prefix">dialpad</i>
			  <input id="password" type="password" name="pw">
			  <label for="password">Password</label>
			</div>
		</div>
			<div class="row center" id="pre-loader">
				<button class="btn waves-effect waves-light blue lighten-1" name="action" id="submit">Login<i class="material-icons right" style="margin-left: 15px">send</i>
				</button>
			</div>
	</div>
</main>
</body>	
	<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="../js/my.js"></script>
	<script>
					$( "#submit" ).click(function() {
							$("#pre-loader").load('php/preloader.php');
							window.setTimeout(do_login, 200);
					});
			


	</script>
</html>