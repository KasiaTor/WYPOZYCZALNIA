<?php
require_once('funkcje.php');
session_start();
include ('../configg.php');

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die("Nie udało się połączyć");
mysql_select_db($_CONFIG['MySQL']['base']);
mysql_query ("SET NAMES latin2");
main();


$id_filmu=$_GET['id_filmu'];
$platnosc=$_POST['platnosc'];
$status=$_POST['status'];
$id=$_GET['id'];

echo"$status    ,    $platnosc";
?>
<head>
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2">
</head>

<hr>
<p align="left">
<img src="../grafika/all.gif"><a href="admin.php">ZWROT FILMU</a><br>
<img src="../grafika/all.gif"><a href="dodanie_filmu_do_bazy.php">DODANIE FILMU DO BAZY</a><br>
<br><br><br>
</p>

<p align="center">
<p align="left"><b>ZWROT FILMU / PŁATNOŚĆ: (filmy wypożyczone, które wymagają potwierdzenia zwrotu przez wypożyczającego i akceptacji wpłaty)</b></p>
<hr>

<?php
//// aktualizacja wypożyczonego filmu w bazie danych

mysql_query ("SET NAMES latin2");

	
	$idc=mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die('Nie udało się połączyć z serwerem');

mysql_select_db($_CONFIG['MySQL']['base']);
	echo"<br><br><font color='green' size='5'>Twoje  dane zostały wpisane!</font>";
	echo'<br><br><br><br>';
mysql_query ("UPDATE `wypozyczenia` SET  `status_platnosci`='$platnosc', `status_ogolny`='$status'   WHERE id_filmu='$id_filmu' and id='$id'"); 
print "<br>";
      print "<br><a href='admin.php'>Powrót do strony głównej</a>";
	
	// aktualizacja rezerwacji filmu
	if ($status=='zakonczone')
	{
  mysql_query ("UPDATE `film` SET `rezerwacja`='0'   WHERE id='$id_filmu'"); 	
  mysql_query("UPDATE film SET wypozyczen_ilosc= wypozyczen_ilosc +1 WHERE id = '".$id_filmu."'");
	mysql_query ("SET NAMES latin2");
	}
	else
	{
	}

?>
</html>





