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
    <meta name="author" content="Kacper Marszycki">
    <link rel="icon" href="images/search.png">
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
<div class="ustawienia">
<img class="login" src="images/login.png" alt="login" onclick="twojekonto()">
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

      

        <?php 
            
            include("connect.php");

            if(isset($_POST['marka'])){
                $marka = filter_input(INPUT_POST, 'marka', FILTER_SANITIZE_STRING);

                $sql = "SELECT * FROM buty WHERE marka='$marka'";

            $res = mysqli_query($dbc, $sql);

            $wszy = mysqli_fetch_all($res, MYSQLI_ASSOC);

            foreach($wszy as $r){
                $popna = urlencode($r['nazwa']);
echo<<<END
<form action="but.php" method="get">
   <div class="prod">
   <a href="but.php?buut={$popna}"><div class="zdj" style="background-image: url(images/{$r["zdjecie"]}.jpg); width: 300px; height: 300px; background-repeat: no-repeat;  background-size: 100% 100%;">
   </div></a>
   <a href="but.php?buut={$popna}"> <div class="nazwaa"> {$r["nazwa"]}</div></a>
    <div class="cena" >{$r["cena"]}zł</div>
    </div>
    </form>
END;

}
}
            
            



    if(isset($_POST["wysz"])){
            $but = $_POST["wysz"];
            $sql = "SELECT * FROM buty WHERE LOCATE('$but',nazwa);";

            $res = mysqli_query($dbc, $sql);

            $wszy = mysqli_fetch_all($res, MYSQLI_ASSOC);

            foreach($wszy as $r){
                $popna = urlencode($r['nazwa']);
echo<<<END
<form action="but.php" method="get" >
   <div class="prod">
   <a href="but.php?buut={$popna}"><div class="zdj" style="background-image: url(images/{$r["zdjecie"]}.jpg); width: 300px; height: 300px; background-repeat: no-repeat, repeat; background-size: cover;">
   </div></a>
   <a href="but.php?buut={$popna}"> <div class="nazwaa"> {$r["nazwa"]}</div></a>
    <div class="cena" >{$r["cena"]}zł</div>
    </div>
    </form>
END;

}
}
    ?>

    </body>

</body>

</html>