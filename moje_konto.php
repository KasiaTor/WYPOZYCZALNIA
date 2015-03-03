<?php
require_once('funkcje.php');

session_start();



                include ('configg.php');
	


mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie uda³o siê po³¹czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);



 main();
 
 
$zapytanie_4 = mysql_query("SELECT * FROM `users` WHERE `login`='".$_SESSION['user']."'"); 
 mysql_query ("SET NAMES latin2");
 echo'<table border="1"   bgcolor="white" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">';

while ($wierszz=mysql_fetch_row($zapytanie_4))
{
echo'<table border="1" width="35%">';
	echo"<tr>
		<td width='107'>Login</td>
		<td>$wierszz[5]</td>
	</tr>
	<tr>
		<td width='107'>Imiê</td>
		<td>$wierszz[1]</td>
	</tr>
	<tr>
		<td width='107'>Nazwisko</td>
		<td>$wierszz[2]</td>
	</tr>
	<tr>
		<td width='107'>Mail</td>
		<td>$wierszz[3]</td>
	</tr>
 ";
	


}
	echo'</table>';
 
echo"<br><a href=zmien_dane.php>ZMIEÑ DANE</a><br><br>"; 
echo"<a href=zmien_haslo.php>ZMIEÑ HAS£O</a><br>"; 

 ?>

 

<?php
stopka();
?>





