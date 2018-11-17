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

<div class="container centered" style="margin-top: 20px;">
	<div class="row" style="width: 30%" >
		<img src="../images/logo/htl.png" class="responsive-img col l6">
		<img src="../images/logo/Unbenannt-2.png" class="responsive-img col l6">
	</div>
</div>
	<!--- Header -->
<div class="container">  
	<div class="row center">
		<div class="col l12"><h1>Admin Login</h1></div>
	</div>
	
	
	<!--- Login -->
<div class="container">
    <form method="post" action="php/userlogin.php">
    <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="username" class="validate">
          <label for="icon_prefix">Login Name</label>
        </div>
	</div>
	<div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">dialpad</i>
          <input id="icon_dialpad" type="password" name="pw" class="validate">
          <label for="icon_dialpad">Password</label>
        </div>
    </div>
		<div class="row center">
			<button class="btn waves-effect waves-light blue lighten-1" type="submit" name="action">Login<i class="material-icons right" style="margin-left: 15px">send</i>
			</button>
		</div>
		<div class="row">
			<p class="col s12">
			
			
				<?php
					if(isset($_GET["log"]) == 1){
						echo "Error";
					}
				
				?>
			</p>
		</div>
    </form>
  </div>
</div>

</body>
</html>