<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../responsiveslides.css">
		<link rel="stylesheet" href="demo.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="responsiveslides.min.js"></script>
		<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
			auto: false,
			pager: false,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			/*
			before: function () {
			  $('.events').append("<li>before event fired.</li>");
			},
			after: function () {
			  $('.events').append("<li>after event fired.</li>");
			}*/
		});

		});
		</script>
		<meta charset="utf-8"></meta>
	</head>
	<body>
	
	<div id=cont>

<?php
	$wyrazenie = "asdf";
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    // Załadowanie klasy Filmweb.
    require_once '../Filmweb.php';

    // Utworzenie nowej instancji.
    $filmweb = \nSolutions\Filmweb::instance();
	//$test_id = 1039;
	
	//laczenie z baza
	$servername = "localhost";
	$username = "root";
	$password = "123456";
	$db = "filmy_test";
	
	$conn = mysqli_connect($servername, $username, $password, $db);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	//query, im wiekszy limit tym automatycznie wieksza galeria
	$sql = "SELECT FilmwebID FROM filmytest ORDER BY ID DESC LIMIT 3";
	$result = mysqli_query($conn, $sql);

	//zrzut filmow do galerii
	if (mysqli_num_rows($result) > 0) {
		echo "<div id='wrapper'><div class='callbacks_container'><ul class='rslides' id='slider4'>";
		while($row = mysqli_fetch_assoc($result)) {
			$filminfo=$filmweb->getFilmInfoFull($row["FilmwebID"])->execute();
			echo "<li>";
			echo "<img src='" . $filminfo->imagePath . "'>";
			echo "<p class='caption'>" . $filminfo->title . "</p>";
			echo "</li>";
		}
		echo "</ul></div></div>";
	} else {
		echo "0 results";
	}
	mysqli_close($conn);
?>
	<body>
	<div id="legal">
	Filmweb API author Michell Hoduńcopyright (c) 2013 nSolutions.pl <br/>
	ResponsiveSlides.js is created by <a href="http://viljamis.com">@viljamis</a>
	</div>
	</div>
</html>