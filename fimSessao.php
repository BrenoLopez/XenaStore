<?php
session_start();
if($_SESSION["idusuario"]){
    session_destroy();
    header("location: index.php");
    exit;
}
die();
?>

