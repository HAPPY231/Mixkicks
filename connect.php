<?php

    $host = "sql201.hyperphp.com";

    $user = "hp_30915138";

    $password = "";

    $db_name = "hp_30915138_mixkicks";

$dbc = new mysqli($host, $user, $password, $db_name);

if(!$dbc){

    echo "Nie udało się połączyć z bazą danych";

}

?>
