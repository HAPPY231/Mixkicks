<<<<<<< HEAD
<?php

    session_start();
    
    if(isset($_POST['suib'])){
        $wszystko_OK=true;

        $butt = $_POST['nbut'];

        if((strlen($butt)<3) || (strlen($butt)>30))
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwabit']="Nazwa buta musi posiadać </br>od 3 do 30 znaków!";
		}
        
        $cena = $_POST['vcena'];

        if($cena<1 || (strlen($cena)>11) )
		{
			$wszystko_OK=false;
			$_SESSION['e_cena']="Cena buta musi wynosić</br> więcej niż 0 zł";
		}

        $rok_produkcji = $_POST['vrok'];
        
        if($rok_produkcji > date("Y")){
            $wszystko_OK=false;
            $_SESSION['e_rok']="Podaj poprawny rok produkcji";
        }
        if($rok_produkcji==""){
            $wszystko_OK=false;
            $_SESSION['e_rok']="Podaj rok produkcji";
        }

        $marka = $_POST['marka'];

        if((strlen($marka)<2) || (strlen($marka)>30))
		{
			$wszystko_OK=false;
			$_SESSION['e_marka']="Nazwa marki musi posiadać</br> od 3 do 30 znaków!";
		}
        
        $ilosc = $_POST['ilosc'];
        if($ilosc <= 0){
            $wszystko_OK=false;
			$_SESSION['e_ilosc']="Ilość produktu nie może być równa zero";
        }
        if($ilosc > 9999){
            $wszystko_OK=false;
			$_SESSION['e_ilosc']="Ilość produktu nie może być większa niż 9999";
        }

        $nazwa = $_FILES['myfile']['name'];
        $zdjecie = $_FILES['myfile']['type'];
        $fsize = $_FILES['myfile']['size'];

        $fileEXT = explode('.',$nazwa);
        $fileActual = strtolower(end($fileEXT));
        $allowed = array('jpeg', 'png', 'jpg');
        if(!in_array($fileActual,$allowed)){
            $wszystko_OK=false;
            $_SESSION['e_plik']="Nie prawidłowe rozszerzenie pliku";
        }
        
        if($fsize > 10000000){
            $wszystko_OK=false;
            $_SESSION['e_plik']="Twój plik jest za duży ";
        }

        if($wszystko_OK==true){
            $butt = $_POST['nbut'];
            $_SESSION['t_but'] = $butt;
            $_SESSION['t_cena'] = $cena;
            $_SESSION['t_rok'] = $rok_produkcji;
            $_SESSION['t_marka'] = $marka;

           
            include("connect.php");
            
            $sql2 = "SELECT * FROM marka WHERE marka='$_SESSION[t_marka]'";
            $rese = mysqli_query($dbc, $sql2);
            $czy_juz_jest_taka_marka = $rese->num_rows;

            if($czy_juz_jest_taka_marka==0){
                $dodma = "INSERT INTO marka VALUES(NULL,'$_SESSION[t_marka]')";
                $rese = mysqli_query($dbc, $dodma);
            }
			$fileTmpName = $_FILES['myfile']['tmp_name'];
            $_SESSION['nowanazwa'] = uniqid('');
            $_SESSION['bardzmo'] = $_SESSION['nowanazwa'].".jpg";
            $filedestination = "images/".$_SESSION['bardzmo'];
            $move = move_uploaded_file($fileTmpName,$filedestination);
            echo $move;
         
            $dodprod = "INSERT INTO buty VALUES(NULL,'$butt',$cena,'$_SESSION[nowanazwa]',$rok_produkcji,'$marka','$_COOKIE[uzytkownik]',$ilosc)";
            $ressss = mysqli_query($dbc, $dodprod);
            if($ressss){
                header('Location:index.php');
            }
            else{
                echo "Nie udało się";
            }
        }
   
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
        
        <form enctype='multipart/form-data' method="POST" > <center>
            
    <h2>Dodaj swój produkt</h2></br>
    <div class="fdp">
    <label for="myfile">Wybierz zdjęcie produktu:</label></br>
   <center> <input type="file" id="myfile" name="myfile"></br></center>
    
    <?php
			if (isset($_SESSION['e_plik']))
			{
				echo '<div class="errorr">'.$_SESSION['e_plik'].'</div>';
				unset($_SESSION['e_plik']);
				echo "</br>";
			}
			
	?>
    Nazwa:</br>
   <input type="text" name="nbut" placeholder="Podaj nazwę produktu"></br>
   <?php
			if (isset($_SESSION['e_nazwabit']))
			{
				echo '<div class="errorr">'.$_SESSION['e_nazwabit'].'</div>';
				unset($_SESSION['e_nazwabit']);
				echo "</br>";
			}
			
	?>
   Cena:</br>
   <input type="number" name="vcena" placeholder="Podaj cene produktu"></br>
   <?php
			if (isset($_SESSION['e_cena']))
			{
				echo '<div class="errorr">'.$_SESSION['e_cena'].'</div>';
				unset($_SESSION['e_cena']);
				echo "</br>";
			}
			
	?>
   Rok produkcji:</br>
   <input type="number" name="vrok" placeholder="Podaj rok produkcji"></br>
   <?php
			if (isset($_SESSION['e_rok']))
			{
				echo '<div class="errorr">'.$_SESSION['e_rok'].'</div>';
				unset($_SESSION['e_rok']);
				echo "</br>";
			}
			
	?>
   Marka:</br>
   <input type="text" name="marka" placeholder="Podaj markę produktu"></br>
   <?php
			if (isset($_SESSION['e_marka']))
			{
				echo '<div class="errorr">'.$_SESSION['e_marka'].'</div>';
				unset($_SESSION['e_marka']);
				echo "</br>";
			}
			
	?>
       Ilość:</br>
   <input type="text" name="ilosc" placeholder="Podaj ilość produktu"></br>
   <?php
			if (isset($_SESSION['e_ilosc']))
			{
				echo '<div class="errorr">'.$_SESSION['e_ilosc'].'</div>';
				unset($_SESSION['e_ilosc']);
				echo "</br>";
			}
			
	?>
  
    <input type="submit" name="suib" id="submiot" value="Dodaj produkt!">
    </div>
    </center>
    </form>
    </div>
