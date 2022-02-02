<?php

    session_start();

    require_once "connect.php";

    if($dbc->connect_errno!=0)
    {
       echo "Error: ".$dbc->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");

    if($rezultat = $dbc->query(sprintf("SELECT * FROM uzytkownicy WHERE login='%s'", mysqli_real_escape_string($dbc,$login))))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                $wiersz = $rezultat->fetch_assoc();

                if(password_verify($haslo, $wiersz['haslo']))
                {
                    $cps = md5("cossawdawsdodatae", FALSE);
                    setcookie('zalogowany', 1, time()+60*60*24*90); 
            
            setcookie('uzytkownik', $wiersz['login'], time()+60*60*24*90); 
            setcookie('email', $wiersz['email'], time()+60*60*24*90); 
            setcookie('login_dod', $cps, time()+60*60*24*90); 
            setcookie('checksum', md5($wiersz['login']).$cps, time()+60*60*24*90); 
            unset($_SESSION['blad']);
            

            
               header("Location:index.php");    
                }
                else
                {
echo<<<END
<script>
$(function(){
    $('#loign').css({'border-color':'#F90716','border-weight':'1px','border-style':'solid'});
    $('#haslo').css({'border-color':'#F90716','border-weight':'1px','border-style':'solid'});

});
</script>

END;
                    $_SESSION['blad'] = "<span style='color:red'>Nieprawidłowy login lub hasło!</span>";
                    header('Location: prodza.php');
                    
                }
            }
            else{
             
                
                
        
                $_SESSION['blad'] = "<script>$(function(){ $('#loign').css({'border-color':'#F90716','border-weight':'1px','border-style':'solid'}); $('#haslo').css({'border-color':'#F90716','border-weight':'1px','border-style':'solid'});});
                </script><span style='color:red'>Nieprawidłowy login lub hasło!</span>";
                header('Location: prodza.php');
                
            }
        }

        $dbc->close();
    }
?>