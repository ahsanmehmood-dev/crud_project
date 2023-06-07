<?php
    if(isset($_SESSION['login']) && $_SESSION['login']== true){
        session_start();
        session_unset();
        session_destroy();
        header("Location:../index.php");
    }else{
       
        header("Location:../index.php");
    }
?>