<?php
	session_start();
	if(isset($_POST["login"]))
	{
		$poprawnie = true;
		$imie = $_POST['imie'];
		$email = $_POST['email'];
		$emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
		$login = $_POST['login'];
		$nazwisko = $_POST['nazwisko'];
		$telefon = $_POST['telefon'];
		$haslo = $_POST['pass'];
		$haslo2 = $_POST['pass2'];
		//$upr ="uzytkownik";   uprawnienia konta
		
		if((filter_var($emailB,FILTER_SANITIZE_EMAIL)==false)||($emailB!=$email))
		{
			$poprawnie =false;
			$_SESSION['e_email']="Adres email jest niepoprawny";
		}
		
		if((strlen($login)<3)||(strlen($login)>12))
		{
			$poprawnie =false;
			$_SESSION['e_login']="Login musi posiadać od 3 do 12 znaków";
		}
		
		if(ctype_alnum($login)==false)
		{
			$poprawnie =false;
			$_SESSION['e_login']="Login nie może składać się z znaków specjalnych jak i polskich";
		}
		
		if((strlen($haslo)<6)||(strlen($haslo)>15))
		{
			$poprawnie =false;
			$_SESSION['e_haslo']="Haslo musi posiadać od 6 do 20 znaków";
		}
		if($haslo!=$haslo2){
			$poprawnie =false;
			$_SESSION['e_haslo']="Podane hasła nie są idetyczne";
		}
		
		$haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
		
		if(!isset($_POST['regulamin']))
		{
			$poprawnie =false;
			$_SESSION['e_regulamin']="Musisz zaakceptować regulamin";	
		}
		
		if((strlen($imie)<1)||(strlen($imie)>12))
		{
			$poprawnie =false;
			$_SESSION['e_imie']="Wprowadź swoje imie";
		}
		
				if(ctype_alpha($imie)==false)
		{
			$poprawnie =false;
			$_SESSION['e_imie']="Imie nie może zawierać cyfr";
		}
		
		if((strlen($nazwisko)<1)||(strlen($nazwisko)>12))
		{
			$poprawnie =false;
			$_SESSION['e_nazwisko']="Wprowadź swoje nazwisko";
		}
				
				if(ctype_alpha($nazwisko)==false)
		{
			$poprawnie =false;
			$_SESSION['e_nazwisko']="Nazwisko nie może zawierać cyfr";
		}
		
			if(ctype_digit($telefon)==false)
		{
			$poprawnie =false;
			$_SESSION['e_telefon']="Numer telefonu musi składać sie z samych cyfr";
		}
		
		
		$zmiena ="6LeSOhUTAAAAAMSjCJl7xrytWmimWB4VPOnctUur";
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$zmiena.'&response='.$_POST['g-recaptcha-response']);
		$odp = json_decode($sprawdz);
		
		if($odp->success==false){
				$poprawnie =false;
			$_SESSION['e_bot']="Potwierdź że nie jesteś botem";
		}
		
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if($polaczenie->connect_errno!=0)
			{
				echo "Error: ".$polaczenie->connect_errno;
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
					
				$rezultat = $polaczenie->query("SELECT id_uzytkownika FROM uzytkownicy where email='$email'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ilosc_email = $rezultat->num_rows;
				if($ilosc_email >0){
				$poprawnie =false;
				$_SESSION['e_email']="Ten email jest już wykorzystywany";
				}
				
				$rezultat = $polaczenie->query("SELECT id_uzytkownika FROM uzytkownicy where login='$login'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ilosc_loginow = $rezultat->num_rows;
				
				if($ilosc_loginow >0){
				$poprawnie =false;
				$_SESSION['e_login']="Istnieje już takie konto o takim loginie";
				}
				
					if($poprawnie == true)
					{
						
						if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL,'$login','$haslo_hash','$email','$imie','$nazwisko','$telefon')"))
						{
								mail($email,"Witaj","Dziekujemy za rejestracje na naszym portalu");
								mail("mwjack680@gmail.com","Nowy uzytkownik pojawil sie w bazie","*.*");
								header('Location: index.html');
						}
						else
						{
							throw new Exception($polaczenie->error);
						}
						
					}
		
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			echo "Błąd serwera!Strona chwilowa niedostepna";
			//echo $e;
		}
	
	}
	?>
<!DOCTYPE HTML >
<html lang="pl">
<head>
<title></title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="style.css" type="text/css">
<script src='https://www.google.com/recaptcha/api.js'></script>
<body style="background:url(images/tlo.jpg); color: white">
<style>
.error{
	color:red;
	margin-top: 10px;
	margin-bottom: 10px;
	
}
</style>
</head>
<body>
	
		<form  method="post" ><div>	

	<p><label for="login">Login:</label>
	<input name="login" type="text"  ></p>
	
	<?php
	if(isset($_SESSION['e_login'])){
		echo '<div class="error">'.$_SESSION['e_login'].'</div>';
		unset($_SESSION['e_login']);
	}
	?>
	
			<p><label for="email">Email:</label>
	<input name="email" type="text"  ></p>
		
		<?php
	if(isset($_SESSION['e_email'])){
		echo '<div class="error">'.$_SESSION['e_email'].'</div>';
		unset($_SESSION['e_email']);
	}
	?>
	
	<p><label for="pass">Hasło:</label>
	<input name="pass" type="password" ></p>
	
	<?php
	if(isset($_SESSION['e_haslo'])){
		echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
		unset($_SESSION['e_haslo']);
	}
	?>
	
		<p><label for="pass2">Powtórz hasło:</label>
	<input name="pass2" type="password"   ></p>
	
	
		<p><label for="imie">Imie:</label>
	<input name="imie" type="text" ></p>
	
	<?php
	if(isset($_SESSION['e_imie'])){
		echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
		unset($_SESSION['e_imie']);
	}
	?>
	
		<p><label for="nazwisko">Nazwisko:</label>
	<input name="nazwisko" type="text" ></p>
	
	<?php
	if(isset($_SESSION['e_nazwisko'])){
		echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
		unset($_SESSION['e_nazwisko']);
	}
	?>
	
		<p><label for="telefon">Telefon:</label>
	<input name="telefon" type="text" ></p>
	
		
	<?php
	if(isset($_SESSION['e_telefon'])){
		echo '<div class="error">'.$_SESSION['e_telefon'].'</div>';
		unset($_SESSION['e_telefon']);
	}
	?>
	
	
	
	<label><input type="checkbox" name="regulamin" /> Akceptuje regulamin 	</label>
		<?php
	if(isset($_SESSION['e_regulamin'])){
		echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
		unset($_SESSION['e_regulamin']);
	}
	?>
	<br>
<div class="g-recaptcha" data-sitekey="6LeSOhUTAAAAAIBXU-tTEQ8cWPqvHGXdFZTtOT3W"></div>
		<?php
	if(isset($_SESSION['e_bot'])){
		echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
		unset($_SESSION['e_bot']);
	}
	?>

<br>	
	
<input type="submit" value="Zarejestruj się">
</form>
		</div>
		</td></tr>
		</table>
		
	</td>
	
	

</body>
</html>