<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CHATS</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="CSS.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		session_start(); // this NEEDS TO BE AT THE TOP of the page before any output etc
		$_SESSION['chatter'] = $_GET['chatter'];
	?>
	<div id="chatter">
		 <img src="images/chatterIcon.png" class="img-circle" alt="Cinque Terre" width="90" height="60">
		 <?php 
			$tp=null;
			$tp=$_SESSION['chatter'];
			if($tp==''){
				printf("<a href='chatter.php?chatter=signup' class='list-group-item list-group-item-action'>
							SIGN UP
						</a>
						<a href='chatter.php?chatter=login' class='list-group-item list-group-item-action'>
							LOG IN
						</a> ");
			}
		 ?>
		 <br>
		 <?php 
			$tp=null;
			$tp=$_SESSION['chatter'];
			if($tp==login){
				echo LOGIN;
				printf("<form action='index.php' method='post'> 
				<label id='first'> USERNAME:</label><br/>
				<input type='text' name='username'><br/>
				<label id='first'>PASSWORD</label><br/>
				<input type='password' name='password'><br/>
				<button type='submit' name='save'>LOGIN</button></form> ");
				if(isset($_POST['save'])){
					$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
					if(!$conn){
						die('error');
					}
					$paswrd=$_POST['password'];
				        $hashed_pass=password_hash($paswrd, PASSWORD_DEFAULT);
					var_dump($hashed_pass);
					if(password_verify($paswrd, $hashed_pass){
						echo THIS PASSWORD IS WEAK;
   						echo Password need to be at least 7 characters long with at last one number and one Capital letter. It also need to have a special character:
					}
					$result = mysqli_query($conn,$sql);
					$conn->close();
				}
			}
			if($tp==signup){
				echo SIGNUP;
				printf("<form action='chatter.php' method='post'> 
				<label id='first'> USERNAME:</label><br/>
				<input type='text' name='username'><br/>
				<label id='first'>PASSWORD</label><br/>
				<input type='password' name='password'><br/>
				<button type='submit' name='save'>save</button></form> ");
				if(isset($_POST['save'])){
					DEFINE ('DB_USER', 'root');
					DEFINE ('DB_PSWD', 'root');
					DEFINE ('DB_HOST', 'localhost');
					DEFINE ('DB_NAME', 'chat');
					$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
					if(!$conn){
						die('error');
					}
					$sql = "INSERT INTO login (username, password)
					VALUES ('".$_POST["username"]."','".$_POST["password"]."')";
					$result = mysqli_query($conn,$sql);
					$conn->close();
				}
			}
		 ?>
	</div>
</body>
</html>