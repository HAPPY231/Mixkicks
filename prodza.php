<?php

    session_start();

    if ($_COOKIE['checksum'] == md5($_COOKIE['uzytkownik']).$_COOKIE['login_dod']){
       header('Location:index.php');
    } 

?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Obsługą na jak najwyższym poziomie. Zawsze możesz liczyć na mega rabaty. Buty, które oferujemy są najmodniejsze- kultowe i na każdą okazję. Nasze produkty cechuje duża wytrzymałość, świetna jakość i wzornictwo." />
    <meta name="keywords" content="buty sportowe męskie, buty sportowe damskie, buty sportowe dziecięce, tanie buty sportowe, tanie zakupy online, tanie obuwie, buty sportowe nike, buty sportowe adidas, buty na każdą okazję, buty sportowe puma, tanie sportowe buty, buty warszawa, obuwie" />
    <title>MIX-KICKS - logowanie</title>
    <meta name="author" content="Kacper Marszycki">
    <link rel="icon" href="images/log-in (1).png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <link rel="stylesheet" href="style.css" type="text/css" />
    
     <script src="java.js"></script>



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
        <a class="cta" href="prodreje.php"><button>Zarejestruj się</button></a>
</header>
    <div style="clear: both;" ></div>
    <div class="container">
        <div class="Zalog">
            <center>
<form action="zaloguj.php" method="post" >
<center>Login:</center> <input type="text"  name="login"/><br>
<center>Hasło:</center> <input type="password"   name="haslo"/><br><br>
<center><input type="submit" value="Zaloguj się"/></center>
    </form>
<?php 
    if(isset($_SESSION['blad'])){
    echo $_SESSION['blad'];
    }

    ?>
    </center>
    </div>
    </div>
    
    </body>
</body>
</html>