</body>

</html>

=======
<?php

    session_start();
    
    if(isset($_POST['suib'])){
        $wszystko_OK=true;

        $butt = $_POST['nbut'];

        if((strlen($butt)<3) || (strlen($butt)>30))
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwabit']="Nazwa buta musi posiadać </br>od 3 do 30 znaków!";
		}
        
        $cena = $_POST['vcena'];

        if($cena<1 || (strlen($cena)>11) )
		{
			$wszystko_OK=false;
			$_SESSION['e_cena']="Cena buta musi wynosić</br> więcej niż 0 zł";
		}

        $rok_produkcji = $_POST['vrok'];
        
        if($rok_produkcji > date("Y")){
            $wszystko_OK=false;
            $_SESSION['e_rok']="Podaj poprawny rok produkcji";
        }
        if($rok_produkcji==""){
            $wszystko_OK=false;
            $_SESSION['e_rok']="Podaj rok produkcji";
        }

        $marka = $_POST['marka'];

        if((strlen($marka)<2) || (strlen($marka)>30))
		{
			$wszystko_OK=false;
			$_SESSION['e_marka']="Nazwa marki musi posiadać</br> od 3 do 30 znaków!";
		}
        
        $ilosc = $_POST['ilosc'];
        if($ilosc <= 0){
            $wszystko_OK=false;
			$_SESSION['e_ilosc']="Ilość produktu nie może być równa zero";
        }
        if($ilosc > 9999){
            $wszystko_OK=false;
			$_SESSION['e_ilosc']="Ilość produktu nie może być większa niż 9999";
        }

        $nazwa = $_FILES['myfile']['name'];
        $zdjecie = $_FILES['myfile']['type'];
        $fsize = $_FILES['myfile']['size'];

        $fileEXT = explode('.',$nazwa);
        $fileActual = strtolower(end($fileEXT));
        $allowed = array('jpeg', 'png', 'jpg');
        if(!in_array($fileActual,$allowed)){
            $wszystko_OK=false;
            $_SESSION['e_plik']="Nie prawidłowe rozszerzenie pliku";
        }
        
        if($fsize > 10000000){
            $wszystko_OK=false;
            $_SESSION['e_plik']="Twój plik jest za duży ";
        }

        if($wszystko_OK==true){
            $butt = $_POST['nbut'];
            $_SESSION['t_but'] = $butt;
            $_SESSION['t_cena'] = $cena;
            $_SESSION['t_rok'] = $rok_produkcji;
            $_SESSION['t_marka'] = $marka;

           
            include("connect.php");
            
            $sql2 = "SELECT * FROM marka WHERE marka='$_SESSION[t_marka]'";
            $rese = mysqli_query($dbc, $sql2);
            $czy_juz_jest_taka_marka = $rese->num_rows;

            if($czy_juz_jest_taka_marka==0){
                $dodma = "INSERT INTO marka VALUES(NULL,'$_SESSION[t_marka]')";
                $rese = mysqli_query($dbc, $dodma);
            }
			$fileTmpName = $_FILES['myfile']['tmp_name'];
            $_SESSION['nowanazwa'] = uniqid('');
            $_SESSION['bardzmo'] = $_SESSION['nowanazwa'].".jpg";
            $filedestination = "images/".$_SESSION['bardzmo'];
            $move = move_uploaded_file($fileTmpName,$filedestination);
            echo $move;
         
            $dodprod = "INSERT INTO buty VALUES(NULL,'$butt',$cena,'$_SESSION[nowanazwa]',$rok_produkcji,'$marka','$_COOKIE[uzytkownik]',$ilosc)";
            $ressss = mysqli_query($dbc, $dodprod);
            if($ressss){
                header('Location:index.php');
            }
            else{
                echo "Nie udało się";
            }
        }
   
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
        
        <form enctype='multipart/form-data' method="POST" > <center>
            
    <h2>Dodaj swój produkt</h2></br>
    <div class="fdp">
    <label for="myfile">Wybierz zdjęcie produktu:</label></br>
   <center> <input type="file" id="myfile" name="myfile"></br></center>
    
    <?php
			if (isset($_SESSION['e_plik']))
			{
				echo '<div class="errorr">'.$_SESSION['e_plik'].'</div>';
				unset($_SESSION['e_plik']);
				echo "</br>";
			}
			
	?>
    Nazwa buta:</br>
   <input type="text" name="nbut" placeholder="Podaj nazwę produktu"></br>
   <?php
			if (isset($_SESSION['e_nazwabit']))
			{
				echo '<div class="errorr">'.$_SESSION['e_nazwabit'].'</div>';
				unset($_SESSION['e_nazwabit']);
				echo "</br>";
			}
			
	?>
   Cena:</br>
   <input type="number" name="vcena" placeholder="Podaj cene produktu"></br>
   <?php
			if (isset($_SESSION['e_cena']))
			{
				echo '<div class="errorr">'.$_SESSION['e_cena'].'</div>';
				unset($_SESSION['e_cena']);
				echo "</br>";
			}
			
	?>
   Rok produkcji:</br>
   <input type="number" name="vrok" placeholder="Podaj rok produkcji"></br>
   <?php
			if (isset($_SESSION['e_rok']))
			{
				echo '<div class="errorr">'.$_SESSION['e_rok'].'</div>';
				unset($_SESSION['e_rok']);
				echo "</br>";
			}
			
	?>
   Marka:</br>
   <input type="text" name="marka" placeholder="Podaj markę produktu"></br>
   <?php
			if (isset($_SESSION['e_marka']))
			{
				echo '<div class="errorr">'.$_SESSION['e_marka'].'</div>';
				unset($_SESSION['e_marka']);
				echo "</br>";
			}
			
	?>
       Ilość:</br>
   <input type="text" name="ilosc" placeholder="Podaj ilość produktu"></br>
   <?php
			if (isset($_SESSION['e_ilosc']))
			{
				echo '<div class="errorr">'.$_SESSION['e_ilosc'].'</div>';
				unset($_SESSION['e_ilosc']);
				echo "</br>";
			}
			
	?>
  
    <input type="submit" name="suib" id="submiot" value="Dodaj produkt!">
    </div>
    </center>
    </form>
    </div>
</body>

</html>

>>>>>>> 27d91b1dcee6c4b4a801fbba75509bb1b1965e87
