<<<<<<< HEAD
<?php
    session_start();
    require_once "PHPMailer/src/PHPMailer.php";
    require_once "PHPMailer/src/SMTP.php";
    require_once "PHPMailer/src/Exception.php";

    include('connect.php');
    
    $sqqql = "SELECT * FROM zamowienia WHERE uzytkownik='$_COOKIE[uzytkownik]'";
    $res = mysqli_query($dbc,$sqqql);

    $ile_zam = $res->num_rows;
    $_SESSION['wartosc'] = $_POST['wartosck'];
    $ress = mysqli_query($dbc,$sqqql);
    $wszy = mysqli_fetch_all($ress, MYSQLI_ASSOC);
   
foreach($wszy as $r)
{
    $update = "UPDATE buty SET ilosc=ilosc-'$r[ilosc]' WHERE id='$r[id_butow]'";
    $resv = mysqli_query($dbc,$update);

}
$body = "Ilość pozycji: {$ile_zam} <br/>";
$body2 = " Wartość koszyka: {$_SESSION['wartosc']}zł";


$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->Username = 'admin@mix-kicks.pl';
$mail->SetFrom('no-reply@mix-kicks.pl');
$mail->Subject = 'Zamowienie';

$mail->Body = $body;
$mail->Body .= $body2;

$mail->AddAddress($_COOKIE['email']);

if($mail->Send()==true){

$sqll = "DELETE FROM zamowienia WHERE uzytkownik='$_COOKIE[uzytkownik]'";

$rese = mysqli_query($dbc, $sqll);
if($res){
    header('Location: index.php');
}

}
else if($mail->Send()==false){
echo "Nie udało się";
}
    $dbc->close();
=======
<?php
    session_start();
    require_once "PHPMailer/src/PHPMailer.php";
    require_once "PHPMailer/src/SMTP.php";
    require_once "PHPMailer/src/Exception.php";

    include('connect.php');
    
    $sqqql = "SELECT * FROM zamowienia WHERE uzytkownik='$_COOKIE[uzytkownik]'";
    $res = mysqli_query($dbc,$sqqql);

    $ile_zam = $res->num_rows;
    $_SESSION['wartosc'] = $_POST['wartosck'];
    $ress = mysqli_query($dbc,$sqqql);
    $wszy = mysqli_fetch_all($ress, MYSQLI_ASSOC);
   
foreach($wszy as $r)
{
    $update = "UPDATE buty SET ilosc=ilosc-'$r[ilosc]' WHERE id='$r[id_butow]'";
    $resv = mysqli_query($dbc,$update);

}
$body = "Ilość pozycji: {$ile_zam} <br/>";
$body2 = " Wartość koszyka: {$_SESSION['wartosc']}zł";


$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';
$mail->IsHTML(true); 
$mail->Subject = 'Zamowienie';

$mail->Body = $body;
$mail->Body .= $body2;

$mail->AddAddress($_COOKIE['email']);




if($mail->Send()==true){

$sqll = "DELETE FROM zamowienia WHERE uzytkownik='$_COOKIE[uzytkownik]'";

$rese = mysqli_query($dbc, $sqll);
if($res){
    header('Location: index.php');
}

}
else if($mail->Send()==false){
echo "Nie udało się";
}
    $dbc->close();
>>>>>>> 27d91b1dcee6c4b4a801fbba75509bb1b1965e87
?>
