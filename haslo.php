<?php
include('configg.php');
include('funkcje.php');
?>
<center><img p align="center" border="0" src="grafika/main.jpg" >


    <head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Language" content="pl">
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" >
<title>LOGOWANIE</title>

</head>

<?php
if (!isset($_POST['log']))
{
echo'




<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="754" id="AutoNumber2">
  <tr>
    <td width="754"><hr>
   
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="754" id="AutoNumber1">
      <tr>
        <td width="100%">
        <p align="center"><b></b></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width="754"><hr></td>
  </tr>
  </table>

<form method="post" action="haslo.php">


<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="754" id="AutoNumber5">
  <tr>
    <td width="100%">
    <p align="center"><b><font color="#68A898"><br>
    PRZYPOMNIENIE ZAPOMNIANEGO HASŁA</font></b></td>
  </tr>
</table>


<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="754" id="AutoNumber4">
  <tr>
    <td width="100%" bgcolor="#FFFFFF" bordercolor="#000000" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1">
    <p align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#FFFFFF" bordercolor="#000000" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1">
    <p align="center"><b>
    <font size="4"></font></b></td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#FFFFFF" bordercolor="#000000" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#FFFFFF" bordercolor="#000000" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1">
    <p align="center"><b><font color="red">Podaj adres e-mail</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#FFFFFF" bordercolor="#000000" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1">&nbsp;</td>
  </tr>

  <tr>
    <td width="100%" align="center" bgcolor="#FFFFFF" bordercolor="#000000" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1">Adres e-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="email" size="20"></td>
  </tr>
  <tr>
    <td width="100%" align="center" bgcolor="#FFFFFF" bordercolor="#000000" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" align="center" bgcolor="#FFFFFF" bordercolor="#000000" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: solid; border-bottom-width: 1"><input type="submit" name="log" value="WYŚLIJ" ></td>
  </tr>
</table>
</form>
';

?>

<?php

}
else

{

   
	$mail=$_POST['email'];
   
    $idc=mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass']) ;
	mysql_select_db($_CONFIG['MySQL']['base']);
	
	    
$zrodlo = "formularz";
    $wynik = mysql_query("SELECT `mail` FROM `users` WHERE `mail`='".$_POST['email']."'");
    echo $_POST['mail'];
    if((@mysql_num_rows($wynik) == 1)) 
      {
      $wynik = mysql_fetch_array($wynik);
     
      $SESSION['mail'] = $wynik[0]; 
      
      
$wybranie_mail = mysql_query("SELECT `mail` FROM `users` WHERE `mail`='".$_POST['email']."'");
while ($wiersz=mysql_fetch_row($wybranie_mail))
{
  echo"<tr width='20%'><td><center>$wiersz[0]</td>";
$mail2=$wiersz[0];
	 } 
	   
$actCode=str_shuffle("lzxb0234");
$md5actCode=md5($actCode);


  $godzina=date("H:i:s");

extract($_SERVER);

$host="".gethostbyaddr($_SERVER['REMOTE_ADDR'])."";

$ip="".$_SERVER['REMOTE_ADDR']."";
  

$data = date("Y-n-j");    

$tresc= 'Witaj. 
Poniżej znajduje się twoje nowe hasło. <br>

';

mysql_query ("UPDATE `users` SET  `haslo`='$md5actCode'  WHERE mail='$mail'");

require("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();


$mail->IsHtml(true); //format wiadomoÂści jeÂśli true=HTML, false=TXT
$mail->CharSet = "iso-8859-2"; // strona kodowa taka jak w pliku php bÂądÄ˝ html u 
$mail->PluginDir = "phpmailer/";
$mail->From = "rejestracja@alogator.eu"; //adres naszego konta
$mail->FromName = "PRZYPOMNIENIE HASŁA";//nagĹĂłwek From
$mail->Host = "alogator.eu";//adres serwera SMTP
$mail->Mailer = "smtp";
$mail->Username = "rejestracja@alogator.eu";//nazwa uĹźytkownika
$mail->Password = "rejestracja_1";//nasze hasĹo do konta SMTP
$mail->SMTPAuth = true;
$mail->SetLanguage("en", "phpmailer/language/");

$mail->Subject = "$mail2";//temat maila

// w zmiennÂą $text_body wpisujemy treÂśÄ maila
$text_body = "INFORMACJA ZE STORNY<br> \n\n";

$text_body .= "IP: $ip<br> \n";
$text_body .= "HOST: $host<br> \n";
$text_body .= "Data: $data,   godzina: $godzina <br> \n";
$text_body .= "TREŚĆ:<br> \n";
$text_body .= "$tresc<br> \n";
$text_body .= "$actCode<br> \n";

$mail->Body = $text_body;
// adresatĂłw dodajemy poprzez metode 'AddAddress'

$mail->AddAddress("$mail2","");


if(!$mail->Send())
echo "<br>Błąd wysyłania zgłoszenia<br>";
echo $mail->ErrorInfo."<br>";

// Clear all addresses and attachments
$mail->ClearAddresses();
$mail->ClearAttachments();




print "
<table align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber2'>
  <tr>
    <td width='754'><hr>
   
    <table align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber1'>
      <tr>
        <td width='100%'>
        <p align='center'><b></b></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width='754'><hr></td>
  </tr>
  </table>
<br><br><br>";
echo'
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="754" id="AutoNumber1">
          <tr>
            <td width="200"><p align="right"><img border="0" src="grafika/enter.gif" width="26" height="23"></td>
            <td width=""><font color="red" size="5">Nowe hasło został
            wysłane na adres e-mail ';
            echo"<center> $mail2</font></td>";
       echo'   </tr>
        </table>
';

      print "<br><a href='index.php'>Powrót do strony głównej</a>";
      print "<br><br><br><p>";
      
      
 
 	}
   		else
   		print "
   	<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber2'>
  <tr>
    <td width='754'><hr>
    <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber1'>
      <tr>
        <td width='100%'>
        <p align='center'><b></b></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td width='754'><hr></td>
  </tr>
  </table>
<table border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='754' id='AutoNumber1'>
          <tr>
            <td width='240'><p align='right'><br><br><img border='0' src='grafika/cancel.gif' width='26' height='23'></td>
            <td width=''><font color='red' size='5'><br><br>Podane dane nie są prawidłowe
            </font></td>
          </tr>
        </table>
<br><a href='index.php'>Powrót do strony głównej</a>
 <br><br><br><br><br>";
     echo"<br><br>";
    
}	

?>
<?php
echo'<br><br>';

stopka();

?>


