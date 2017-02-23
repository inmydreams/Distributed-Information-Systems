<?php
    include 'db.php';
    if(isset($_POST['submit'])){
        if(!empty($_POST['username'])){
            
            $username = $_POST['username'];

            $query = "SELECT * FROM users WHERE username='$username'";

            $run = $con->query($query);
            $row = $run->fetch_all();
                if(empty($row)){
                    $query = "INSERT INTO users (username) VALUES('$username')";
                    $run = $con->query($query);
                    echo "You can login now";
                }
                else{
                    session_start();
                    $_SESSION['username']=$username;
                    $id=$row[0][0];
                    $_SESSION[id]=$id;
                    header("Location: message.php");
                }
            }
        else{
            echo "Please, fill username";
        }
    }
?>
<!DOCTYPE html> 
<html>
	<head>
		<title>Login</title>
        <link rel="stylesheet" href="style.css" media="all"/>
	</head>
	
<div id="container">
    <div id="login">
		<form method="post" action="index.php">
		<input type="text" name="username" placeholder="enter username"/> 
		<input type="submit" name="submit" value="Login"/>
		</form>
    </div>
</div>
</body>
</html>