<?php
    if(isset($_POST["submit"])){
        include_once "api.php";
        include_once "sqlconnect.php";
        if(checkLogin($cid, $_POST["user"], $_POST["pwd"])){
            session_start();
            $_SESSION["loggato"]=true;
            header("Location: ../explore.php");
        } else {
            header("Location: ../?error=fail");
        }
    } else {
        header("Location: ../");
    }
    
?>