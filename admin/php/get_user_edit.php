	<?php
		include "../../php/dbconfig.php"; 
		!mysqli_set_charset($link, "utf8");
		$id = $_GET["id"];
		$select_usr = "SELECT * FROM user where id='$id'";
		$result_usr = $conn->query($select_usr);	
		$row = $result_usr->fetch_assoc()
?>

					<td><input type="text" value="<?php echo $row["name"]; ?>" id="usredit"></td>
					<td><input type="text" value="<?php echo $row["Gruppe"]; ?>" id="grpedit"></td>
					<td class="center">
						<i class="material-icons " id="icon<?php echo $row["id"]; ?>" onClick="do_edit(<?php echo $row["id"]; ?>)">done</i>
					</td>
