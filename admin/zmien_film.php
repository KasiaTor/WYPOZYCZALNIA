<?php
require_once('funkcje.php');
session_start();
include ('../configg.php');

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die("Nie uda�o si� po��czy�");
mysql_select_db($_CONFIG['MySQL']['base']);

main();

$id=$_GET['id'];
$id_filmu=$_GET['id_filmu'];
?>
<head>
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2">
</head>
<p align="left"><b>FUNKCJE ADMINISTRACYJNE:</b></p>
<hr>
<p align="left">
<img src="../grafika/all.gif"><a href="admin.php">ZWROT FILMU</a><br>
<img src="../grafika/all.gif"><a href="dodanie_filmu_do_bazy.php">DODANIE FILMU DO BAZY</a><br><br>

<br><br><br>
</p>

<p align="center">
<p align="left"><b>ZWROT FILMU / P�ATNO��: (filmy wypo�yczone, kt�re wymagaj� potwierdzenia zwrotu przez wypo�yczaj�cego i akceptacji wp�aty)</b></p>
<hr>

<?php
		/////////////////////////////////  DOST�PNE FILMY ///////////////////////////////////////////////

mysql_query ("SET NAMES latin2");

$wypozyczenie_filmu = mysql_query("SELECT * FROM wypozyczenia where id_filmu='$id_filmu' and id='$id'")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>TYTYU�</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>u�ytkownik</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>data wypo�yczenia</center></b></td>
<td bgcolor='#68A898'><center><b><center>status_platnosci</center></b></td>
<td bgcolor='#68A898'><center><b><center>data zwrotu</center></b></td>
<td bgcolor='#68A898'><center><b><center>status</center></b></td></tr>";
while ($wierszz=mysql_fetch_row($wypozyczenie_filmu))
{
echo"<tr class='yellow' width='15%'><td><center>";

$wybranie_tytulu = mysql_query("SELECT tytul FROM film where id='$wierszz[1]'");
	    // wy�wietlany wyniki zapytania 
    while($rek = mysql_fetch_array($wybranie_tytulu)) { 
        echo $rek['tytul'].""; 
}

echo"</td>";
echo"<td><center>$wierszz[2]</td>";	
echo"<td><center>$wierszz[3]</td>";
echo"<td><center>$wierszz[4]</td>";
echo"<td><center>$wierszz[5]</td>";
echo"<td><center>$wierszz[6]</td>";
 
	 }
	echo'</table>';
	
	
	
	echo"<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber1'>
<form method='post' action='zmien_film2.php?id_filmu=$id_filmu&id=$id'>
  <tr>
    <td width='100%'><p align='center'><font color='#FF0000' size='5'>ZMIANA 
    DANYCH:</font></p></td>
</td>
  </tr>
  <tr>
  <td><center>ZMIE� P�ATNO��	<select name='platnosc'>
  <option value='oczekiwanie na platnosc'>Oczekiwanie na p�atno��</option>
  <option value='zaplacone'>Zap�acono</option>
  <option value='niepowodzenia'>P�atno�� nieudana</option>
</select>
	<br>
	</tr><tr><td colspan=2></td>
  </tr>
  <tr>	
  <td><center>ZMIE� STATUS OG�LNY
	<select name='status'>
  <option value='platnosc'>P�atno��</option>
  <option value='zakonczone'>Zako�czone</option>
  <option value='wypozyczenie'>Film wypo�yczony u�ytkownikowi</option>
  <option value='niepowodzenia'>B��d</option>
</select>
	</tr><tr><td colspan=2></td>
  </tr>
  <tr>
    <td width='100%'><br><center><input type='submit' name='log' value='ZMIE�' ></td>
  </tr>
</table></form>";
	
	
?>
</html>





