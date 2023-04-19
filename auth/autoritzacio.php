<?php

// recolllir els valors del form de login.php

//session es similar a cookies
session_start();


/*
$usuaris=[  "prova"=> "prova",
            "mponts"=>"4832749837498",
            "nsanchez"=>"587495734985"
         ];
*/

include '../supers/connection.php';

    //comprobamos que los campos username y password están vacíos     
    if(!isset($_POST['username']) || !isset($_POST['password'])){
    
    $missatge= "Variables formulari no existeixen";
    //guarda el contenido de una variable en el array _SESSION en la posición 'missatge'
    $_SESSION['missatge']=$missatge;
    //header("Location: login.php"); -> header te redirige a otra página
    header("Location: login.php");
    exit;
    }
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql = "SELECT username FROM users WHERE username ='".$username."' AND password ='".$password."'";
    $query = $bd->query($sql);
    $res= $query->fetch(PDO::FETCH_OBJ);
    
    
    //comprobamos que el campo username concreto existe 
    if ($res==null) {
        $missatge= "Usuari o password incorrectes";
        $_SESSION['missatge']=$missatge;
        header("Location: login.php");
        exit;
    }
    /*
    //comprobamos que el campo password concreto existe
    if ($usuaris[$username]!=$password) {
            $missatge= "El password és incorrecte";
            $_SESSION['missatge']=$missatge;
            header("Location: login.php");
            exit;
        }
    */
    //validamos al usuario
    //echo "Usuari validat correctament";   
    
    $_SESSION['username']=$username;
    
    //redirigimos a index.php
    header("Location: ../logic2.php");