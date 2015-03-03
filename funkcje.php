<?php

function stopka()
{
	
	echo'
<table align="center" border="0" width="754">
	<tr>
		<td colspan="5"><hr></td>
	</tr>
	<tr>
		<td width="20%" align="center"><a href="index_logowanie.php"><span style="text-decoration: none">
		<font color="#669999">
		<img border="0" src="grafika/all.gif" width="16" height="16">Logowanie</font></span></a></td>
		<td width="20%" align="center"><a href="dodanie_usera.php">
		<span style="text-decoration: none"><font color="#669999">
		<img border="0" src="grafika/all.gif" width="16" height="16">Rejestracja</font></span></a></td>
		<td width="20%" align="center"><a href="haslo.php"><span style="text-decoration: none">
		<font color="#669999">
		<img border="0" src="grafika/all.gif" width="16" height="16">Przypomnienie has³a</font></span></a></td>	
	</tr>
</table>
       
    ';	
}

	function gora()
	{
	
	$expiryTime = 6000;
if (!isset($_SESSION['aktywnosc1']))
{
@$_SESSION['aktywnosc1'] = time();
}

if ((int)$_SESSION['aktywnosc1'] + $expiryTime < time())
{
echo 'sesja wygas³a!';
@$_SESSION = array();
if (isset($_COOKIE[session_name()]))
{
setcookie(session_name(), '', time()-3600, '/');
}
session_destroy();
}
	
	     //	echo $_SESSION['aktywnosc1'];
		     	
 if ($_SESSION['aktywnosc']==1)
{
//	echo " <br> Sesja = 1 czyli ok ";
	echo"<center> <table border='0' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' width='754'  bgcolor='#FFFFFF' height='142'>
     <tr>
       <td width='100%'>
       <a href='../index_logowanie.php'>

   <img border='0' src='grafika/main.jpg' width='754' height='142'></a></td>
     </tr>
   </table>";
	
	
	         include('configg.php');

	 $idc=mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass']) ;
	mysql_select_db($_CONFIG['MySQL']['base']);
	
   	$sql = mysql_query("SELECT * FROM `users` WHERE `login`='".$_SESSION['user']."'");
	                           while ($wiersz=mysql_fetch_row($sql))
{
  echo"<center> <table border='0' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' width='754'  bgcolor='#FFFFFF'>Jeste¶ zalogowany jako: <b>$wiersz[1] $wiersz[2]</b>, login: <b>$wiersz[7]</b>, e-mail: <b>$wiersz[3]     </b></table><hr>";
  $_SESSION['ewid']=$wiersz[9];
	 }

  print "
   	<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber2'>
  <tr>
    <td width='754'>
    <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber1'>
      <tr>
     
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width='754'></td>
  </tr>
  </table><br>";

   }
  else
  {
  echo "<META HTTP-EQUIV='Refresh' Content='5;URL=../index.php'>";
  exit;
  } 
}
{
}


function main()
{
	echo"<center> <table border='0' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' width='754'  bgcolor='#FFFFFF' height='142'>
     <tr>
       <td width='100%'>
  <a href=index.php><img border='0' src='grafika/main.jpg' width='754' height='142'></a></td><td>
</td>
     </tr>
   </table>";	

	
if ($_SESSION['aktywnosc']==1)
{
$niezalogowany=$_SESSION['niezalogowany']=0;
		$sql = mysql_query("SELECT * FROM `users` WHERE `login`='".$_SESSION['user']."'");    
while ($wiersz=mysql_fetch_row($sql))
{
  echo"<center> <table border='0' cellspacing='1' style='border-collapse: collapse' bordercolor='#111111' width='754'  bgcolor='#FFFFFF'>Jesteœ zalogowany jako: <b>$wiersz[1] $wiersz[2]</b>, login: <b>$wiersz[5]</b>, </b><a href='moje_konto.php'>MOJE KONTO</a>,  <a href='moje_zamowienia.php'>MOJE ZAMÓWIENIA</a>, <a href='wyloguj.php'>WYLOGUJ  </a></table><hr>";
$_SESSION['ewid']=$wiersz[5];
	 } 
	 }
 else
 {
 echo"User nie zalogowany - <a href=index_logowanie.php>zaloguj</a> / <a href=dodanie_usera.php>zarejestruj</a>";
 $niezalogowany=$_SESSION['niezalogowany']=1;
 }

	
}
?>
