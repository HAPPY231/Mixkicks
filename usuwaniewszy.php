<?php

    session_start();
    
    include("connect.php");
    $sql = "DELETE FROM zamowienia WHERE uzytkownik='$_COOKIE[uzytkownik]'";
  
    $res = mysqli_query($dbc, $sql);

    if($res){
        $_SESSION['udalosie'] = '<span style="color:green">Udało się dodać zamówienie</span>';
       header('Location:koszyk.php');
    }else{
       
       echo "Nie udało się";
    }
    $dbc->close();
?>