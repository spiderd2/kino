<?php
	session_start();
	?>


<!DOCTYPE HTML >
<html lang="pl">
<head>
<title>Kino</title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="style.css" type="text/css">
</head>


  <body style="background:url(images/tlo.jpg); color: white">
	
	<td valign="top">
		<table cellpadding="0" cellspacing="0" class="brd">
		<tr><td class="m2">Logowanie</td></tr>
		<tr><td width="390"><div class="newsy">

<form name="register" action="logowanie.php" method="post"  >

	<p>
	<label for="imie">Login:</label>
	<input name="login" type="text" pattern="[a-Za-ąćęłńóśźżĄĘŁŃÓŚŹŻ]{2,10}" placeholder="Wpisz swoj login" required></p>
<p>
	<label for="imie">Hasło:</label>
	<input name="haslo" type="password" pattern="[a-Za-ąćęłńóśźżĄĘŁŃÓŚŹŻ]{2,10}" placeholder="Wpisz swoje haslo" required></p>

	<p><input type="submit" value="Zaloguj się"></p>
</form>

<?php
if(isset($_SESSION['blad'])){
	echo $_SESSION['blad'];
}
?>


</div>
		</td></tr>
		</table>
		
	</td>
	


</body>
</html>
