
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOMEPAGE</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="CSS.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
 
<nav class="navbar navbar-inverse" id="navbar1">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="Homepage.php"> <img src="images/home.png" class="img-circle" alt="Cinque Terre" width="40" height="23"> Home</a></li>
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
  <form action="welcome.php" method="post">
		FIRST NAME: <input type="text" name="firstname"><br>
		LAST NAME: <input type="text" name="lastname"><br>
		TELL US ABOUT YOU: <input type="text" name="detail"><br>
		<input type="submit">
	</form>
</div>

</body>
</html>

