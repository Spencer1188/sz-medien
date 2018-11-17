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
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../css/materialize.css" type="text/css" rel="stylesheet">
	<script language="javascript" type="text/javascript" src="../js/materialize.js"></script>
	<script language="javascript" type="text/javascript" src="js/admin_tools.js"></script>
</head>
<body>
	
	<!-- Navbar -->
			  <nav>
				<div class="nav-wrapper blue lighten-2">
					<a class="brand-logo center"><img src="../images/logo/Unbenannt-2.png" alt="logo" width="30%"></img></a>
					<ul style="margin-left: 20px;">
				  		<li>Admin Page</li>	
				  	</ul>
				</div>
			  </nav>
	
	<div class="container">
		<div class="row col s12 center">
			<h4>Alle Kameras</h4>
		</div>
		<div class="row center">
		<table class="responsive-table striped highlight col s12">
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
	<script>
	
		function link_tools(id){
	window.location = "admin-info.php?id=" + id;

}
	
	</script>
	<?php }else{ echo "Youre not logged in.";} ?>
</body>
</html>