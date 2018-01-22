<?php
session_start();
include_once("./config/config.php");

$email = $_POST['email'];
$password = $_POST['password'];

if($email == "" or $password == ""){
    header("Refresh: 3; url = index.php");
   
}else{

    $sql = "SELECT idutente FROM utenti
	WHERE email='".$email."'  and password=MD5('".$password."')";
    $result = mysqli_query($conn, $sql);

    
    
    if(mysqli_num_rows($result) != 1){
        header("Refresh: 3; url = index.php");
        
    }else{
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['idutente'] = $row['idutente'];
        if(isset($_SESSION['idutente'])) header("Location: ./ad_view.php?ad_id=".$_SESSION['idutente']);
        else header("Location: ./index.php");
    }
}

mysqli_close($conn);
?>
