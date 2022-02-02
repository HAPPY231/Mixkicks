<<<<<<< HEAD
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
=======
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
>>>>>>> 27d91b1dcee6c4b4a801fbba75509bb1b1965e87
?>