<?php
 session_start();
?>
<head>
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" >
<title>LOGOWANIE</title>
</head>
<?php
include('configg.php');
include('funkcje.php');

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie udało się poł±czyć");
mysql_select_db($_CONFIG['MySQL']['base']);
main();

?>
<?php
if (!isset($_POST['log']))
{
mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie udało się poł&#177;czyć");
mysql_select_db($_CONFIG['MySQL']['base']);
 mysql_query ("SET NAMES latin2");

$zapytanie_4 = mysql_query("SELECT * FROM users where `login`='".$_SESSION['user']."'")
 or die(mysql_error());
 mysql_query ("SET NAMES latin2");

while ($wierszz=mysql_fetch_row($zapytanie_4))
{
$login=$wierszz[1];
$nazwisko_2=$wierszz[2];
$mail_2=$wierszz[3];
 }
echo"<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber1'>
<form method='post' action='$php_self'>
  <tr>
    <td width='100%'><p align='center'><font color='#FF0000' size='5'>ZMIANA 
    DANYCH</font></p></td>
  </tr>
 <tr><td>&nbsp;</td></tr>
  <tr>
    <td width='50%'><font size='5'><p align='center'>WPROWAD¬ NOWE DANE</b></font>
</td>
  </tr>
  <tr>
  <td><center>
	<table border='0' width='40%'>
		<tr>
			<td>Imię</td>
			<td><input name='imie' size='20' value=$login></td>
		</tr>
		<tr>
			<td>Nazwisko</td>
			<td><input name='nazwisko' size='20'  value=$nazwisko_2></td>
		</tr>
		<tr>
			<td>Mail</td>
			<td><input name='mail' size='20'  value=$mail_2></td>
		</tr>
	</table>
	<p></tr><tr><td colspan=2></td>
  &nbsp;</tr><tr><td></p>
	<center></tr><tr><td colspan=2></td>
  &nbsp;</tr><tr><td><center></tr><tr><td colspan=2></td>
  &nbsp;</tr><tr><td width='100%'><center><input type='submit' name='log' value='ZMIEŃ' ></td>
  </tr>
</table></form>";
print "<br><a href='moje_konto.php'>Powrót</a>";
}
else
{
$user=$_SESSION['user'];
$_SESSION['imie']=$_POST['imie'];
$_SESSION['nazwisko']=$_POST['nazwisko'];
$_SESSION['mail']=$_POST['mail'];
$imie=$_SESSION['imie'];
$nazwisko=$_SESSION['nazwisko'];
$mail=$_SESSION['mail'];

	$idc=mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die('Nie udało się poł±czyć z serwerem');

mysql_select_db($_CONFIG['MySQL']['base']);
	echo"<br><br><font color='green' size='5'>Twoje nowe dane zostały wpisane!</font>";
	echo'<br><br><br><br>';
mysql_query ("UPDATE `users` SET  `imie`='$imie', `nazwisko`='$nazwisko', `mail`='$mail'   WHERE login='$user'"); 
print "<br>";
print "<br><a href='moje_konto.php'>Powrót do strony głównej</a>";
}
?> 
<?php
echo'<br><br><br><br><br>';
stopka();
?>
