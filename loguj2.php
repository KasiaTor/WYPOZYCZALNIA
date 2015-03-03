<?php
session_start();
require_once('configg.php'); 
require_once('funkcje.php');

$user= $_POST['user'];
$haslo = $_POST['haslo'];
$haslo_md5=md5($haslo);
?>


  <head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" >
<title>LOGOWANIE</title>
</head>

<?php


mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass']) 
	or die("Nie udało się połączyć");
mysql_select_db($_CONFIG['MySQL']['base']);


$zapytanie = mysql_query("SELECT haslo, login FROM users where login='$user'")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 

while ($wiersz=mysql_fetch_row($zapytanie))
{
  
  $pass=$wiersz[0];
  	 } 
	if ($pass==$haslo_md5){
	


 // kody zgodne
$_SESSION['aktywnosc']='1';
$_SESSION['user']=$user;


	 
echo " <font color='green' size='4'>LOGOWANIE ZAKOŃCZONO POMYŚLNIE</font><br> następuje przekierowanie";
echo "<META HTTP-EQUIV='Refresh' Content='5;URL=index.php'>";




}
else
{
		echo"
Użytkownik niezalogowany<br> <font color='red' size='4'><b>PODANY LOGIN LUB HASŁO NIE SĄ PRAWIDŁOWE<br></b></font><a href='index.php'>Zaloguj ponownie</a><br><br><br><br><br><br><br><br><br>";
} 
?>
<?php





