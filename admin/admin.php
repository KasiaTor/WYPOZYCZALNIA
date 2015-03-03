<?php
require_once('funkcje.php');
session_start();
include ('../configg.php');

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die("Nie uda³o siê po³¹czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);

main();
?>
<p align="left"><b>FUNKCJE ADMINISTRACYJNE:</b></p>
<hr>
<p align="left">
<img src="../grafika/all.gif"><a href="admin.php">ZWROT FILMU</a><br>

<img src="../grafika/all.gif"><a href="dodanie_filmu_do_bazy.php">DODANIE FILMU DO BAZY</a><br><br>
</p>
<p align="center">
<p align="left"><b>ZWROT FILMU / P£ATNOŒÆ: (filmy wypo¿yczone, które wymagaj¹ potwierdzenia zwrotu przez wypo¿yczaj¹cego i akceptacji wp³aty)</b></p>

<hr>

<?php
// wybranie wypo¿yczanych filmów z bazy danych
mysql_query ("SET NAMES latin2");
$wybierz_wypozyczane = mysql_query("SELECT * FROM wypozyczenia where status_ogolny<>'zakonczone'")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>TYTYU£</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>u¿ytkownik</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>data wypo¿yczenia</center></b></td>
<td bgcolor='#68A898'><center><b><center>status_platnosci</center></b></td>
<td bgcolor='#68A898'><center><b><center>data zwrotu</center></b></td>
<td bgcolor='#68A898'><center><b><center>status</center></b></td>
<td bgcolor='#68A898'><center><b><center>zmieñ</center></b></td></tr>";
while ($wierszz=mysql_fetch_row($wybierz_wypozyczane))
{
echo"<tr class='yellow' width='15%'><td><center>";

$tytul_wypozyczanego = mysql_query("SELECT tytul FROM film where id='$wierszz[1]'");
	    // wyœwietlany wyniki zapytania 
    while($rek = mysql_fetch_array($tytul_wypozyczanego)) { 
        echo $rek['tytul'].""; 
}

echo"</td>";
echo"<td><center>$wierszz[2]</td>";	
echo"<td><center>$wierszz[3]</td>";
echo"<td><center>$wierszz[4]</td>";
echo"<td><center>$wierszz[5]</td>";
echo"<td><center>$wierszz[6]</td>";
echo"<td><center><a href='zmien_film.php?id_filmu=$wierszz[1]&id=$wierszz[0]'>ZMIEÑ P£ATNOŒÆ / STATUS</a></td>";  
	 }
	echo'</table>';
?>
</html>

