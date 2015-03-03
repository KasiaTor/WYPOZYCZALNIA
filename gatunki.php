<?php
require_once('funkcje.php');
session_start();
include ('configg.php');
	
$gatunek=$_GET['gatunek'];

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie uda³o siê po³¹czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);

main();
?>
 
 
<p align="left"><b>WYBRANE FILMY W GATUNKU: <?php echo"$gatunek"; ?>
</b></p>
<hr>
<p align="center">


<?php
		/////////////////////////////////  GATUNKI FILMÓW ///////////////////////////////////////////////

 mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie uda³o siê po³&#177;czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);
 mysql_query ("SET NAMES latin2");

$zapytanie_4 = mysql_query("SELECT * FROM film where gatunek='$gatunek'")
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
<td bgcolor='#68A898'><center><b><center>DOSTÊPNOŒÆ</center></b></td></tr>

";
while ($wierszz=mysql_fetch_row($zapytanie_4))
{
echo"<tr class='yellow' width='15%'><td><center>$wierszz[1]</td>";
echo"<td><center>$wierszz[2]</td>";	
	  ?>	
<td><center><a href="film_detale.php?id=<?php echo"$wierszz[0]";?>.php
"><span style="text-decoration: none"><font color="#669999"><img border="0" src="filmy_covers/<?php echo"$wierszz[3]";?>"
width="160" height="160"></font></span></a>
</td>
<?php
echo"<td><center>";
$newtext = wordwrap($wierszz[4], 50, "\n", true);
echo "$newtext\n";
echo"</td>";
echo"<td><center>$wierszz[9]</td>";
echo"<td><center>$wierszz[5]</td>";
echo"<td><center>";
?>

<?php
		if ($wierszz[7]==0)
{
echo"FILM MO¯NA WYPO¯YCZYÆ</a>";
  }
  else
  {
	echo"FILM NIEDOSTÊPNY - nie ma mo¿liwoœci wypo¿yczenia"; 
	}	
	?>	
<?php
echo"</td>";
  
	 }
	echo'</table>';
?>
 
</html>
<?php
stopka();
?>





