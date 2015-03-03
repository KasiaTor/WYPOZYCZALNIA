<?php
session_start();
include ('configg.php');
require_once('funkcje.php');	
  
$user=$_SESSION['user'];
$id_filmu=$_GET['id_filmu'];

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die("Nie uda³o siê po³¹czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);
main();
?>
 
 
<p align="left"><b>Dodajesz recenzjê do filmu: </b></p>
<hr>
<p align="center">
<?php


 mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie uda³o siê po³&#177;czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);
 mysql_query ("SET NAMES latin2");

$zapytanie_4 = mysql_query("SELECT * FROM film where id='$id_filmu'")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>TYTYU£</td></center></b></b></td>

</tr>";
while ($wierszz=mysql_fetch_row($zapytanie_4))
{
echo"<td><center>$wierszz[1]</td>";

	 }
	echo'</table><br><br>';
	
	
	$recenzja=$_POST['recenzja'];
	
	$sql = "INSERT INTO `recenzja`(`id_filmu`, `recenzja`, `dodana_przez_usera`) 	VALUES  ('$id_filmu','$recenzja','$user');";
if (mysql_query($sql))

 	echo"dziêkujemy za dodanie recenzji";
 else
{ echo

 " nie dodano"; }


	
	
print "<br><a href='index.php'>Powrót</a>";
?>
</html>
<?php
stopka();
?>





