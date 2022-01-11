<?php
    session_start();
    //usuwanie zamówienia
    if(isset($_POST['iddd'])){
    $usun = $_POST['iddd'];

    include("connect.php");

    $sql = "DELETE FROM zamowienia WHERE id='$usun'";
    $res = mysqli_query($dbc, $sql);
    
    if($res){
        unset($_POST['iddd']);
        header("Location:koszyk.php");
        $dbc -> close();
        exit();
    }
    else if(!$res){
            echo "Nie udało się";
    }
    }
   
    //usuwanie komentarza
    if(isset($_POST['idkom'])){
        $iddkom = $_POST['idkom'];

        include("connect.php");

    $sql = "DELETE FROM komentarze WHERE id='$iddkom'";
    $res = mysqli_query($dbc, $sql);
    
    if($res){
        unset($_POST['idkom']);
        header('Location:but.php?buut='.$_SESSION["bucik"].'&nazwa_uzy='.$_SESSION["nazwa_uzy"].'&wartt='.$_SESSION["watrt"]);
        $dbc -> close();
        exit();
    }
    else if(!$res){
        header('Location:but.php?buut='.$_SESSION["bucik"].'&nazwa_uzy='.$_SESSION["nazwa_uzy"].'&wartt='.$_SESSION["watrt"]);
    }
    }
    
    //usuwanie pliku z serwera
    if(isset($_POST['iddde'])){
        include("connect.php");
        $iddkom = $_POST['iddde'];

        $zero = "UPDATE buty SET ilosc=0 WHERE id='$iddkom'";
        $sql2 = "DELETE FROM zamowienia WHERE id_butow='$iddkom'";
        
        $res1 = mysqli_query($dbc, $zero);

        $rese = mysqli_query($dbc, $sql2);


 if($res && $rese){
            
            header('Location:twojeprod.php');
            $dbc -> close();
            exit();
        }
        else if(!$res){
            header('Location:twojeprod.php');
        }

        $dbc -> close();
    }
    //zmiana ceny
    if(isset($_POST['zmiace'])){
        $wszystkook = true;

        $nowace = $_POST['nowawar'];
        if($nowace<=0 ){
            $wszystkook = false;
        }

         $ilosc = $_POST['iloo'];
        if($ilosc<=0){
            $wszystkook = false;
        }
        if($wszystkook=true){
        include("connect.php");
        $doblad = $_POST['doblada'];
        $id = $_POST['zmianaka'];
        
        $sql = "UPDATE buty SET cena='$nowace',ilosc='$ilosc' WHERE id='$id'";
        $res = mysqli_query($dbc, $sql);
        if($res){
            $_SESSION['dobladaa'] = $doblad;
            $_SESSION['zmiana'] = "Udało się zmienić";
            header('Location:twojeprod.php');
        }
        else{
            $_SESSION['zmiana'] = "Nie udało się zmienić";
            header('Location:twojeprod.php');
        }
    }
    else{
        $_SESSION['zmiana'] = "Wprowadź poprawne dane";
        header('Location:twojeprod.php');
    }
        $dbc -> close();
    }
    //Ponowna sprzedaz
   if(isset($_POST['doprz'])){
        
        $wszystkook = true;

        $nowace = $_POST['nowawar'];
        if($nowace<=0 ){
            $wszystkook = false;
        }

        $ilosc = $_POST['iloo'];
        if($ilosc<=0){
            $wszystkook = false;
        }

        if($wszystkook=true){
        include("connect.php");
        $doblad = $_POST['doblada'];

        $id = $_POST['zmianaka'];

        $sql = "UPDATE buty SET cena='$nowace',ilosc='$ilosc' WHERE id='$id'";

        $res = mysqli_query($dbc, $sql);
        
        if($res){
            header('Location:twojeprod.php');
        }
        else{
            $_SESSION['zmiana'] = "Nie udało się zmienić";
            header('Location:twojeprod.php');
        }
        }
        else{
            $_SESSION['zmiana'] = "Wprowadź poprawne dane";
            header('Location:twojeprod.php');
        }
        $dbc -> close();
    }
    //zabezpieczenie
    else if(!isset($_POST['idkom']) && !isset($_POST['iddd']) && !isset($_POST['iddde']) && !isset($_POST['zmiace']) && !isset($_POST['doprz'])){
       header("Location: index.php");
    }
?> 