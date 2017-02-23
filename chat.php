<?php 
	include 'db.php';
	
	$query = "SELECT * FROM chat INNER JOIN users ON chat.user_id=users.id ORDER BY date";
	$run = $con->query($query);
	while($row = $run->fetch_array()) :
		?>
			<div id="chat_data">
				<span style="color:green;"><?php echo $row['username']; ?></span> :
				<span style="color:brown;"><?php echo $row['msg']; ?></span>
				<span style="float:right;"><?php echo formatDate($row['date']); ?></span>
			</div>
			<?php endwhile;?>