<?php
session_start();
include ('configg.php');
require_once('funkcje.php');	
  
$user=$_SESSION['user'];
$id_filmu=$_GET['id_filmu'];

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die("Nie udało się połączyć");
mysql_select_db($_CONFIG['MySQL']['base']);

?>
<head>
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2">
</head>

<?php
main();
?>
 
 
<p align="left"><b>Dodajesz recenzję do filmu: </b></p>
<hr>
<p align="center">
<?php


 mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie udało się poł&#177;czyć");
mysql_select_db($_CONFIG['MySQL']['base']);
 mysql_query ("SET NAMES latin2");

$zapytanie_4 = mysql_query("SELECT * FROM film where id='$id_filmu'")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>TYTUŁ</td></center></b></b></td>

</tr>";
while ($wierszz=mysql_fetch_row($zapytanie_4))
{
echo"<td><center>$wierszz[1]</td>";

	 }
	echo'</table><br><br>';
	echo"<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber1'>
<form method='post' action='dodaj_recenzje2.php?id_filmu=$id_filmu'>
  <tr>	
  <td><center><textarea name='recenzja' rows='10' cols='100'></textarea></tr><tr><td colspan=2><br></td>

  </tr>
  <tr>
    <td width='100%'><center><input type='submit' name='recenzja' value='DODAJ RECENZJĘ' ></td>
  </tr>
</table></form>";
print "<br><a href='index.php'>Powrót</a>";
?>
</html>
<?php
stopka();
?>





