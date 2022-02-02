<?php
session_start();
if(!isset($_POST['stan'])){
    $_POST['stan'] = "Trwajace";
}
$_SESSION['pstan'] = $_POST['stan'];

if($_SESSION['pstan']=="Trwajace"){
    $_SESSION['what'] = "SELECT * FROM buty WHERE nazwa_uzy='$_COOKIE[uzytkownik]' AND ilosc>0";
}

if($_SESSION['pstan']=="Zakonczone"){
    $_SESSION['what'] = "SELECT * FROM buty WHERE nazwa_uzy='$_COOKIE[uzytkownik]' AND ilosc=0";
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Obsługą na jak najwyższym poziomie. Zawsze możesz liczyć na mega rabaty. Buty, które oferujemy są najmodniejsze- kultowe i na każdą okazję. Nasze produkty cechuje duża wytrzymałość, świetna jakość i wzornictwo." />
    <meta name="keywords" content="buty sportowe męskie, buty sportowe damskie, buty sportowe dziecięce, tanie buty sportowe, tanie zakupy online, tanie obuwie, buty sportowe nike, buty sportowe adidas, buty na każdą okazję, buty sportowe puma, tanie sportowe buty, buty warszawa, obuwie" />
    <title>MIX-KICKS - twoje produkty</title>
    <meta name="author" content="Kacper Marszycki">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="images/shopping-bag.png">
     <link rel="stylesheet" href="style.css" type="text/css" />
     <script src="java.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script>
         $(function(){
            if($(window).width() < 765) {
        $(".prodtw").css("height","520px");
        $(".flex").css({"width":"auto","flex-direction":"column","margin-left":"auto","margin-right":"auto"});
        $(".ccccsscc").css({"margin-left":"auto","margin-right":"auto"});
            }
    });
    $(window).resize(function() {
    if ($(window).width() < 765) {
        $(".prodtw").css("height","520px");
        $(".flex").css({"width":"100%","flex-direction":"column","margin-left":"auto","margin-right":"auto"});
         $(".zdje").css("width","100%");
        $(".ccccsscc").css({"margin-left":"auto","margin-right":"auto"});
  
}
else{
    $(".prodtw").css("height","300px");
        $(".flex").css({"width":"100%","flex-direction":"row","margin-left":"0","margin-right":"0"});
        $(".ccccsscc").css({"margin-left":"0","margin-right":"0"});
}
});
</script>
</head>
<body >


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
    <div class="zak">
        <div class="nvo">
            <center>
            <ul class="rozp">
                <li><form method="POST" name="stek"><input type="submit" name="stan" placholder="Trwające" value="Trwajace"></li>
                <li><input type="submit" name="stan" placholder="Zakończone" value="Zakonczone"></form></li>
            </ul>
        </center>
        </div>
<div class="containeer">
        <center>
    <?php 
            $doblad = 1;
            include("connect.php");
    
            $sql = $_SESSION['what'];

            $res = mysqli_query($dbc, $sql);

            $wszy = mysqli_fetch_all($res, MYSQLI_ASSOC);
            
            foreach($wszy as $r){
            $dlug = strlen($r['cena']);
            $ilsoc = strlen($r['ilosc']);

echo<<<END
           
   <div class="prodtw">
        <div class="flex">
           
            <div class="zdje" style="background-image: url(images/{$r["zdjecie"]}.jpg); width: 300px; height: 100%; min-width: 150px; background-repeat: no-repeat;  background-size: 100% 100%; ">
            </div>
            <div class="ccccsscc">
        
            <div class="innea">  
             {$r["nazwa"]}  </br>
            <div class="shti">
                
                <form action="usuwanie.php" style="width: 100%; display:flex; flex-direction: column;" method="post" class="form" >
              
                <div class="fm">
                Cena: <input type="number"  id="warts" min="0" max="999999999" size="{$dlug}" name="nowawar" value="{$r["cena"]}">
                </div>
                <div class="fm">
                Ilość: <input type="number" id="ilosc" min="0" max="99999" size="{$ilsoc}" name="iloo" value="{$r["ilosc"]}">
                </div>
                  <div class="usua">
                    <input type="hidden" name="zmianaka" value="{$r["id"]}">
                    <input type="hidden" name="doblada" value="{$doblad}">
END;
if($r['ilosc']>0){
echo<<<END
 <input type="submit" name="zmiace" style="margin: 10px;"value="Zmień">
                   
END;
}
if (isset($_SESSION['zmiana']) && $_SESSION['dobladaa'] == $doblad)
{
    echo '<div class="error" style="background-color: #f5f5f5">'.$_SESSION['zmiana'].'</div>';
    unset($_SESSION['zmiana']);
    unset($_SESSION['dobladaa']);
    echo "</br>";
}

if($r['ilosc']>0){
    echo "</form>";
}
      
echo<<<ENDS
             </div>
                </div>
              
                </div>
            </br>

            <div class="usuwe">
            <div class="usu">
          
             <div class="usub">
ENDS;
if($r['ilosc']==0){
echo<<<KONIEC
                <input type="hidden" name="doprz" value="{$r["id"]}">
                <input type="submit" name="pono"  value="Ponów sprzedaż">
                </form> 
KONIEC;
}
if($r['ilosc']>0){
echo<<<KONIEC
            <form action="usuwanie.php" method="post" class="form" >
            <input type="hidden" name="iddde" value="{$r["id"]}">
            <input type="submit" name="dousua"  value="Zakończ sprzedaż">
            </form> 
KONIEC;
}
echo<<<to
            </div>
            </div>
            </div>
            </div>
            
        </div>
    </div>
       
       
        
   </br>
to;
$doblad = $doblad + 1;
}
    if($_POST['stan']=="Zakonczone"){
        $ileza = $res->num_rows;
        if($ileza==0){
            echo '<div class="dodaawa">Nie masz zakończonych transakcji</div>';
        }
    }
    if($_POST['stan']=="Trwajace"){
        $ileza = $res->num_rows;
        if($ileza==0){
            echo '<div class="dodaawa">Nie masz trwających transakcji</div>';
        }
    }
    ?>
  
</center>
</div>
    </div>
   
</body>
</html>