<?php
require_once('funkcje.php');
session_start();
$a = session_id();
include ('configg.php');

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die("Nie uda³o siê po³¹czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);

main();
?>
<p align="left"><b>Lista dostêpnych filmów: </b></p>
<hr>
<p align="center">
<?php
		/////////////////////////////////  DOSTÊPNE FILMY ///////////////////////////////////////////////

mysql_query ("SET NAMES latin2");

$zapytanie_4 = mysql_query("SELECT * FROM film where rezerwacja=0")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>TYTYU£</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>GATUNEK</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>OK£ADKA</center></b></td>
<td bgcolor='#68A898'><center><b><center>OPIS</center></b></td>
<td bgcolor='#68A898'><center><b><center>AKTORZY</center></b></td>
<td bgcolor='#68A898'><center><b><center>CENA</center></b></td></tr>";
while ($wierszz=mysql_fetch_row($zapytanie_4))
{
echo"<tr class='yellow' width='15%'><td><center>$wierszz[1]</td>";
echo"<td><center>$wierszz[2]</td>";	
	  ?>	
<td><center><a href="film_detale.php?id=<?php echo"$wierszz[0]";?>.php
"><span style="text-decoration: none"><font color="#669999"><img border="0" src="filmy_covers/<?php echo"$wierszz[3]";?>"
width="100" height="100"></font></span></a>
</td>
<?php
echo"<td><center>$wierszz[4]</td>";
echo"<td><center>$wierszz[9]</td>";
echo"<td><center>$wierszz[5]</td>";
  
	 }
	echo'</table>';
?>
<?php
///////////////////////////////////////////////////////// TOP WYPO¯YCZANE //////////////////////////////////////////////

?>
<br><br>
<b><p align="left">Najczêœciej wypo¿yczane: </b></p>
<p align="center">
<hr>

<?php
$zapytanie_4 = mysql_query("SELECT * FROM film order by wypozyczen_ilosc DESC")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>TYTYU£</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>GATUNEK</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>OK£ADKA</center></b></td>
<td bgcolor='#68A898'><center><b><center>OPIS</center></b></td>
<td bgcolor='#68A898'><center><b><center>AKTORZY</center></b></td>
<td bgcolor='#68A898'><center><b><center>CENA</center></b></td>
<td bgcolor='#68A898'><center><b><center>ILOŒÆ WYPO¯YCZEÑ</center></b></td>";

echo "</tr>";
while ($wierszz=mysql_fetch_row($zapytanie_4))
{
  echo"<tr class='yellow' width='15%'><td><center>$wierszz[1]</td>";
  echo"<td><center>$wierszz[2]</td>";	
	  ?>	


<td><center><a href="film_detale.php?id=<?php echo"$wierszz[0]";?>.php"><span style="text-decoration: none"><font color="#669999">
		<img border="0" src="filmy_covers/
		<?php echo"$wierszz[3]"; ?>"
	
		
		width="160" height="160"></font></span></a>
</td>
<?php
echo"<td><center>$wierszz[4]</td>";
echo"<td><center>$wierszz[9]</td>";
echo"<td><center>$wierszz[5]</td>";
echo"<td><center>$wierszz[10]</td>";
  
	 }
	echo'</table>';

////////////////////////////////////////////////////////////////////////////////////
?>
<br>
<br>
<p align="left"><b>Lista najczêœciej recenzowanych:</b></p>
<hr>
<?php

$zapytanie_4 = mysql_query("SELECT DISTINCT * FROM recenzja order by id DESC")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>TYTU£</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>ILOŒÆ RECENZJI</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>ZOBACZ RECENZJÊ</td></center></b></b></td></tr>";
while ($wierszz=mysql_fetch_row($zapytanie_4))
{
	
  echo"<tr class='yellow' width='15%'><td><center>";
	?>
	<?php
	$zapytanie_14 = mysql_query("SELECT DISTINCT tytul, id FROM film where id='$wierszz[1]'");
	    // wyœwietlany wyniki zapytania 
    while($rek = mysql_fetch_array($zapytanie_14)) { 
        echo $rek['tytul']."<br />"; 
    } 
	?>
	<?php
	echo"</td><td><center>";
?>
<?php
$query8 = mysql_query('SELECT DISTINCT count(id) AS ile FROM recenzja WHERE id_filmu LIKE \''.$wierszz[1].'\'');
    $wynik8= mysql_fetch_array( $query8 );
    echo ''.$wynik8['ile'].' ';

?>
<?php
echo"</td>";
echo"<td><center><a href='film_detale.php?id=$wierszz[1]'>zobacz recenzjê u¿ytkowników</a></td>";
  
	 }
	echo'</table>';

////////////////////////////////////////////////////////////////////////////////////
?>
<p align="left">&nbsp;</p>
<p align="left"><b>GATUNKI:</b></p>
<hr>
<?php

$zapytanie_4 = mysql_query("SELECT * FROM gatunek")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>GATUNEK</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>ILOŒÆ FILMÓW</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>ZOBACZ FILMY</td></center></b></b></td></tr>";
while ($wierszz=mysql_fetch_row($zapytanie_4))
{
	
  echo"<tr class='yellow' width='15%'><td><center>$wierszz[1]</td><td><center>";
?>
<?php
$query8 = mysql_query('SELECT count(id) AS ile FROM film WHERE gatunek LIKE \''.$wierszz[1].'\'');
    $wynik8= mysql_fetch_array( $query8 );
    echo ''.$wynik8['ile'].' ';

?>
<?php
echo"</td>";
echo"<td><center><a href='gatunki.php?gatunek=$wierszz[1]'>zobacz filmy z tej kategorii</a></td>";
  
	 }
	echo'</table>';
?>
</html>

<?php
stopka();
?>





