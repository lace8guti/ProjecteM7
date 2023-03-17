<?php

/*
 * ¿Cómo crear un grupo de plabras?
 * 1. Eliges una letra obligatoria ($letraCentral) (la generamos mediante randGen)
 * 2. Seleccinas un conjunto de letras (6)($arrayLetrasAnex) que junto a la letra central seleccionada,
 * formen un array de letras ($arrayLetras). 
 * 3. Filtramos de una BBDD de palabras solo aquellas que contengan la $letraCentral 
 * 4. Hacemos una función que trate de hacer un array con palabras que contengan algunas
 * o todas las letras anexas ($arrayLetrasAnex):
 * A. Si es capaz de encontrar 12 palabras, la da por buena, return true y guarda el array.
 * B. Si te dice que no puede hacer un array de palabras con esa combinaciń de letras,
 * le decimos que devuelva false y siga intentándolo hasta que devuelva true.
 */


/*
 * 1. La BBDD tiene que contener SOLAMENTE:
 * 
 * A. Palabras con un mínimo de 4 letras.
 * B. Palabras con un máximo de 12 letras.
 * 
 * 2. Elementos que necesitamos :
 * 
 * A. Una BBDD de palabras en catalán 
 * B. Hay que quitar los siguientes caracteres:
 *  1. Tildes
 *  2. Diéresis
 *  3. Guiones
 *  4. Puntos de geminación
 * 
 */

/*
 * Abre el archivo .txt con la función file_get_contents(). 
 * Esta función lee el contenido del archivo y lo almacena en una variable.
 */


// Abres el archivo .txt
$archivo = fopen("DISC2-LP.txt", "r");

// Inicializas el array $palabras
$palabras = array();

// Recorres el archivo línea por línea
while (!feof($archivo)) {
    // Lees cada línea del archivo
    $linea = fgets($archivo);

    // Divides la línea en palabras utilizando el espacio como separador
    $palabras_linea = explode(" ", $linea);

    // Añades cada palabra al array $palabras
    foreach ($palabras_linea as $palabra) {
        $palabras[] = $palabra;
    }
}

    // Eliminamos "·" de las palabras
foreach ($palabras as &$palabra) {
    $palabra = str_replace("·", "", $palabra);
}

// Cierras el archivo
fclose($archivo);

////////////////////////////////////


/*
 * Una vegada creat l'array de paraules correctament, hem de crear l'algorisme per generar pangrames
 * 
 */

// Generar array con todos los caracteres posibles.

$abecedario = range('A', 'Z');
array_push($abecedario, 'Ç');

// Generar y guardar un caracter aleatorio dentro del array abecedario

$caracter_aleatorio;
$siete_caracteres = [];

while (count($siete_caracteres) < 7) {
    $caracter_aleatorio = $abecedario[array_rand($abecedario)];
    if (!in_array($caracter_aleatorio, $siete_caracteres)) {
        $siete_caracteres[] = $caracter_aleatorio;
    }
}

$siete_caracteres = implode('', $siete_caracteres);

echo "$caracter_aleatorio";
echo "<br>";

echo $siete_caracteres;
echo "<br>";

// Buscar las palabras que contengan la letra "N"
$palabras_con_n = array_filter($palabras, function($palabra) {
    return strpos($palabra, 'N') !== false;
});

// Tomar las primeras 10 palabras que contengan la letra "N"
$palabras_con_n = array_slice($palabras_con_n, 0, 3000);

// Mostrar el array de palabras que contienen la letra "N"
//print_r($palabras_con_n);


$letrasAnexas="JALEIOUMN";
$letraObligatoria="N";

        
// Definir la expresión regular
$patron = '/^['.$letrasAnexas.']*'.$letraObligatoria.'['.$letrasAnexas.']*$/';

// Filtrar las palabras del array que cumplan el patrón
$palabras_con_n = array_filter($palabras, function($palabra) use ($patron) {
    return preg_match($patron, $palabra);
});

// Tomar las primeras 30 palabras que cumplan el patrón
$palabras_con_n = array_slice($palabras_con_n, 0, 30);

// Mostrar el array de palabras que contienen la letra "N" y están formadas por las letras "A","J","L","E","I","O","U","M"
print_r($palabras_con_n);



