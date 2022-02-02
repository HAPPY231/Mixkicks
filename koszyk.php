<<<<<<< HEAD

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Obsługą na jak najwyższym poziomie. Zawsze możesz liczyć na mega rabaty. Buty, które oferujemy są najmodniejsze- kultowe i na każdą okazję. Nasze produkty cechuje duża wytrzymałość, świetna jakość i wzornictwo." />
    <meta name="keywords" content="buty sportowe męskie, buty sportowe damskie, buty sportowe dziecięce, tanie buty sportowe, tanie zakupy online, tanie obuwie, buty sportowe nike, buty sportowe adidas, buty na każdą okazję, buty sportowe puma, tanie sportowe buty, buty warszawa, obuwie" />
    <title>MIX-KICKS - koszyk</title>
    <meta name="author" content="Kacper Marszycki">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="images/shopping-bag.png">
     <link rel="stylesheet" href="style.css" type="text/css" />
     <script src="java.js"></script>
    



</head>
<body>
    <header>
        <img class="logo" src="images/Free_Sample_By_Wix.jpg" width="12%" style="min-width:120px;"
          alt="logo" onclick="myFunction()">
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
    header("Location:index.php");
}
?> 
    </header>
    <div style="clear: both;" ></div>
    <div class="containeer">
        <center>
    <?php 
            
            include("connect.php");
            $_SESSION['wartosc'] = 0;
            $iloscraz = 0;
            $sql = "SELECT * FROM zamowienia WHERE uzytkownik='$_COOKIE[uzytkownik]'";

            $res = mysqli_query($dbc, $sql);

            $wszy = mysqli_fetch_all($res, MYSQLI_ASSOC);

            foreach($wszy as $r){
                
                $sql2 = "SELECT * FROM buty WHERE id='$r[id_butow]'";
                $rese = mysqli_query($dbc, $sql2);
                $wszye = mysqli_fetch_all($rese, MYSQLI_ASSOC);
                
                foreach($wszye as $b){
                    $iloscraz = $iloscraz + 1;
                    ${"nazwa_uzys".$iloscraz} = $b['nazwa_uzy'];
                    ${"wartos".$iloscraz} = $b['cena']*$r['ilosc'];
                    
echo<<<END
   <div class="prodtw">
        <div class="flex">
           
            <div class="zdje" style="background-image: url(images/{$b["zdjecie"]}.jpg); width: 300px; height: 100%; background-repeat: no-repeat;  background-size: 100% 100%; ">
            </div>
            <div class="ccccsscc">
              <div class="kol">
                {$b["nazwa"]}</br>
                </div>
            <div class="czycxtk">
            <div class="nace">  
                Cena: {$b["cena"]}zł
                </div>
                
                <div class="dwaac">
                Sprzedający:</br>
               {$b["nazwa_uzy"]}
                </div>
                <div class="dwaac">
                Ilość:</br>
               {$r["ilosc"]}
                </div>
                </div>
            </br>

            <div class="usuwe">
            <div class="usu">
            <form action="usuwanie.php" method="post" class="form" >
                    <input type="hidden" name="iddd" value="{$r["id"]}">
                    <input type="submit" name="dousu" value="Usuń">
             </form> 
             </div>
             </div>
             </div>
            
        </div>
    </div>
            
        
   </br>
   
END;     
     
}

}

    $sqqql = "SELECT * FROM zamowienia WHERE uzytkownik='$_COOKIE[uzytkownik]'";
    $reess = mysqli_query($dbc,$sqqql);
    $ile_zam = $reess->num_rows;
    if($ile_zam>0){
      
        for($i=1; $i<=$ile_zam;$i++){
            $wsz = ${"wartos".$i};
             $wartos = $wartos + $wsz; 
        }
         
echo<<<END

  <div class="dwaaaa">
      <div class="wartttsc">
        <center >Wartość koszyka:</br>{$wartos}zł</center>
      </div>
      <div class="wyszukiwcnie">
     
        <form action="usuwaniewszy.php" method="post">
            <input type="submit" value="Usuń wszystkie produkty" >
        </form> 
        <form id="kup" action="kup.php" method="post">
            <input type="hidden" name="wartosck" value="{$wartos}">
            <input type="hidden" name="nazwa_uzys" value="{$nazwa_uzy1}">
            <input type="submit" value="Kup" >
        </form> 
        
      </div>
      </div>

END;
    }
    else if($ile_zam===0){
    echo '<div class="dodaawa">NIE MASZ ZAMÓWIEŃ</div>';
    }

    ?>
  
</center>
</div>

