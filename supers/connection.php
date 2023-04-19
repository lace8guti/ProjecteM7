
<?php

// newPDO: connectem amb la BD
$usuari="root";
$password="";    
$database ="ParaulogicMB1";
$host = "localhost";

try {
    //primer parámetro: cadena de conexión, es String mediante concanetaciones
    //mysql:host='nombre del host';dbname='nombre de la BD',usuario,contraseña
    $bd = new PDO('mysql:host='.$host.';dbname='.$database, 
                     $usuari, $password); 	   
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "No s'ha pogut connectar amb la Base de dades";
        echo $e->getMessage();
	exit;
}

?>



