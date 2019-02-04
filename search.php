
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SEARCH PAGE</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="CSS.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
	session_start();
	$_SESSION['chats'] = '';
    $_SESSION['following'] = '';
  ?>
<nav class="navbar navbar-inverse" id="navbar1">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="Homepage.php"> <img src="images/home.png" class="img-circle" alt="Cinque Terre" width="40" height="23">Home</a></li>
      <li style="background-color: black;" ><a href="chat.php?chats=mychat">MYCHATS</a></li>
    </ul>
    <form class="navbar-form navbar-right" action="search.php">
      <div class="form-group">
        <form method="post" action="">
			<input type="text" name="something" value="<?= isset($_POST['something']) ? htmlspecialchars($_POST['something']) : '' ?>" />
			<input type="submit" onclick="location.href='search.php'" name="submit" />
		</form>
	  <img src="images/Karan.jpg" class="img-circle" alt="Cinque Terre" width="40" height="27">
      <button type="submit" class="btn btn-default">Let's Chat</button>
	  <button type='submit' name='save'>save</button>
    </form>
  </div>
</nav>

<div class="container-fluid">
 
  <div class="row" id="first"> 
	  <div class="col-sm-4">
		<img src="images/chatterIcon.png" class="img-circle" alt="Cinque Terre" width="90" height="60">
	  </div>   
	  <div class="col-sm-8"> 
	   <h3>&nbsp; &nbsp;<i>CHATTER</i></h3>
	   <h5>&nbsp; &nbsp; &nbsp; &nbsp;<i>....CHIT CHAT CHIT AND BE LOUD....</i></h5>
	  </div>  
  </div>
  <div class="row"> 
	  <div class="col-sm-4" id="Third">
		<img src="images/Karan.jpg" class="img-circle" alt="Cinque Terre" width="90" height="60">
		Karan Gill
		<div class="list-group">
			<a href="chat.php?chats=mychat" class="list-group-item list-group-item-action">CHATS <?php
				DEFINE ('DB_USER', 'root');
				DEFINE ('DB_PSWD', 'root');
				DEFINE ('DB_HOST', 'localhost');
				DEFINE ('DB_NAME', 'chat');
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
				if(!$conn){
					die('error');
				}
				$myquerry ="SELECT count(PostID) FROM posts";
				$res = mysqli_query ($conn,$myquerry);
				if($res = $conn ->query($myquerry)){
					while($row = $res->fetch_assoc()){
						printf ("(%s)", $row["count(PostID)"]);
					}
				}
				else
					echo "errorr";
				$conn->close();
			?></a>
			<a href="follow.php?following=FOLLOWING" class="list-group-item list-group-item-action">FOLLOWING <?php
				DEFINE ('DB_USER', 'root');
				DEFINE ('DB_PSWD', 'root');
				DEFINE ('DB_HOST', 'localhost');
				DEFINE ('DB_NAME', 'chat');
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
				if(!$conn){
					die('error');
				}
				$myquerry ="SELECT count(User) FROM following WHERE User=1";
				$res = mysqli_query ($conn,$myquerry);
				if($res = $conn ->query($myquerry)){
					while($row = $res->fetch_assoc()){
						printf ("(%s)", $row["count(User)"]);
					}
				}
				else
					echo "errorr";
				$conn->close();
			?></a>
			<a href="follow.php?following=FOLLOWERS" class="list-group-item list-group-item-action">FOLLOWERS <?php
				DEFINE ('DB_USER', 'root');
				DEFINE ('DB_PSWD', 'root');
				DEFINE ('DB_HOST', 'localhost');
				DEFINE ('DB_NAME', 'chat');
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
				if(!$conn){
					die('error');
				}
				$myquerry ="SELECT count(FollowingUser) FROM following WHERE FollowingUser=1";
				$res = mysqli_query ($conn,$myquerry);
				if($res = $conn ->query($myquerry)){
					while($row = $res->fetch_assoc()){
						printf ("(%s)", $row["count(FollowingUser)"]);
					}
				}
				else
					echo "errorr";
				$conn->close();
			?></a>
		</div>
	  </div>
	  <div class="col-sm-8" id="Second"> 
		  <div id="Forth">
			<img src="images/Karan.jpg" class="img-circle" alt="Cinque Terre" width="50" height="40">       
		  <form class="navbar-form navbar-right" action="search.php">
			<div class="form-group">
			<form method="post" action="">
				<input type="text" name="something1" value="<?= isset($_POST['something1']) ? htmlspecialchars($_POST['something1']) : '' ?>" />
				<input type="submit" onclick="location.href='search.php'" name="submit" />
			</form>
		  </form>
		  </div>
		  <?php
			DEFINE ('DB_USER', 'root');
			DEFINE ('DB_PSWD', 'root');
			DEFINE ('DB_HOST', 'localhost');
			DEFINE ('DB_NAME', 'chat');
			$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
			if(!$conn){
				die('error');
			}
			$tp=$_GET['something1'];
			$myquerry ="INSERT INTO posts(UserID, Post) VALUES('1', $tp)";
			if($conn ->query($myquerry) == TRUE){
			}
			else
			$conn->close();
			
		  ?>
		  <table class="table table-hover">
			<p>NEW CHATS</p>
			<tbody>
			  <tr>
				<?php
				DEFINE ('DB_USER', 'root');
				DEFINE ('DB_PSWD', 'root');
				DEFINE ('DB_HOST', 'localhost');
				DEFINE ('DB_NAME', 'chat');
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
				if(!$conn){
					die('error');
				}
				$tp=null;
				$tp=$_GET['something'];
				if($tp){
					$myquerry ="SELECT a.UserID, a.Name, a.Profile, b.Post, b.PostID FROM users a inner join posts b on a.UserID=b.UserID WHERE Post LIKE '%$tp%' ORDER BY PostID DESC";
					$res = mysqli_query ($conn,$myquerry);
					if($res = $conn ->query($myquerry)){
						while($row = $res->fetch_assoc()){
							printf ("<img src='images/akanchha.jpg' class='img-rounded' alt='Cinque Terre' width='50' height='40'> <a href='search.php'><span class='notification-count-in-title'>%s %s <br>%s</span></a><br><br><br>", $row["Name"], $row["Profile"], $row["Post"]);
						}
					}
					else
						echo "errorr";
					$conn->close();
				}
				else{
					$myquerry1 ="SELECT a.UserID, a.Name, a.profile, b.Post, b.PostID FROM users a inner join posts b on a.UserID=b.UserID ORDER BY PostID DESC";
					$res = mysqli_query ($conn,$myquerry1);
					if($res = $conn ->query($myquerry1)){
						while($row = $res->fetch_assoc()){
							printf ("<img src='images/akanchha.jpg' class='img-rounded' alt='Cinque Terre' width='50' height='40'> <a href='search.php'><span class='notification-count-in-title'>%s %s <br>%s</span></a><br><br><br>", $row["Name"], $row["Profile"], $row["Post"]);
						}
					}
					else
						echo "errorr";
				}
				?>
			  <img src="images/dal.jpg" class="img-rounded" alt="Cinque Terre" width="750" height="400">
		  </table>
	  </div>
	  </div>
</div>

</body>
</html>

