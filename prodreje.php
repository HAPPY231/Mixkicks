<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Obsługą na jak najwyższym poziomie. Zawsze możesz liczyć na mega rabaty. Buty, które oferujemy są najmodniejsze- kultowe i na każdą okazję. Nasze produkty cechuje duża wytrzymałość, świetna jakość i wzornictwo." />
    <meta name="keywords" content="buty sportowe męskie, buty sportowe damskie, buty sportowe dziecięce, tanie buty sportowe, tanie zakupy online, tanie obuwie, buty sportowe nike, buty sportowe adidas, buty na każdą okazję, buty sportowe puma, tanie sportowe buty, buty warszawa, obuwie" />
    <title>MIX-KICKS - rejestracja</title>
	<meta name="author" content="Kacper Marszycki">
    <link rel="icon" href="images/log-in (1).png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <link rel="stylesheet" href="style.css" type="text/css" />
    
     <script src="java.js"></script>
	 <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<?php

	session_start();
	
	if ($_COOKIE['checksum'] == md5($_COOKIE['uzytkownik']).$_COOKIE['login_dod']){
		header('Location:index.php');
	} 

	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$nick = $_POST['login'];
		
		//Sprawdzenie długości nicka
		if ((strlen($nick)<3) || (strlen($nick)>30))
		{
			$wszystko_OK=false;
echo<<<END

			<script>
			$(function(){
				$("#login").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});

			});
			</script>

END;
			$_SESSION['e_loginn']=$_SESSION['e_loginn']."Nick musi posiadać od 3 do 30 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
echo<<<END

			<script>
			$(function(){
				$("#login").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});

			});
			</script>

END;
			$_SESSION['e_loginn']="<center>Nick może składać się tylko z liter i cyfr </br>(bez polskich znaków)</center>";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			echo<<<END
		
			<script>
			$(function(){
				$("#email").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});

			});
			</script>

END;
			$_SESSION['e_emaill']="<center>Podaj poprawny adres e-mail!</center>";
		}
		
	

		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>30))
		{
			$wszystko_OK=false;
			echo<<<END
		
			<script>
			$(function(){
				$(".haslo1").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});

			});
			</script>

END;
			$_SESSION['e_haslo']="<center>Hasło musi posiadać</br> od 8 do 30 znaków!</center>";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			echo<<<END
		
			<script>
			$(function(){
				$("#haslo1").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});

			});
			</script>

END;
			$_SESSION['e_haslo']="<center>Podane hasła nie są identyczne!</center>";
		}	

		$miejscowosc = $_POST['miejscowosc'];
		if ((strlen($miejscowosc)<4) || (strlen($miejscowosc)>100))
		{
			$wszystko_OK=false;
			echo<<<END
		
			<script>
			$(function(){
				$("#miejscowosc").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});

			});
			</script>

END;
			$_SESSION['e_miejscowosc']="<center>Wpisz poprawną nazwę miejscowości!</center>";
		}

		
			$ulica = $_POST['Ulica'];
			if ((strlen($ulica)<4) || (strlen($ulica)>100))
			{
			$wszystko_OK=false;
echo<<<END
		
			<script>
			$(function(){
				$("#ulica").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});

			});
			</script>

END;
			$_SESSION['e_ulica']="<center>Wpisz poprawną nazwę ulicy!</center>";
		}
		$nr_domu = $_POST['nr_domu'];
		if ((strlen($nr_domu)<1) || (strlen($nr_domu)>40))
		{
		$wszystko_OK=false;
echo<<<END
	
		<script>
		$(function(){
			$("#nr_domu").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});

		});
		</script>

END;
		$_SESSION['e_domu']="<center>Wpisz poprawny numer domu!</center>";
	}

	$kod_pocztowy = $_POST['kod_pocztowy'];
		if (strlen($kod_pocztowy)!=6)
		{
		$wszystko_OK=false;
echo<<<END
	
		<script>
		$(function(){
			$("#kod_pocztowy").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});

		});
		</script>

END;
		$_SESSION['e_pocztowy']="<center>Wpisz poprawny kod pocztowy!</center>";
	}

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="<center>Potwierdź akceptację regulaminu!</center>";
		}				
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['e_login'] = $nick;
		$_SESSION['e_email'] = $email;
		$_SESSION['e_haslo1'] = $haslo1;
		$_SESSION['e_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['e_regulamin'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			
			if ($dbc->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $dbc->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
echo<<<END
		
					<script>
					$(function(){
						$("#email").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});
		
					});
					</script>
		
