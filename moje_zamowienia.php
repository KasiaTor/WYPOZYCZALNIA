<?php
session_start();
include ('configg.php');
require_once('funkcje.php');	
$user=$_SESSION['user'];

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie uda³o siê po³¹czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);

 main();
 ?>

<p align="left"><b>Lista moich zamówieñ: </b></p>
<hr>
<p align="center">
<?php

 mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie uda³o siê po³&#177;czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);
 mysql_query ("SET NAMES latin2");

$zapytanie_4 = mysql_query("SELECT * FROM wypozyczenia where status_ogolny<>'zakonczone' and id_usera='$user'")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>TYTYU£</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>status p³atnoœci</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>wymagana data zwrotu</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>Link do filmu online</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>status ogólny</center></b></td></tr>";
while ($wierszz=mysql_fetch_row($zapytanie_4))
{
// tytu³ filmu z film
	$zapytanie_15 = mysql_query("SELECT * FROM film where id='$wierszz[1]'");
    // wyœwietlany wyniki zapytania 
    while($rek2 = mysql_fetch_array($zapytanie_15)) { 
        echo  "<tr><td>".$rek2['tytul']."</td />"; 
    } 
echo"<td><center>$wierszz[4]</td>";
echo"<td><center>$wierszz[5]</td>";

//link do filmu jak zap³acone z tabeli film

if($wierszz[6]=='wypozyczenie')
{
$zapytanie_16 = mysql_query("SELECT * FROM film where id='$wierszz[1]'");
	
    // wyœwietlany wyniki zapytania 
    while($rek3 = mysql_fetch_array($zapytanie_16)) { 
        echo  "<td>".$rek3['url']."</td />"; 
    } 
}
else
{
echo "<td>niedostêpne</td/>";
}
echo"<td><center>$wierszz[6]</td>";
	 }
	echo'</table>';
?>
<br><br>
<b><p align="left">HISTORIA: </b></p>
<p align="center">
<hr>

<?php
mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie uda³o siê po³&#177;czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);
 mysql_query ("SET NAMES latin2");

$zapytanie_4 = mysql_query("SELECT * FROM wypozyczenia where id_usera='$user' and status_ogolny='zakonczone'")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>TYTYU£</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>data zwrotu</td></center></b></b></td>
   ";

echo "</tr>";
while ($wierszz=mysql_fetch_row($zapytanie_4))
{
	$zapytanie_17 = mysql_query("SELECT tytul, id FROM film where id='$wierszz[1]'");
    // wyœwietlany wyniki zapytania 
    while($rek4 = mysql_fetch_array($zapytanie_17)) { 
        echo  "<tr><td>".$rek4['tytul']."</td />"; 
    } 

//echo"<tr width='15%'><td><center>$wierszz[1]</td>";
echo"<td><center>$wierszz[5]</td>";	
	  ?>	
<?php
	 }
	echo'</table>';
////////////////////////////////////////////////////////////////////////////////////
?>
</html>
<?php
stopka();
?>





