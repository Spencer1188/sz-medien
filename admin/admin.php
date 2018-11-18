<?php 
	session_start();
	if($_SESSION['vali'] == 1){
		include "../php/dbconfig.php"; 
		$select_cam = "SELECT * FROM cameras";
		$result_cam = $conn->query($select_cam);
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
<header>
	<ul id="dropdown1" class="dropdown-content">
	  <li><a href="user.php">Benutzer</a></li>
	  <li><a href="admin.php">Kameras</a></li>
	</ul>
  <nav>
    <div class="nav-wrapper blue lighten-2">
      <a href="#" class="brand-logo center hide-on-small-and-down"><img src="../images/logo/Unbenannt-2.png" alt="logo" class="responsive-img logo-img"></img></a>
      <ul id="nav-mobile" class="left">
        <li style="margin-left: 20px; margin-right: 10px;"><b>Admin Page</b></li>
		<li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Verwaltung<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </nav>
</header>
<main>
	<div class="container">
		<div class="row col s12 center">
			<h4>Alle Kameras</h4>
		</div>
		<div class="row center">
		<table class="striped highlight col s12">
        <thead>
          <tr>
              <th>Name</th>
              <th>Marke</th>
          </tr>
        </thead>
        <tbody>
			<?php 
				if ($result_cam->num_rows > 0) {
				// output data of each row
				while($row = $result_cam->fetch_assoc()) {
			?>
			<tr onClick="link_tools(<?php echo $row["id"] ?>)">
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["marke"]; ?></td>
			</tr>
			<?php } } ?>
        </tbody>
      </table>
	</div>
	</div>
	</main>
	<?php include "../footer.php" ?>
	<?php }else{ echo "Youre not logged in.";} ?>
	
</body>
	<script language="javascript" type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="../js/my.js"></script>
		<script>
	
		function link_tools(id){
			window.location = "admin-info.php?id=" + id;
		}
		
		$(document).ready(function() { 
			$(".dropdown-trigger").dropdown();
		});

	
	</script>
</html>