</body>
=======

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Obsługą na jak najwyższym poziomie. Zawsze możesz liczyć na mega rabaty. Buty, które oferujemy są najmodniejsze- kultowe i na każdą okazję. Nasze produkty cechuje duża wytrzymałość, świetna jakość i wzornictwo." />
    <meta name="keywords" content="buty sportowe męskie, buty sportowe damskie, buty sportowe dziecięce, tanie buty sportowe, tanie zakupy online, tanie obuwie, buty sportowe nike, buty sportowe adidas, buty na każdą okazję, buty sportowe puma, tanie sportowe buty, buty warszawa, obuwie" />
    <title>MIX-KICKS - koszyk</title>
    <meta name="author" content="Kacper Marszycki">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="images/shopping-bag.png">
     <link rel="stylesheet" href="style.css" type="text/css" />
     <script src="java.js"></script>
    



</head>
<body>
    <header>
        <img class="logo" src="images/Free_Sample_By_Wix.jpg" width="12%" style="min-width:120px;"
          alt="logo" onclick="myFunction()">
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
    header("Location:index.php");
}
?> 
    </header>
    <div style="clear: both;" ></div>
    <div class="containeer">
        <center>
    <?php 
            
            include("connect.php");
            $_SESSION['wartosc'] = 0;
            $iloscraz = 0;
            $sql = "SELECT * FROM zamowienia WHERE uzytkownik='$_COOKIE[uzytkownik]'";

            $res = mysqli_query($dbc, $sql);

            $wszy = mysqli_fetch_all($res, MYSQLI_ASSOC);

            foreach($wszy as $r){
                
                $sql2 = "SELECT * FROM buty WHERE id='$r[id_butow]'";
                $rese = mysqli_query($dbc, $sql2);
                $wszye = mysqli_fetch_all($rese, MYSQLI_ASSOC);
                
                foreach($wszye as $b){
                    $iloscraz = $iloscraz + 1;
                    ${"nazwa_uzys".$iloscraz} = $b['nazwa_uzy'];
                    ${"wartos".$iloscraz} = $b['cena']*$r['ilosc'];
                    
echo<<<END
   <div class="prodtw">
        <div class="flex">
           
            <div class="zdje" style="background-image: url(images/{$b["zdjecie"]}.jpg); width: 300px; height: 100%; background-repeat: no-repeat;  background-size: 100% 100%; ">
            </div>
            <div class="ccccsscc">
              <div class="kol">
                {$b["nazwa"]}</br>
                </div>
            <div class="czycxtk">
            <div class="nace">  
                Cena: {$b["cena"]}zł
                </div>
                
                <div class="dwaac">
                Sprzedający:</br>
               {$b["nazwa_uzy"]}
                </div>
                <div class="dwaac">
                Ilość:</br>
               {$r["ilosc"]}
                </div>
                </div>
            </br>

            <div class="usuwe">
            <div class="usu">
            <form action="usuwanie.php" method="post" class="form" >
                    <input type="hidden" name="iddd" value="{$r["id"]}">
                    <input type="submit" name="dousu" value="Usuń">
             </form> 
             </div>
             </div>
             </div>
            
        </div>
    </div>
            
        
   </br>
   
END;     
     
}

}

    $sqqql = "SELECT * FROM zamowienia WHERE uzytkownik='$_COOKIE[uzytkownik]'";
    $reess = mysqli_query($dbc,$sqqql);
    $ile_zam = $reess->num_rows;
    if($ile_zam>0){
      
        for($i=1; $i<=$ile_zam;$i++){
            $wsz = ${"wartos".$i};
             $wartos = $wartos + $wsz; 
        }
         
echo<<<END

  <div class="dwaaaa">
      <div class="wartttsc">
        <center >Wartość koszyka:</br>{$wartos}zł</center>
      </div>
      <div class="wyszukiwcnie">
     
        <form action="usuwaniewszy.php" method="post">
            <input type="submit" value="Usuń wszystkie produkty" >
        </form> 
        <form id="kup" action="kup.php" method="post">
            <input type="hidden" name="wartosck" value="{$wartos}">
            <input type="hidden" name="nazwa_uzys" value="{$nazwa_uzy1}">
            <input type="submit" value="Kup" >
        </form> 
        
      </div>
      </div>

END;
    }
    else if($ile_zam===0){
    echo '<div class="dodaawa">NIE MASZ ZAMÓWIEŃ</div>';
    }

    ?>
  
</center>
</div>

</body>
>>>>>>> 27d91b1dcee6c4b4a801fbba75509bb1b1965e87
</html>