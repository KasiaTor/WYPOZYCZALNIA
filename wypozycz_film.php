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
<p align="left"><b>Wypożycz film: </b></p>
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
		<td width='107'>Koszt wypożyczenia</td>
		<td>$wierszz[5]</td>
	</tr>
		<tr>
		<td width='107'>FORMA, WARUNKI I TERMIN PŁATNOŚCI</td>
		<td><a href=regulamin.php>LINK DO warunków</a></td>
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
<?php
echo"</tr>";
}
echo'</table>';
 ?>
 <?php
 if ($_SESSION['niezalogowany']==1)
 {
 echo "<br><br>NIE JESTEŚ ZALOGOWANY LUB NIE POSIADASZ KONTO - <a href='index_logowanie.php'>zaloguj</a> lub <a href='dodanie_usera.php'>utwórz nowe konto</a>";
 }
 else
 {
 echo"<br><br><a href=wypozycz_film2.php?id_filmu=$id_filmu>WYPOŻYCZ</a>";
 }
 ?>
</html>
<?php
stopka();
?>





