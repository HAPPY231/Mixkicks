<?php

    session_start();
    
    include("connect.php");
     $buty = $_SESSION['id_butow'];
    $komentarz = $_POST['komentarz'];
    
  
    $sql = "INSERT INTO komentarze VALUES(NULL,'$_COOKIE[uzytkownik]',$buty,'$komentarz',CURDATE())";
    $res = mysqli_query($dbc, $sql);

   
    if($res){
      header('Location:but.php?buut='.$_SESSION["bucik"].'&nazwa_uzy='.$_SESSION["nazwa_uzy"].'&wartt='.$_SESSION["watrt"]);
    }
   
  
   else{
      $_SESSION['nieudalo'] = "Nie udało się dodaj komentarza"; 
      header('Location:but.php?buut='.$_SESSION["bucik"]);
    }
   
    
    $dbc->close();
?>