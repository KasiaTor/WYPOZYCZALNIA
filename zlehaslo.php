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
?>
<center> <table border='0' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' width='754'  bgcolor='#FFFFFF' height='142'>
     <tr>
       <td width='100%'>
   <img border='0' src='grafika/main.jpg' width='754' height='142'></td>
     </tr>
   </table>

<?php
if (!isset($_POST['log']))
{

echo"<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber1'>
<form method='post' action='$php_self'>
  <tr>
    <td width='100%'><p align='center'><font color='#FF0000' size='5'>ZMIANA 
    HASŁA</font></p></td> 
  </tr>
 <tr><td>&nbsp;</td></tr>
  <tr>
    <td width='50%'><font size='5'><p align='center'>WPROWAD¬ NOWE HASŁO</b></font>
</td>
  </tr>
  <tr>
  <td><center>>>>>>>>>>><input name='nowe_haslo' size='20'><<<<<<<<<<</tr><tr><td colspan=2></td>
  </tr>
  <tr>
    <td width='100%'><center><input type='submit' name='log' value='ZMIEŃ' ></td>
  </tr>
</table></form>";
print "<br><a href='index_logowanie.php'>Powrót</a>";
   
}
else
{
$user=$_SESSION['user'];
$_SESSION['nowe_haslo']=$_POST['nowe_haslo'];
$md5code=md5($_SESSION['nowe_haslo']);

if ($md5code=='d41d8cd98f00b204e9800998ecf8427e')
{
echo"Podane hasło jest puste !!  Podaj hasło";
print "<br><a href='index_logowanie.php'>Powrót do strony głównej</a>";
echo'<br><br><br><br><br>';
stopka();
exit;
}
else
{
	$idc=mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die('Nie udało się poł±czyć z serwerem');

mysql_select_db($_CONFIG['MySQL']['base']);
	echo"<br><br><font color='green' size='5'>Twoje nowe hasło zostało ustawione!</font>";
	echo'<br><br><br><br>';
mysql_query ("UPDATE `users` SET  `haslo`='$md5code'  WHERE login='$user'"); 
print "<br>";
      print "<br><a href='index_logowanie.php'>Powrót do strony głównej</a>";
	} 
}
?> 
<?php
echo'<br><br><br><br><br>';
stopka();
?>
