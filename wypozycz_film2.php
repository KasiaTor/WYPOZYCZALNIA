<?php
require_once('funkcje.php');
session_start();
include ('configg.php');
	
mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie udało się połączyć");
mysql_select_db($_CONFIG['MySQL']['base']);

 main();
 
$id_filmu=$_GET['id_filmu'];
 ?>
 
<p align="left"><b>Wypożycz film potwierdzenie: </b></p>
<hr>
<p align="center">
<?php
$id_usera=$_SESSION['user'];
$data=date("Y-m-d");
$godzina=date("H:i:s");

$sql = "INSERT INTO `wypozyczenia`(`id_filmu`, `id_usera`, `data_wyp`, `status_platnosci`, `data_zwrotu`, `status_ogolny`) 	VALUES  ('$id_filmu','$id_usera','$data','oczekiwanie na platnosc','$data','platnosc');";
if (mysql_query($sql))

 	echo"";
 else
{ echo

 " "; }
mysql_query ("UPDATE `film` SET `rezerwacja`='1'  WHERE id='$id_filmu'"); 


 	echo"
	Film został wypożyczony - oczekujemy płatności, status zamówienia możesz kontrolować wchodząc na swoje konto w zakładkę zamówienia.
Dziękujemy.";
?>
  
	 
</html>
<?php
stopka();
?>