END;
					$_SESSION['e_emaill']="<center>Istnieje już konto przypisane do tego adresu e-mail!</center>";
				}		

				//Czy nick jest już zarezerwowany?
				$rezultat = $dbc->query("SELECT id FROM uzytkownicy WHERE login='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
echo<<<END
		
					<script>
					$(function(){
						$("#login").css({"border-color":"#F90716","border-weight":"1px","border-style":"solid"});
		
					});
					</script>
		
END;
					$_SESSION['e_loginn']="</center>Istnieje już gracz o takim nicku! Wybierz inny.</center>";
				}
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($dbc->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email','$miejscowosc','$ulica','$nr_domu','$kod_pocztowy')"))
					{
						$_SESSION["udalosieza"] = true;
						$_SESSION['udanarejestracja']=true;
						unset($_SESSION['e_login']);
						unset($_SESSION['e_email']);
						unset($_SESSION['e_haslo1']);
						unset($_SESSION['e_haslo2']);
						header('Location: index.php');
					}
					else
					{
						throw new Exception($dbc->error);
					}
					
				}
				
				$dbc->close();
			}
			
		}
		catch(Exception $e)
		{
			header("Location:index.php");
		}
		
	}
	
	
?>
	<script>
		$(function(){
			if($(".Zalog").height() > 800) {
			$(".Zalog").css("padding-top","100px");
			}
			else{
				$(".Zalog").css("padding-top","50px");
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
		<a class="cta" href="prodza.php"><button>Zaloguj się</button></a>
</header>
    <div style="clear: both;" ></div>
    <div class="container">
        <div class="Zalog">
<form method="post">
<div class="halo">
<div class="loha">
<center>Login:</center>  <center><input type="text" name="login" id="login" /></center><br />
		
		<?php
			if (isset($_SESSION['e_loginn']))
			{
				echo '<div class="error">'.$_SESSION['e_loginn'].'</div>';
				unset($_SESSION['e_loginn']);
				echo "</br>";
			}
			
		?>
		
		<center>E-mail:</center>  <center><input type="text" name="email" id="email" /></center><br />
		
		<?php
			if (isset($_SESSION['e_emaill']))
			{
				echo '<div class="error">'.$_SESSION['e_emaill'].'</div>';
				unset($_SESSION['e_emaill']);
			}
		?>
		
		<center>Twoje hasło:</center>  <center><input type="password"  name="haslo1" class="haslo1"/></center><br />
		
		<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>		
		
		<center>Powtórz hasło:</center> <center><input type="password"  name="haslo2" class="haslo1"/></center><br />
</div>		
<div class="loha">
		<center>Miejscowość:</center>  <center><input type="text"  name="miejscowosc" id="miejscowosc"/></center><br />
		
		<?php
			if (isset($_SESSION['e_miejscowosc']))
			{
				echo '<div class="error">'.$_SESSION['e_miejscowosc'].'</div>';
				unset($_SESSION['e_miejscowosc']);
			}
		?>	

		<center>Ulica:</center>  <center><input type="text"  name="Ulica" id="ulica"/></center><br />
		
		<?php
			if (isset($_SESSION['e_ulica']))
			{
				echo '<div class="error">'.$_SESSION['e_ulica'].'</div>';
				unset($_SESSION['e_ulica']);
			}
		?>	

		<center>Numer domu:</center>  <center><input type="text"  name="nr_domu" id="nr_domu"/></center><br />
		
		<?php
			if (isset($_SESSION['e_domu']))
			{
				echo '<div class="error">'.$_SESSION['e_domu'].'</div>';
				unset($_SESSION['e_domu']);
			}
		?>	

		<center>Kod pocztowy:</center>  <center><input type="text"  name="kod_pocztowy" id="kod_pocztowy"/></center><br />
		
		<?php
			if (isset($_SESSION['e_pocztowy']))
			{
				echo '<div class="error">'.$_SESSION['e_pocztowy'].'</div>';
				unset($_SESSION['e_pocztowy']);
			}
		?>

		
		</div>
	</div>
	<div class="regulav">
	<label>
			<input type="checkbox" name="regulamin" <?php
			if (isset($_SESSION['e_regulamin']))
			{
				echo "checked";
				unset($_SESSION['e_regulamin']);
			}
				?>/>       Akceptuję regulamin
		</label>
		
		<?php
			if (isset($_SESSION['e_regulamin']))
			{
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
		?>	
		</div>
		<br />
		<center><input type="submit" value="Zarejestruj się" /></center>
			
    </form>

    </div>
    </div>
	
    </body>
</body>
</html>