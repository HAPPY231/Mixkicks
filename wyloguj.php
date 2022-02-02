<<<<<<< HEAD
<?php
if (isset($_COOKIE['zalogowany'])) {
    unset($_COOKIE['zalogowany']);
    setcookie('zalogowany', null, -1, '/'); 
}
        if (isset($_COOKIE['uzytkownik'])) {
            unset($_COOKIE['uzytkownik']);
            setcookie('uzytkownik', null, -1, '/'); 
        }
        if (isset($_COOKIE['email'])) {
            unset($_COOKIE['email']);
            setcookie('email', null, -1, '/');
        }
        if (isset($_COOKIE['checksum'])) {
            unset($_COOKIE['checksum']);
            setcookie('checksum', null, -1, '/');
        }
        if (isset($_COOKIE['login_dod'])) {
            unset($_COOKIE['login_dod']);
            setcookie('login_dod', null, -1, '/'); 
        }
        if (isset($_COOKIE['login_time'])) {
            unset($_COOKIE['login_time']);
            setcookie('login_time', null, -1, '/');
        }
       
    header('Location:index.php')
    
=======
<?php
if (isset($_COOKIE['zalogowany'])) {
    unset($_COOKIE['zalogowany']);
    setcookie('zalogowany', null, -1, '/'); 
}
        if (isset($_COOKIE['uzytkownik'])) {
            unset($_COOKIE['uzytkownik']);
            setcookie('uzytkownik', null, -1, '/'); 
        }
        if (isset($_COOKIE['email'])) {
            unset($_COOKIE['email']);
            setcookie('email', null, -1, '/');
        }
        if (isset($_COOKIE['checksum'])) {
            unset($_COOKIE['checksum']);
            setcookie('checksum', null, -1, '/');
        }
        if (isset($_COOKIE['login_dod'])) {
            unset($_COOKIE['login_dod']);
            setcookie('login_dod', null, -1, '/'); 
        }
        if (isset($_COOKIE['login_time'])) {
            unset($_COOKIE['login_time']);
            setcookie('login_time', null, -1, '/');
        }
       
    header('Location:index.php')
    
>>>>>>> 27d91b1dcee6c4b4a801fbba75509bb1b1965e87
?>