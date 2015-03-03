<?php
session_start();
include ('configg.php');
include ('funkcje.php');
unset($_SESSION['nazwisko']);
unset ($_SESSION['imie']);
unset ($_SESSION['login']);
unset ($_SESSION['mail']);

//$token=$_POST['token'];
 $loskod=str_shuffle("1234567890qwertyuioplkjhgfdsazxcvbnmMNBVCXZASDFGHJKLPOIUYTREWQ");
$data_rej=date("Y-m-d H:i:s");

?>
<?PHP

$_SESSION['token']='';
for ($licz=0;$licz<4;$licz++){
  $liczba=rand(0,9);
  $_SESSION['token'].=$liczba;
  @$img.="<img src='captcha/".$liczba.".gif'/>";
}
?>

  <head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" >
<title>REJESTERACJA</title>
</head>

	<?php
 main();
 ?>
	
	
<form method="POST" action="dodanie_usera2.php">
<br> <font size=4 color=green> <b>DODANIE NOWEGO UŻYTKOWNIKA: </b></font> <br>
	<table border="0" width="46%">
	<tr>
			<td width="256">Login </td>
			<td><input type="text" name="login" size="20"></td>
		</tr>
		<tr>
			<td width="256">Imię </td>
			<td><input type="text" name="imie" size="20"></td>
		</tr>
		<tr>
			<td width="256">Nazwisko</td>
			<td><input type="text" name="nazwisko" size="20"></td>
		</tr>
	  
		<tr>
			<td width="256">Adres e-mail</td>
			<td><input type="text" name="mail" size="20"></td>
		</tr>
		
		<?php
		  echo"<tr><td><font color=red><b>Wprowadź kod z obrazka</b></font></td><td><br></td></tr>	";
echo"<tr><td>$img</td><td><input type='text' name='token'><br></td></tr>	";	
		?>
</table>
<p align="center"><input type="submit" value="Prześlij" name="B1"><input type="reset" value="Resetuj" name="B2"></p>
</form>
<br>

 <?php

 stopka();
 ?>
