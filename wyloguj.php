<?PHP
@session_start();
$a = session_id();
echo " <br>$a <br>";
session_destroy();
unset($_SESSION['$a']);
echo "<META HTTP-EQUIV='Refresh' Content='1;URL=index.php'>";
?>
<?php
session_start();
$expiryTime = 60;
if (!isset($_SESSION['start_time']))
{
$_SESSION['start_time'] = time();
}
if ((int)$_SESSION['start_time'] + $expiryTime < time())
{
echo 'sesja wygasła!';
@$_SESSION = array();
if (isset($_COOKIE[session_name()]))
{
setcookie(session_name(), '', time()-3600, '/');
}
session_destroy();
}
else
{
	echo " <br> Sesja wygasła - nastąpi automatyczne przekierowanie na stronę logowania ";
	 echo "<META HTTP-EQUIV='Refresh' Content='0;URL=index.php'>";
}
?>
