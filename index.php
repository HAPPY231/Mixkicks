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
    



</head>
<body>
    <header>
        <img class="logo" src="images/Free_Sample_By_Wix.jpg" width="12%" style="min-width:120px;" alt="logo">
        <nav>
            <ul class="nav_links">
                <li><a href="#">Produkty</a></li>
                <li><a href="#">O nas</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>

            </ul>
        </nav>
        <a class="cta" href="#"><button>Zaloguj się</button></a>
    </header>
    <div style="clear: both;" ></div>
    <div class="container">
        
        <?php 
            include("connect.php");

            $sql = "SELECT * FROM buty";
            $res = mysqli_query($dbc, $sql);
            $wszy = mysqli_fetch_all($res, MYSQLI_ASSOC);
            foreach($wszy as $r){
echo<<<END
<form action="" method="post" >
   <div class="prod">
   
   <a href="{$r["zdjecie"]}.php"><div class="zdj" style="background-image: url(images/{$r["zdjecie"]}.jpg); width: 300px; height: 300px; background-repeat: no-repeat, repeat; background-size: cover;">
   </div></a>
   <a href="{$r["zdjecie"]}.php" > <div class="nazwaa"> {$r["nazwa"]}</div></a>
    <div class="cena" >{$r["cena"]}zł</div>
    </div>
    </form>
END;
}

    ?>
    </body>
</body>
</html>