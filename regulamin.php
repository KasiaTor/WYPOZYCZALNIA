<?php
require_once('funkcje.php');
session_start();
$a = session_id();
include ('configg.php');

mysql_connect($_CONFIG['MySQL']['host'], $_CONFIG['MySQL']['user'], $_CONFIG['MySQL']['pass'])
or die("Nie udało się połączyć");
mysql_select_db($_CONFIG['MySQL']['base']);
main();
?>
<p align="left"><b>Regulamin wypożyczenia: </b></p>
<hr>
<p align="center">
Wypożyczać można osobiście lub przez osobę upoważnioną 
--Przy wypożyczaniu należy okazać pracownikowi wypożyczalni kartę klienta. Pracownik wypożyczalni
-- ma prawo potwierdzić tożsamość klienta zadając pytanie dotyczące informacji zawartych 
--w umowie , np. zapytać o datę urodzenia. 
--Warunkiem korzystania z usług dvd  jest każdorazowe okazanie ważnej karty klienta lub
--podanie jej numeru pracownikowi wypożyczalni. W przypadku utraty karty, klient zobowiązany jest 
--do zgłoszenia tego faktu wypożyczalni, ponieważ za wszelkie szkody wynikające z utraty 
--karty odpowiada bez ograniczeń. 
--Karta jest własnością dvd  i podlega zwrotowi na każde wezwanie wypożyczalni. 
--Osoba zapisująca się do wypożyczalni może upoważnić do korzystania z karty najbliższą rodzinę, 
--pod warunkiem wspólnego adresu zamieszkania stałego. Właściciel karty klienta powinien pamiętać,
--że ponosi pełną odpowiedzialność za wszelkie szkody wyrządzone przez osoby upoważnione i odpowia- 
--da za nie jak za czyny własne. Właściciel karty klienta odpowiada za prawdziwość danych osób przez
--niego upoważnionych. Klient przy wypożyczeniu zobowiązany jest sprawdzić stan techniczny płyty.
--Jeżeli stan DVD wzbudza wątpliwości powinien zgłosić ten fakt pracownikowi wypożyczalni. 
--W przypadku, gdy tego nie zrobi pracownik wypożyczalni zakłada, że płyta jest w stanie ogólnym 
--dobrym i za ewentualne uszkodzenia przy zwrocie obciążony zostanie wypożyczający. 
--Wypożyczający od momentu wypożyczenia do momentu zwrotu odpowiada za zniszczenia 
--i stan techniczny płyty. 
--Opłata za DVD jest naliczana za okres jednej doby. Doba naliczana jest od dnia wypożyczenia do 
--godziny 18:00 dnia następnego. 
--Płatność za wypożyczenie płyt pobierana jest z góry za 1 dobę przy wypożyczeniu - zgodnie z 
--cennikiem wypożyczalni. 
--Wypożyczalnia zastrzega sobie prawo do zażądania wpłaty kaucji, która ustalona jest 
--w każdym przypadku indywidualnie. Kaucja podlega zwrotowi w chwili terminowego zwrotu płyty, któ-
--rej oryginalność i stan techniczny nie wzbudzą wątpliwości pracownika. W przypadku utraty lub uszko-
--dzenia płyty kaucja przechodzi na wypożyczalnię. Z kaucji może być potrącona opłata za przetrzy-
--manie płyty jako opłata dodatkowa. 
--Wypożyczający jest zobowiązany do okazania dokumentu potwierdzającego tożsamość na 
--życzenie pracownika wypożyczalni. 
--Pracownik może odmówić wypożyczenia filmów, jeżeli na koncie klienta przetrzymywane są już 
--jakieś płyty lub klient nie uregulował dopłaty za przetrzymanie. 
--Istnieje możliwość rezerwacji filmów w momencie gdy dany tytuł jest na stanie wypożyczalni. 
--Rezerwacji dokonuje się przez: 
--- kontakt telefoniczny z wypożyczalnią 
--- e-mail na adres wypożyczalni
--- osobiście. 
--W przypadku rezerwacji przez internet/e-mail wymagane jest potwierdzenie przyjęcia zamówie-
--nia przez pracownika listem zwrotnym. 
--Wypożyczone filmy mogą być wykorzystywane tylko do użytku domowego pod rygo-
--rem odpowiedzialności prawnej. Filmów nie wolno pokazywać publicznie. 
--Wypożyczalnia zastrzega sobie prawo zmiany regulaminu. 
--W przypadku zmiany regulaminu wypożyczalnia dvd ek ma prawo informować swoich 
--klientów w wybranej przez siebie formie.

</html>

<?php
stopka();
?>





