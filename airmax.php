<?php

    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Obsługą na jak najwyższym poziomie. Zawsze możesz liczyć na mega rabaty. Buty, które oferujemy są najmodniejsze- kultowe i na każdą okazję. Nasze produkty cechuje duża wytrzymałość, świetna jakość i wzornictwo." />
    <meta name="keywords" content="buty sportowe męskie, buty sportowe damskie, buty sportowe dziecięce, tanie buty sportowe, tanie zakupy online, tanie obuwie, buty sportowe nike, buty sportowe adidas, buty na każdą okazję, buty sportowe puma, tanie sportowe buty, buty warszawa, obuwie" />
    <title>MIX-KICKS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <link rel="stylesheet" href="style.css" type="text/css" />
     <script src="java.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">

    </script>

    

</head>
<body>
    <header>
        <img class="logo" src="images/Free_Sample_By_Wix.jpg" width="12%" style="min-width:120px;" alt="logo" onclick="myFunction()">
        <nav>
            <ul class="nav_links">
                <li><a href="index.php">Produkty</a></li>
                <li><a href="#">O nas</a></li>
                <li><a href="#">Kontakt</a></li>

            </ul>
        </nav>
<?php
        if($_COOKIE['zalogowany']==true){
echo<<<END
        <div class="konto">
        <div class="koszyk">
        <a class="cta" href="koszyk.php"><button>Twój koszyk</button></a>
        </div>
        <div class="ustawienia">
        <img class="login" src="images/login.png" alt="login" onclick="twojekonto()">
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
    <div class="container">
        
        <?php 
            include("connect.php");
            
            $sql = "SELECT * FROM buty WHERE nazwa='Airmax'";
            $res = mysqli_query($dbc, $sql);
            $wszy = mysqli_fetch_all($res, MYSQLI_ASSOC);
            foreach($wszy as $r){
echo<<<END
<div class="produkt">
<div class="wy">
<div class="zdj" style="background-image: url(images/{$r["zdjecie"]}.jpg); width: 35%; min-width: 275px; height: 450px; background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;"></div>
<div class="info">
    {$r["nazwa"]}</br>
    {$r["cena"]}zł</br>
{$r["rok_produkcji"]}</br>
<form action="dokosz.php" method="POST">
<center><input type="submit" value="Dodaj do koszyka"/></center>
</form>
</div>


</div>
</div>


END;
}
 $_SESSION['id_butow'] = $r['id'];
        ?>
    </body>
</html>