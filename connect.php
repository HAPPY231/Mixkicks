<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "mix_kicks";
$dbc = mysqli_connect($host, $user, $password, $db_name);
if(!$dbc){
    echo "Nie udało się połączyć z bazą danych";
}
else{echo ""; }
?>