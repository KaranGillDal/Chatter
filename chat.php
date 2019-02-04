
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
    $_SESSION['chats'] = $_GET['chats'];
	$_SESSION['following'] = '';
?>
<nav class="navbar navbar-inverse" id="navbar1">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="Homepage.php"> <img src="images/home.png" class="img-circle" alt="Cinque Terre" width="40" height="23"> Home</a></li>
      <li><a href="chat.php?chats=mychat" style="background-color: black;">MYCHATS</a></li>
    </ul>
    <form class="navbar-form navbar-right" action="search.php">
      <div class="form-group">
        <form method="post" action="">
			<input type="text" name="something" value="<?= isset($_POST['something']) ? htmlspecialchars($_POST['something']) : '' ?>" />
			<input type="submit" onclick="location.href='search.php'" name="submit" />
		</form>
	  <img src="images/Karan.jpg" class="img-circle" alt="Cinque Terre" width="40" height="27">
      <button type="submit" class="btn btn-default">Let's Chat</button>
	  <button type='submit' name='save'>Logout</button>
    </form>
  </div>
</nav>

<div class="container-fluid">
  <div class="row" id="first"> 
	  <div class="col-sm-4">
		<img src="images/karan.jpg" class="img-circle" alt="Cinque Terre" width="90" height="60">
	  </div>   
	  <div class="col-sm-8"> 
	   <h3><i>
	   <?php
			if($_SESSION['chats'] == mychat){
				echo "KARAN GILL";
			}
			else{
				echo $_SESSION['chats'];
			}
		?></i></h3>
	  </div>  
  </div>
  <div class="row"> 
	  <div class="col-sm-4" id="Third">
		<img src="images/Karan.jpg" class="img-circle" alt="Cinque Terre" width="90" height="60">
		<?php
			if($_SESSION['chats'] == mychat){
				echo "KARAN GILL";
			}
			else{
				echo $_SESSION['chats'];
			}
		?>
		</br>
		<?php
			if($_SESSION['chats'] == mychat){
				echo "DALHOUSIE UNIVERSITY, CANADA";
			}
			else{
				echo $_SESSION['chats'];
			}
		?>
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
				<input type="text" name="something1" size="110" value="<?= isset($_POST['something1']) ? htmlspecialchars($_POST['something1']) : '' ?>" />
				<input type="submit" onclick="location.href='search.php'" name="submit" value="SEARCH" />
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
		  <h3><?php
			if($_SESSION['chats'] == mychat){
				echo "MY CHATS";
			}
			else{
				echo $_SESSION['chats'];
			}
		  ?></h3>
		  <!--This is the php method to arrange the chats -->
		  <?php
				$check = array(0,0,0);
				$diffe = array(0,0,0);
				$i=1;
				$quotes= file("mychats/mychats.txt");
				$timeago=strtotime($quotes[0]);
				$currenttime=time();
				$diff=$currenttime - $timeago;
				$diffe[0]=$diff;
				$check[0]=0;
				for($i=3; $i<=5; $i=$i+2){
					$timeago=strtotime($quotes[$i-1]);
					$currenttime=time();
					$diff=$currenttime - $timeago;
					if($diff<$diffe[0] && $diffe[0]!=0){
						if($diff<$diffe[1] && $diffe[1]!=0){
							$diffe[2]=$quotes;
							$check[2]=$i;
						}
						else{
							$diffe[2]=$diffe[1];
							$diffe[1]=$quotes;
							$check[2]=$check[1];
							$check[1]=$i;
						}
					}
					else{
						$diffe[2]=$diffe[1];
						$diffe[1]=$diffe[0];
						$diffe[0]=$quotes;
						$check[2]=$check[1];
						$check[1]=$check[0];
						$check[0]=$i;
					}
				}

            ?>
		  <!--Check array contained the chats with an order with most recent on the top as per the result from check array I had hard corded the below code, we can use check also :) -->
		  <pre>
			<?php if($_SESSION['chats'] == mychat){
				DEFINE ('DB_USER', 'root');
				DEFINE ('DB_PSWD', 'root');
				DEFINE ('DB_HOST', 'localhost');
				DEFINE ('DB_NAME', 'chat');
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
				if(!$conn){
					die('error');
				}
				$myquerry ="SELECT a.UserID, a.Name, a.Profile, b.Post, b.PostID, b.Date FROM users a inner join posts b on a.UserID=b.UserID WHERE Post LIKE '%$tp%' ORDER BY PostID DESC";
				$res = mysqli_query ($conn,$myquerry);
				if($res = $conn ->query($myquerry)){
					while($row = $res->fetch_assoc()){
						printf ("<br> <a href='search.php'><span class='notification-count-in-title'>%s <br>%s</span></a><br><br><br>", $row["Date"], $row["Post"]);
					}
				}
				else
					echo "errorr";
				$conn->close();
			}?>
		  </pre>
	  </div>
	  </div>
</div>
<script>
function showChat(str) {
  var xhttp; 
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "chat.php?q="+str, true);
  xhttp.send();
}
</script>
</body>
</html>

