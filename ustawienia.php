<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Obsługą na jak najwyższym poziomie. Zawsze możesz liczyć na mega rabaty. Buty, które oferujemy są najmodniejsze- kultowe i na każdą okazję. Nasze produkty cechuje duża wytrzymałość, świetna jakość i wzornictwo." />
    <meta name="keywords" content="buty sportowe męskie, buty sportowe damskie, buty sportowe dziecięce, tanie buty sportowe, tanie zakupy online, tanie obuwie, buty sportowe nike, buty sportowe adidas, buty na każdą okazję, buty sportowe puma, tanie sportowe buty, buty warszawa, obuwie" />
    <title>MIX-KICKS - ustawienia</title>
    <meta name="author" content="Kacper Marszycki">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="images/login (1).png">
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

echo<<<END
    <a class="cta" href="prodza.php"><button>Zaloguj się</button></a>
   
END;
}
?> 
    </header>
    <div style="clear: both;" ></div>
    <div class="containarar">
    <div class="ossna">
            
            <center>
        Login: <?php 
        echo $_COOKIE['uzytkownik']."</br>"; 
        ?></center>
      </div>
        <form action="wyloguj.php" method="post" >
        <center><input type="submit" class="wyg" value="Wyloguj się"/></center>
        </form>
    
    </div> 
    
</body>
</html>