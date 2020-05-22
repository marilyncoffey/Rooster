<?php
session_start();
?>
<html>
<head>
<title>Rooster | Cockadoodledoo</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- Style Sheet -->
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>

<body>
	<body>
		<div class="container">
		  <nav class="navbar navbar-default">
		    <div class="container-fluid">
		      <div class="navbar-header">
		      <ul class="nav navbar-nav">
		        <li><a href="home.html">HOME</a></li>
		        <li><a href="register.html">REGISTER</a></li>
		        <li class="active"><a href="login.html">LOGOUT</a></li>
		      </ul>
		    </div>
		  </nav>
		  <div class="jumbotron">
		    <img src="roosterLogo.png" class="img-responsive" alt="Rooster">
		    <img src="roosterText.png" class="img-responsive" alt="Rooster">
		    <p>A Social Community for Farmers</p>
		  </div>

		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<form action="post.php" method="post">
					<div class="form-group">
					  <label for="comment">Come to Roost, <?php echo $_SESSION["email"] ?>?:</label>
						<textarea class="form-control" rows="3" id="posttext" name="posttext"></textarea>
					</div>
					<input type="submit" type="button" class="btn btn-primary" />
				</form>
			</div>

	</div>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$posttext = $_POST["posttext"];
$postusername = $_SESSION["email"];
$posttime = date('Y-m-d H:i:s');


$sql = "INSERT INTO posts (PostText, PostUserName, PostTime)
VALUES ('". $posttext ."', '". $postusername ."', '" . $posttime . "')";

if ($conn->query($sql) === TRUE) {

			//Code goes here
		$sql2 = "SELECT * FROM posts ORDER BY PostTime DESC";
		$result2 = $conn->query($sql2);
		if ($result2->num_rows > 0) {
		// output data of each row
		while($row2 = $result2->fetch_assoc()) {
			echo "<div class='row'>";
				echo "<div class='col-sm-2'></div>";
				echo "<div class='col-sm-8'>";
				echo "<div class='row'>";
					echo "<div class='col-sm-8'>";
					echo "<b>" . $row2["PostUserName"] . "</b>";
					echo "</div>";
					echo "<div class='col-sm-4'>";
					echo $row2["PostTime"];
					echo "</div>";
					echo "<div class='col-sm-12'>";
					echo $row2["PostText"];
					echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "<div class='col-sm-2'></div>";
			echo "</div>";


		}
} else {
    			echo "<div class='row'>";
				echo "<div class='col-sm-3'></div>";
				echo "<div class='col-sm-6'>";
				echo "<h1>No Posts Found</h1>";

				echo "</div>";
				echo "<div class='col-sm-3'></div>";
			echo "</div>";
}

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
</body>
</html>
