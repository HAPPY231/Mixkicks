<<<<<<< HEAD
<?php

    session_start();
    
    require_once "connect.php";
   $ilosc = $_POST['ilosc'];
    $sql = "INSERT INTO zamowienia VALUES (NULL,'$_COOKIE[uzytkownik]','$_SESSION[id_butow]',$ilosc)";
  
    $res = mysqli_query($dbc, $sql);

    if($res){  
      $_SESSION['udalo sieem'] = true; 
      header('Location:but.php?buut='.$_SESSION["bucik"].'&nazwa_uzy='.$_SESSION["nazwa_uzy"].'&wartt='.$_SESSION["watrt"]);
    }else if(!$res){
      $_SESSION['nieudalo'] = true; 
      header('Location:but.php?buut='.$_SESSION["bucik"].'&nazwa_uzy='.$_SESSION["nazwa_uzy"].'&wartt='.$_SESSION["watrt"]);
    }
    $dbc->close();


=======
<?php

    session_start();
    
    require_once "connect.php";
   $ilosc = $_POST['ilosc'];
    $sql = "INSERT INTO zamowienia VALUES (NULL,'$_COOKIE[uzytkownik]','$_SESSION[id_butow]',$ilosc)";
  
    $res = mysqli_query($dbc, $sql);

    if($res){  
      $_SESSION['udalo sieem'] = true; 
      header('Location:but.php?buut='.$_SESSION["bucik"].'&nazwa_uzy='.$_SESSION["nazwa_uzy"].'&wartt='.$_SESSION["watrt"]);
    }else if(!$res){
      $_SESSION['nieudalo'] = true; 
      header('Location:but.php?buut='.$_SESSION["bucik"].'&nazwa_uzy='.$_SESSION["nazwa_uzy"].'&wartt='.$_SESSION["watrt"]);
    }
    $dbc->close();


>>>>>>> 27d91b1dcee6c4b4a801fbba75509bb1b1965e87
?>