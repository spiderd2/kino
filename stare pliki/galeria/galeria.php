<?php
	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$db = "filmy_test";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	else{
		echo "Connected successfully<br>";
	}
	
	$sql = "SELECT FilmwebID FROM filmytest ORDER BY ID DESC LIMIT 3";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo $row["FilmwebID"]."<br>";
		}
	} else {
		echo "0 results";
	}

	mysqli_close($conn);
?>