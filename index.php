<?php

    session_start();

    if (!isset($_POST['marka']) && !isset($_POST['wszy'])) {
        $_SESSION['sql'] = "SELECT * FROM buty WHERE ilosc>0";
    }
   if(isset($_POST['marka'])){
       $marka = $_POST['marka'];
       $_SESSION['sql'] = "SELECT * FROM buty WHERE ilosc>0 AND marka='$marka'";
   }
   if(isset($_POST['wysz'])){
    $wszy = $_POST['wysz'];
    $_SESSION['sql'] = "SELECT * FROM buty WHERE ilosc>0 AND LOCATE('$wszy',nazwa)";
   }
   if(isset($_POST['usunfi'])){
    unset($_POST['marka']);
    unset($_POST['usunfi']);
    header("Location:index.php");
   }
   if(isset($_POST['usunna'])){
    unset($_POST['wysz']);
    unset($_POST['usunna']);
    header("Location:index.php");
   }
?>
<!DOCTYPE html>

<html lang="pl">

<head>

	<meta charset="UTF-8">

	<meta name="description" content="Obsługą na jak najwyższym poziomie. Zawsze możesz liczyć na mega rabaty. Buty, które oferujemy są najmodniejsze- kultowe i na każdą okazję. Nasze produkty cechuje duża wytrzymałość, świetna jakość i wzornictwo." />

    <meta name="keywords" content="buty sportowe męskie, buty sportowe damskie, buty sportowe dziecięce, tanie buty sportowe, tanie zakupy online, tanie obuwie, buty sportowe nike, buty sportowe adidas, buty na każdą okazję, buty sportowe puma, tanie sportowe buty, buty warszawa, obuwie" />

    <title>MIX-KICKS</title>
    <meta name="author" content="Kacper Marszycki">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="images/sneakers (2).png">

    
     <link rel="stylesheet" href="style.css" type="text/css" />

     <script src="java.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

     <script>
         
     </script>
</head>
<body>
    <header>
        <img class="logo" src="images/Free_Sample_By_Wix.jpg" width="12%" style="min-width:120px;" alt="logo" onclick="myFunction()">
        <nav>
            <ul class="nav_links">
                <li><a href="index.php">Produkty</a></li>
                <li><a href="onas.php">O nas</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>
            </ul>

        </nav>
        <?php

if ($_COOKIE['checksum'] == md5($_COOKIE['uzytkownik']).$_COOKIE['login_dod']){
echo<<<END
<div class="konto">
<div class="koszyk">
<a class="cta" href="koszyk.php"><button>Twój koszyk</button></a>
</div>
<div class="dropdown">
<img class="login" src="images/login.png" alt="login" >
<div class="dropdown-content">
    <a href="dodajprodukt.php">Dodaj produkt</a>
    <a href="twojeprod.php">Moja sprzedaż</a>
    <a href="ustawienia.php">Ustawienia</a>
    
</div>
</div>
END;
    }
else{

echo<<<END
    <div class="floata">
    <a class="cta" href="prodza.php" ><button style="margin: 4px;">Zaloguj się</button></a>
    <a class="cta" href="prodreje.php"><button>Zarejestruj się</button></a>
    </div>
END;

}
?>
       

    </header>

    <div style="clear: both;" ></div>
    <div class="container">
 <!-- <div class="slider"> 1900px X 500px 
        <input type="hidden">
      </div>
    <script>
        var x = 0;
      setInterval(function(){
        x++;
        if(x>4){
            x=1;
        }
        
      },3000);  
    </script> -->

    <div class="dwaaa">
    <div class="filtr">
        <form id="ffiltr" method="post">
        <label for="marka"><div class="wybma">Wybierz markę: &nbsp;</div></label>
<select name="marka" id="marka">
<?php 
    include("connect.php");
        $sqf = "SELECT * FROM buty";
        $siup = mysqli_query($dbc,$sqf);
        $wszy = mysqli_fetch_all($siup,MYSQLI_ASSOC);
        foreach($wszy as $r){
            if($r['ilosc']>0){
        echo "<option value='{$r['marka']}'>{$r['marka']}</option>";
            }
        }
    
?>
</select>
<input type="submit" value="Filtruj">
<?php 

if(isset($_POST['marka'])){
echo<<<END
<input type="submit" name="usunfi" style="margin-left: 5px;" value="Pokaż wszystko">
END;    
}

?>
        </form> 
      </div>
      <div class="wyszukiwanie">
        <form id="wssz" method="post">
            <input type="text" name="wysz" style="color: black;" placeholder="Znajdź po nazwie">
            <input type="submit" value="Wyszukaj">
            <?php 

if(isset($_POST['wysz'])){
echo<<<END
<input type="submit" name="usunna" style="margin-left: 5px;" value="Pokaż wszystko">
END;    
}

?>
        </form> 
      </div>
      </div>
      <div style="clear: both; width: 100%; height:1px;"></div>

    
    <div style="clear: both; width: 100%; height:1px;"></div>
   
        <?php 
            
            include("connect.php");
        

            $res = mysqli_query($dbc, $_SESSION['sql']);

            $wszy = mysqli_fetch_all($res, MYSQLI_ASSOC);

            foreach($wszy as $r){
                   $popna = urlencode($r['nazwa']);
                   $_SESSION["popna"] = $popna;
echo<<<END
<form action="but.php" method="get" >
   <div class="prod">
   <a href="but.php?buut={$_SESSION["popna"]}&nazwa_uzy={$r['nazwa_uzy']}&wartt={$r['cena']}"><div class="zdj" style="background-image: url(images/{$r["zdjecie"]}.jpg); width: 300px; height: 300px; background-repeat: no-repeat;  background-size: 100% 100%;">
   </div></a>
   <a href="but.php?buut={$_SESSION["popna"]}&nazwa_uzy={$r['nazwa_uzy']}&wartt={$r['cena']}"> <div class="nazwaa"> {$r["nazwa"]}</div></a>
    <div class="cena" >{$r["cena"]}zł</div>
    </div>
    </form>
END;

}
    
    ?>
    <div style="clear:both"></div>
    </div>
    </div>
  
</body>

</html>
