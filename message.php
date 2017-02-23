<?php 
include 'db.php';
session_start();
?>
<!DOCTYPE html> 
<html>
	<head>
		<title>Chat System in PHP</title>
	<link rel="stylesheet" href="style.css" media="all"/>
	<script>
		function ajax(){
		
		var req = new XMLHttpRequest();
		
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById('chat').innerHTML = req.responseText;
		} 
		}
		req.open('GET','chat.php',true); 
		req.send();
		
		}
		setInterval(function(){ajax()},1000);
	</script>
	</head>
	
<body onload="ajax();">

<div id="container">
		<div id="chat_box">
		<div id="chat"></div>
		</div>
		<form method="post" action="message.php">
		<input type="text" name="username" value="<?php echo $_SESSION['username'];?>" readonly="readonly" />
		<textarea name="msg" placeholder="enter message"></textarea>
		<input type="submit" name="submit" value="Send it"/>
		</form>
		<?php 
		if(isset($_POST['submit'])){
            if(!empty($_POST['msg'])&&(!empty($_POST['username']))){
		
		      $id = $_SESSION['id'];
		      $msg = $_POST['msg'];
		
		      $query = "INSERT INTO chat (user_id,msg) values ('$id','$msg')";
		
		      $run = $con->query($query);
            }
            else{
                echo "Please, fill message";
                die();
            }
		}
		?>

</div>

</body>
</html>