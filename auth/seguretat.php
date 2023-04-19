<?php

//código de seguridad de la página, así me aseguro que está bien loggeado
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ./iniciarSesion.php");
    exit;
}

