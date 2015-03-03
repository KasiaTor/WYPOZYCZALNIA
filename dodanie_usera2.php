<?php
session_start();
include('configg.php');
include('funkcje.php');
$imie=ucfirst ($_POST['imie']);
$nazwisko=ucfirst($_POST['nazwisko']);
$login=$_POST['login'];
$mail=$_POST['mail'];

$haslo1=str_shuffle("1234567890");
$token=$_POST['token'];
$data_rej=date("Y-m-d H:i:s");
$has=md5($haslo1);




mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie uda³o siê po³±czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);

//////////////////////////////// sprawdzenie usera czy istnieje w bazie


$loguj="select login from users where login='$login'";
$rekordy = mysql_query($loguj);
if(mysql_num_rows($rekordy)==0)
{
//echo " nie istnieje w bazie ";//co jak nie istnieje
}
else
{
echo "<br><br><b><center><font size='5' color='red'>Podany login istnieje ju¿ w bazie danych !<br><SCRIPT LANGUAGE='JavaScript'>function Historia(g) { history.go(g) } </SCRIPT><center><A HREF='javascript:Historia(-1)'><b><font size='5'>Wstecz</b></font></A></center><br><br><br><br><br><br>";
 stopka();
exit;
}

/////////////////////////////////////////////// sprtawdzenie maila czy istnieje w bazie

$loguj2="select mail from users where mail='$mail'";
$rekordy2 = mysql_query($loguj2);
if(mysql_num_rows($rekordy2)==0)
{
//echo " nie istnieje w bazie ";//co jak nie istnieje
}
else
{
echo "<br><br><b><center><font size='5' color='red'>Podany mail istnieje ju¿ w bazie danych !<br><SCRIPT LANGUAGE='JavaScript'>function Historia(g) { history.go(g) } </SCRIPT><center><A HREF='javascript:Historia(-1)'><b><font size='5'>Wstecz</b></font></A></center><br><br><br><br><br><br>";
 stopka();
exit;
}




?>

<head>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<title>REJESTRACJA</title>
</head>

<?php
main();
 $data=date("Y-m-d");
$godzina=date("H:i:s");


if ($_SESSION['token'] == $_POST['token'])
{
 echo "<center>Przepisany przez Ciebie kod zabezpieczaj±cy JEST prawid³owy";


 echo "<br>Wprowadzone informacjê przy rejestracji: <br>";
 echo "<br>Imiê: $imie <br>";
 echo "<br>Nazwisko: $nazwisko <br>";

                   	$tekst1 = "$mail";
   $mail = strtr($mail, 'ÊÓ¡¦£¯¬ÆÑêó±¶³¿¼æñ', 'EOASLZZCNeoaslzzcn');
 echo "<br>Mail: $mail <br>";


 echo "<br>has³o: $haslo1 <br>";

 echo "<br>Login: $login <br>";

 	      $mail2=$mail;

$ip="".$_SERVER['REMOTE_ADDR']."";
//ECHO "IP : $ip";
extract($_SERVER);

$host="".gethostbyaddr($_SERVER['REMOTE_ADDR'])."";
//echo "<br>host: $host";

 		
		$tekst = "$login";
   $wynik_login = strtr($tekst, 'ÊÓ¡¦£¯¬ÆÑêó±¶³¿¼æñ', 'EOASLZZCNeoaslzzcn');

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
	or die("Nie uda³o siê po³±czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);



 if (mysql_query($sqll))
 { echo ""; }
 else
 {
 }

                        mysql_query ("SET NAMES latin2");
  $sql = "INSERT INTO `users`(`Imie`, `Nazwisko`, `mail`, `haslo`,   `login`,   `data_rej`) 	
  					VALUES  ('$imie','$nazwisko','$mail','$has', '$login','$data_rej');";




if (mysql_query($sql))

 echo "<br><br><b><font size='5' color='green'>Dodano do bazy !<br>mo¿esz zalogowaæ siê u¿ywaj±c powy¿szego loginu i has³a<br><center><A HREF='index.php'><b><font size='5'>Wstecz</b></font></A></font></center><br><br>";
 else
{ echo

 "nie "; }

}
else
{
	
	echo "<br><br><b><font size='5' color='red'>Podany kod nie jest prawid³owy !<br><SCRIPT LANGUAGE='JavaScript'>function Historia(g) { history.go(g) } </SCRIPT><center><A HREF='javascript:Historia(-2)'><b><font size='5'>Wstecz</b></font></A></center><br><br><br><br><br><br>";
 stopka();
exit;
	
	
	}

?>
<?
$godzina=date("H:i:s");

extract($_SERVER);

$host="".gethostbyaddr($_SERVER['REMOTE_ADDR'])."";

$ip="".$_SERVER['REMOTE_ADDR']."";
//ECHO "IP : $ip";


$data = date("Y-n-j");
$tresc= 'Witaj. Twoje konto zosta³o utworzone.';
   ?>
   <?php

require("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();


$mail->IsHtml(true); //format wiadomo¶ci je¶li true=HTML, false=TXT
$mail->CharSet = "iso-8859-2"; // strona kodowa taka jak w pliku php b±d¼ html u
$mail->PluginDir = "phpmailer/";
$mail->From = "rejestracja@alogator.eu"; //adres naszego konta
$mail->FromName = "REJESTRACJA";//nag³ówek From
$mail->Host = "alogator.eu";//adres serwera SMTP
$mail->Mailer = "smtp";
$mail->Username = "rejestracja@alogator.eu";//nazwa u¿ytkownika
$mail->Password = "rejestracja_1";//nasze has³o do konta SMTP
$mail->SMTPAuth = true;
$mail->SetLanguage("en", "phpmailer/language/");

$mail->Subject = "$mail2";//temat maila

// w zmienn± $text_body wpisujemy tre¶æ maila
$text_body = "INFORMACJA ZE STORNY REJESTRACYJNEJ DO SERWISU<br> \n\n";

$text_body .= "IP: $ip<br> \n";
$text_body .= "HOST: $host<br> \n";
$text_body .= "Data: $data,   godzina: $godzina <br> \n";

$text_body .= "TRE¦Æ:<br> \n";
$text_body .= "haslo: $haslo1 <br> \n";
$text_body= "$tresc<br> \n";
//$text_body .= "<a href=http://alogator.eu/wypozyczalnia/aktywuj.php?mail=$mail2&code=$link_aktywacja> Link do kodu aktywacji </a> \n";
$mail->Body = $text_body;
// adresatów dodajemy poprzez metode 'AddAddress'
$mail->AddAddress("$mail2","");


if(!$mail->Send())
echo "<br>B³±d wysy³ania zg³oszenia<br>";
echo $mail->ErrorInfo."<br>";

// Clear all addresses and attachments
$mail->ClearAddresses();
$mail->ClearAttachments();
//echo "<br><center><font size='3'>Mail z informacjami zosta³ wys³any $wynik_mail </font><font color='green'>POPRAWNIE<br></center>";

?>

 <?php
 stopka();
 ?>






