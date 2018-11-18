		<?php
		include "dbconfig.php"; 
		$select_cam = "SELECT * FROM cameras";
		$result_cam = $conn->query($select_cam);
?>

<table class="responsive-table striped highlight col s12" style="border: 1px solid #000000">
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