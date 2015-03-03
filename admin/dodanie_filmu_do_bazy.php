<?php
require_once('funkcje.php');
session_start();
$a = session_id();
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
<img src="../grafika/all.gif"><a href="dodanie_filmu_do_bazy.php">DODANIE FILMU DO BAZY</a><br>
<br><br><br>
</p>

<p align="center">
<p align="left"><b>DODANIE FILMU :</b></p>
<hr>

<form action="dodanie_filmu2.php" method="post" enctype="multipart/form-data">
<br> <font size=4 color=green> <b></b></font> <br>
	<table border="0" width="46%">
	<tr>
			<td width="256">Tytu³</td>
			<td><input type="text" name="tytul" size="20"></td>
		</tr>
		<tr>
			<td width="256">Gatunek</td>
			
		
		 	<td>	
			<select name="gatunek">
<?php 
$sql = mysql_query("SELECT gatunek FROM gatunek");
while ($row = mysql_fetch_array($sql))
{
echo "<option value='"; 
echo $row['gatunek']; 
echo "'>";
echo $row['gatunek'];
echo"</option>";
}
?>
</select>
			</td>

				</tr>
		<tr>
			<td width="256">Opis</td>
			<td><textarea name='opis' rows='10' cols='100'></textarea></td>
		</tr>
		<tr>
			<td width="256">cena wypo¿yczenia</td>
			<td><input type="text" name="cena_wyp" size="20"></td>
		</tr>
		<tr>
			<td width="256">aktorzy</td>
			<td><input type="text" name="aktorzy" size="20"></td>
		</tr>
			<tr>
			<td width="256">URL filmu</td>
			<td><input type="text" name="url" size="100"></td>
		</tr>
		<tr>
			<td width="256">Ok³adka</td>
			<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
		</tr>
		
		<?php
		  
		
		
		?>
		

	</table>
	<p align="center"><input type="submit" value="Przeœlij" name="submit"><input type="reset" value="Resetuj" name="B2"></p>
	
	
	
</form>
</html>





