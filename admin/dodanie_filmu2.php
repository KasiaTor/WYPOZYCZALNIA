<?php
require_once('funkcje.php');
session_start();
$a = session_id();
include ('../configg.php');

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die("Nie uda³o siê po³¹czyæ");
mysql_select_db($_CONFIG['MySQL']['base']);

main();


$tytul=$_POST['tytul'];
$gatunek=$_POST['gatunek'];

$cena_wyp=$_POST['cena_wyp'];
$url=$_POST['url'];
$opis=$_POST['opis'];
$aktorzy=$_POST['aktorzy'];

//echo " $tytul, $gatunek, $recenzja, $cena_wyp, $url, $aktorzy"; 

$target_dir = "../filmy_covers/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
     //   echo "Plik jest obrazkiem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      echo "Plik nie jest obrazkiem<br>.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Przepraszamy - plik istnieje w bazie<br>.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1500000) {
    echo "Plik jest zbyt du¿y<br>.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Tylko pliki z rozszerzeniami JPG, JPEG, PNG & GIF !<br>.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Plik nie zosta³ wgrany.";
	  print "<br><a href='admin.php'>Powrót do strony g³ównej</a>";
	 
	 
	 
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Plik ". basename( $_FILES["fileToUpload"]["name"]). " zosta³ dodany<br>.";
		    print "<br><a href='admin.php'>Powrót do strony g³ównej</a>";	
			$okladka=$_FILES["fileToUpload"]["name"];
			
	 	$sql = "INSERT INTO `film`(`tytul`, `gatunek`, `okladka`, `opis`, `cena_wypozyczenia`, `url`, `rezerwacja`, `data_wygasniecia_rezerwacji`, `aktorzy`, `wypozyczen_ilosc`) 	VALUES  ('$tytul','$gatunek','$okladka','$opis','$cena_wyp','$url','0','date()','$aktorzy','0');";
	 if (mysql_query($sql))

 	echo"dziêkujemy za dodanie filmu";
 else
{ echo
 " nie dodano filmu"; }
			
    } else {
        echo "B³¹d przy wgrywaniu pliku.";
    }
}
?>