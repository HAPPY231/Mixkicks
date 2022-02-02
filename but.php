<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Obsługą na jak najwyższym poziomie. Zawsze możesz liczyć na mega rabaty. Buty, które oferujemy są najmodniejsze- kultowe i na każdą okazję. Nasze produkty cechuje duża wytrzymałość, świetna jakość i wzornictwo." />
    <meta name="keywords" content="buty sportowe męskie, buty sportowe damskie, buty sportowe dziecięce, tanie buty sportowe, tanie zakupy online, tanie obuwie, buty sportowe nike, buty sportowe adidas, buty na każdą okazję, buty sportowe puma, tanie sportowe buty, buty warszawa, obuwie" />
    <title>MIX-KICKS - produkt</title>
    <meta name="author" content="Kacper Marszycki">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" href="images/sneakersb.png">
     <link rel="stylesheet" href="style.css" type="text/css" />
     <script src="java.js"></script>
     <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script>

  $(function(){
    if($(window).width() < 750) {
        $(".info").css("width","90%");
        $(".zdj").css("width","100%");
        $(".komentarze").css("width","90%");
    }
});

  $(window).resize(function() {
    if ($(window).width() < 750) {
   $(".info").css("width","90%");
   $(".zdj").css("width","100%");
   $(".komentarze").css("width","90%");
  
}
else{
    $(".info").css("width","60%");
    $(".zdj").css("width","500px");
    $(".komentarze").css("width","50%");
}
});
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
        
        <?php 
            include("connect.php"); 
            $_SESSION['bucik'] = $_GET['buut'];
            $_SESSION['nazwa_uzy'] = $_GET['nazwa_uzy'];
            $_SESSION['watrt'] = $_GET['wartt'];
      
            
            $sql = "SELECT * FROM buty WHERE nazwa='$_GET[buut]' AND nazwa_uzy='$_GET[nazwa_uzy]' AND cena='$_GET[wartt]'";
            $res = mysqli_query($dbc, $sql);
            $wszy = mysqli_fetch_all($res, MYSQLI_ASSOC); 

            foreach($wszy as $r){
$wyswietlenie = "UPDATE buty SET wyswietlenia=wyswietlenia+'1' WHERE id = '$r[id]'";
$wys = mysqli_query($dbc, $wyswietlenie);
echo<<<ENDZ

<div class="produkt">
<div class="wy">
<div class="zdj" style="background-image: url(images/{$r["zdjecie"]}.jpg);   background-repeat: no-repeat;  background-size: 100% 100%;  border-radius: 20px; width: 500px; min-width: 275px; height: 450px;"></div>
    <div class="info" id="infos">
    <div class="nzawa">{$r["nazwa"]}</div>
    <div class="cenaa">Cena: {$r["cena"]}zł</div>
    <div class="trzi">
    <div class="rdate"><center id="czenter">Rok produkcji:</br>{$r["rok_produkcji"]}</center></div>
    <div class="rdate"><center id="czenter">Marka:</br>{$r["marka"]}</center></div>
    <div class="rdate"><center id="czenter">Sprzedający:</br>{$r["nazwa_uzy"]}</center></div>
    <div class="rdate"><center id="czenter">Na stanie:</br>{$r["ilosc"]}</center></div>
    </div>

ENDZ;
if($_COOKIE['checksum'] == md5($_COOKIE['uzytkownik']).$_COOKIE['login_dod'] && $_COOKIE['uzytkownik'] != $r['nazwa_uzy']){
echo<<<ENDV
<div class="szub">
<form action="dokosz.php" id="dokosza" method="POST">
<center id="czenter"><input type="number" name="ilosc" min="1" max="$r[ilosc]" style="width:200px;" placeholder="Podaj ilość do dodania">
<input type="submit" value="Dodaj do koszyka"/></center>
</form>
</div>
ENDV;
}
else if($_COOKIE['uzytkownik'] != $r['nazwa_uzy']){
echo<<<ENDG
<center id="cososoos">
<div class="Zaalggaawa">
Aby dodać produkt do koszyka <a href="prodza.php">ZALOGUJ SIĘ</a>
</div>
</center>
ENDG;
}
echo<<<END
</div>


</div></br>


END;

    $_SESSION['id_butow'] = $r['id'];
    }   
    if(isset($_SESSION['udalo sieem'])){
    unset($_SESSION['udalo sieem']);
    echo "<div class='udaloosiem' style='margin-top: 20px;'><center>Dodałeś produkt do koszyka!</center></div>";
    }
    if(isset($_SESSION['nieudalo'])){
    unset($_SESSION['nieudalo']);
    echo "<div class='udaloosiem' style='margin-top: 20px;'><center>Podaj prawidłową ilość</center></div>";
    }

