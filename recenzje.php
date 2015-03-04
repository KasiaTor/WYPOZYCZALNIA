<?php
require_once('funkcje.php');
session_start();
include ('configg.php');


mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie udało się połączyć");
mysql_select_db($_CONFIG['MySQL']['base']);
main();
 
$id_filmu=$_GET['id'];
 ?>
<p align="left"><b>INFORMACJĘ O FILMIE: </b></p>
<hr>
<p align="center">
<?php
$zapytanie_4 = mysql_query("SELECT * FROM `film` WHERE `id`='$id_filmu'"); 
 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';

while ($wierszz=mysql_fetch_row($zapytanie_4))
{
echo'<table border="1" width="35%">';
	echo"
	<tr>
		<td width='107'>Tytuł</td>
		<td>$wierszz[1]</td>
	</tr>
	<tr>
		<td width='107'>Gatunek</td>
		<td>$wierszz[2]</td>
	</tr>
	<tr>
		<td width='107'>Opis</td>
		<td>$wierszz[4]</td>
	</tr>
		<tr>
		<td width='107'>Aktorzy</td>
		<td>$wierszz[9]</td>
	</tr>
		</tr>
		<tr>
		<td width='107'>Okładka</td>
		<td><center>";
		?>
		<a href="film_detale.php?id=
	
		<?php echo"$wierszz[0]";?>
		.php"><span style="text-decoration: none"><font color="#669999">
		<img border="0" src="filmy_covers/<?php echo"$wierszz[3]"; ?>"
	width="160" height="160"></font></span></a></td>
</tr>
	<tr>
		<td width='107'>wypożyczony?</td>
		<td>

		<?php
		if ($wierszz[7]==0)
{
echo"Film jest dostępny 
<p><a href=wypozycz_film.php?id_filmu=$wierszz[0]>WYPOŻYCZ</a> / DODAJ DO KOSZYKA</p>";
  }
  else
  {
	echo"Film jest niedostępny"; 
	}		
	?>
<?php
echo"
</td></tr><tr><td width='107'>Dodaj recenzję</td>";
		?>
		<?php
 if ($_SESSION['niezalogowany']==1)
 {
 echo "<td><br><br>NIE JESTEŚ ZALOGOWANY LUB NIE POSIADASZ KONTO - <a href='index_logowanie.php'>zaloguj</a> lub <a href='dodanie_usera.php'>utwórz nowe konto</a>";
 }
 else
 {
 echo"<td><br><br><a href=dodaj_recenzje.php?id_filmu=$id_filmu>RECENZUJ</a>";
 }
 ?>
		<?php
		echo"
		</td></tr>";
}
	echo"</table>";
 ?>
<a name="recenzje"></a>
<p align="left"><b>RECENZJĘ UŻYTKOWNIKÓW: </b></p>
<hr>
   <?php
mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie udało się poł&#177;czyć");
mysql_select_db($_CONFIG['MySQL']['base']);
 mysql_query ("SET NAMES latin2");

$zapytanie_25 = mysql_query("SELECT * FROM recenzja where id_filmu='$id_filmu'")
 or die(mysql_error());

 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';
echo "
<td bgcolor='#68A898'><center><b><center>recenzja</td></center></b></b></td>
<td bgcolor='#68A898'><center><b><center>dodana przez</td></center></b></b></td> ";
echo "</tr>";
while ($wierszzz=mysql_fetch_row($zapytanie_25))
{
echo"<td><center>$wierszzz[2]</td>";	
  echo"<td><center>$wierszzz[3]</td></tr>";	
	 }
	echo'</table>';
?>
</html>
<?php
stopka();
?>





