<?php
require_once('funkcje.php');

session_start();
session_destroy();
$a = session_id();



include ('configg.php');
					
    $ip = $_SERVER['REMOTE_ADDR'];
$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$data=date("Y-m-d");
$godzina=date("H:i:s");




?>
 <?php

 main();
  echo"<center> <table border='0' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' width='754'  bgcolor='#FFFFFF' height='52'>
     <tr>

   </table>";


	echo"<table align='center' cellspacing='0' width='400' background='grafika/bg_lock.gif' height='245'>

<form method='post' action='loguj2.php'>
<center><tr><td width='149'><p align='right'>&nbsp;</td><td width='207'>&nbsp;</td></tr></center>

<tr>
  <td width='149'>
  <p align='right'><font size='5'><b>LOGIN</b></font></td><td width='207'>
  <input name='user' size='20'></td>
</tr>
<tr><td width='149'><p align='right'><b><font size='5'>HAS£O</font></b></td><td width='207'>
  <input type='password' name='haslo' size='20'></td></tr>
<tr>
  <td width='149'></td>
   <td width='149'><center><a href='haslo.php'><font size=1>Przypomnienie has³a</font></a></td>
</tr>
<tr>
  <td width='149'></td>
   <td width='149'><center><a href='dodanie_usera.php'><font size=1px>Rejestracja - nowy u¿ytkownik</font></a></td>
</tr>
<tr><td colspan=2 align='center'>
<input type='submit' name='log' value='ZALOGUJ' ></td></td>			</table></form>";



 
?>

   
</html>
<p></p>
 <?php

 stopka();
 ?>