?>
         <div class="komentarze">
<?php
   if($_COOKIE['checksum'] == md5($_COOKIE['uzytkownik']).$_COOKIE['login_dod']){
echo<<<END
<center>
    <div class="dodaawa">
    Dodaj komentarz:
    <form action="komentarz.php" method="post">
    <input type="text" name="komentarz" placeholder="Napisz swoją recenzję" >
    <input type="submit" Value="Dodaj komentarz">
    </form>
    </div>
    </center>
        
END;
    }
        else{
echo<<<END
<center>
<div class="Zaalggaaw">
Aby dodać komentarz <a href="prodza.php">Zaloguj się</a>
</div>
</center>

END;
        }

         ?>
             <center style="margin-top: 20px;margin-bottom: -15px; height: auto;">Recenzje:</center></br>
    <?php

                 $dobko = "SELECT * FROM komentarze WHERE id_butow='$_SESSION[id_butow]' ";
                $resek = mysqli_query($dbc,$dobko);
                $wszt = mysqli_fetch_all($resek,MYSQLI_ASSOC);
                $ilosc_kom = $resek->num_rows;
                if ($ilosc_kom>0) {
foreach ($wszt as $k) {
echo<<<END
                    <div class="komentarz">
                        <div class="cidwa">
                        <div class="uszys">
                            {$k['uzytkownik']}:
                        </div>
                        <div id="opss{$k['id']}" style="background-color: #f5f5f5;margin-bottom: 10px;">
END;
                    $comment = $k['opis'];
                    if(strlen($comment)>500){
                        $stringCut[$k['id']] = substr($comment, 0, 500);
                        $wiecej[$k['id']] = "... <input type='submit' id='more' onclick='wiecej".$k['id']."()' name='dalej' style='background-color:#f5f5f5;color:black;padding:0;font-weight:700;' value='Pokaż więcej'>";
                        $stringmore[$k['id']] = substr($comment,500);
                        $stringcutzw[$k['id']] = $stringCut[$k['id']].$wiecej[$k['id']];
                        $stringall[$k['id']] = $stringCut[$k['id']].$stringmore[$k['id']]." <input type='submit' onclick='mniej".$k['id']."()' id='more' name='dalej' style='background-color:#f5f5f5;color:black;padding:0;font-weight:700;' value='Pokaż mniej'>";
                    
echo<<<END
    <script>
    var stringcutzw{$k['id']} = 
END;
echo json_encode($stringcutzw[$k['id']]);
echo<<<END
;
       var stringall{$k['id']} = 
END;
echo json_encode($stringall[$k['id']]);
echo<<<END
;
       $('#opss{$k['id']}').html(stringcutzw{$k['id']});   

        function mniej{$k['id']}(){
        $('#opss{$k['id']}').html(stringcutzw{$k['id']});  
        }

       function wiecej{$k['id']}(){
        $('#opss{$k['id']}').html(stringall{$k['id']});    
        }
    </script>
END;
      
                    }
                    else{
                        echo $comment;
                    }
   

echo<<<END
                        </div>
                        </div>
                        <div class="dater">
                        {$k['data']}
                        </div>
END;
if ($_COOKIE['uzytkownik']==$k['uzytkownik']) {
echo<<<END
    <div class="ussssssuu">
    <form action="usuwanie.php" style="background-color: white;" method="POST">
    <input type="hidden" name="idkom" value="{$k['id']}"> 
    <input type="submit" style="" Value="Usuń swój komentarz">
    </form>
    </div>
    </div>
END;
}
else{
echo "</div>";
}
}




        }
        else{
echo<<<END
 <div class="dodaawa"><center>Nie ma jeszcze żadnych recenzji</center></div>
 </div>
END;
}
            ?>
      
    </div>
    </div>
    </body>
</html>
