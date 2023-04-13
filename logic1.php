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

// Utilizar array_map y trim para eliminar los espacios en blanco de cada entrada del array
$palabras = array_map('trim', $palabras);
// Cierras el archivo
fclose($archivo);

////////////////////////////////////


/*
 * Una vegada creat l'array de paraules correctament, hem de crear l'algorisme per generar pangrames
 * 
 */

// Generar array con todos los caracteres posibles.

/*
$abecedario = range('A', 'H');
array_push($abecedario, 'Ç');
*/

/*
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
    return strpos($palabra, 'N  ') !== false;
});

// Tomar las primeras 10 palabras que contengan la letra "N"
$palabras_con_n = array_slice($palabras_con_n, 0, 3000);

// Mostrar el array de palabras que contienen la letra "N"
//print_r($palabras_con_n);
*/


function generarStringAleatorio() {
  $consonantes = array(
    'B', 'C', 'D', 'F', 'G', 'H', 'L', 'M', 'N', 'P', 
    'R', 'S', 'T', 'V', 'X', 'Y', 'J', 'Q'
  );
  $vocales = array('A', 'E', 'I', 'O', 'U', 'E', 'A');

  // Escoger dos vocales al azar
  $vocal1 = $vocales[array_rand($vocales)];
  $vocal2 = $vocales[array_rand($vocales)];

  // Asegurar que las dos vocales sean diferentes
  while ($vocal1 == $vocal2) {
    $vocal2 = $vocales[array_rand($vocales)];
  }

  // Aumentar la frecuencia de ciertas consonantes
  $consonantesAleatorias = array();
  while (count($consonantesAleatorias) < 5) {
    $consonante = $consonantes[array_rand($consonantes)];
    if (!in_array($consonante, $consonantesAleatorias)) {
      if (in_array($consonante, array('S', 'R', 'L', 'N', 'T'))) {
        // Aumentar la frecuencia de ciertas consonantes
        $consonantesAleatorias[] = $consonante;
      } else {
        // Reducir la frecuencia de ciertas consonantes
        if (mt_rand(1, 20) <= 19) {
          $consonantesAleatorias[] = $consonante;
        }
      }
    }
  }

  // Combinar las vocales y consonantes en un array
  $stringAleatorioArray = array($vocal1, $vocal2);
  shuffle($consonantesAleatorias);
  $stringAleatorioArray = array_merge($stringAleatorioArray, $consonantesAleatorias);

  // Convertir el array en un string y devolverlo
  return implode('', $stringAleatorioArray);
}

/*
$miStringAleatorio = generarStringAleatorio();
echo $miStringAleatorio; // Imprime el string aleatorio generado
echo "<br>";
    
$letraAleatoria = substr($miStringAleatorio, mt_rand(0, strlen($miStringAleatorio) - 1), 1);
echo $letraAleatoria; // Imprime una letra aleatoria del string generado
echo "<br>";
*/

$letrasAnexas="AIGRÇST";
$letraObligatoria="A";

/*        
// Definir la expresión regular
$patron = '/^['.$letrasAnexas.']*'.$letraObligatoria.'['.$letrasAnexas.']*$/';

// Filtrar las palabras del array que cumplan el patrón
$palabras_con_n = array_filter($palabras, function($palabra) use ($patron) {
    return preg_match($patron, $palabra);
});

// Tomar las primeras 30 palabras que cumplan el patrón
$palabras_con_n = array_slice($palabras_con_n, 0, 40);

// Mostrar el array de palabras que contienen la letra "N" y están formadas por las letras "A","J","L","E","I","O","U","M"
print_r($palabras_con_n);
*/

//echo "Control";
//echo "<br>";
$cantidad = count($palabras);
//echo "El array tiene $cantidad entradas";
//echo "<br>";

/*
// Definir la expresión regular
$patron = '/^['.$miStringAleatorio.']*'.$letraAleatoria.'['.$miStringAleatorio.']*$/';

// Filtrar las palabras del array que cumplan el patrón
$pangrama = array_filter($palabras, function($palabra) use ($patron) {
    return preg_match($patron, $palabra);
});

// Tomar las primeras palabras que cumplan el patrón
$pangrama = array_slice($pangrama, 0, 582237);

// Mostrar el array de palabras que contienen la $letraAleatoria y están formadas por las letras del $patron
print_r($pangrama);
*/

function generarPangramas($miStringAleatorio, $letraAleatoria, $palabras) {
    // Definir la expresión regular
    $patron = '/^['.$miStringAleatorio.']*'.$letraAleatoria.'['.$miStringAleatorio.']*$/';
    echo "$patron";
    echo "<br>";
    // Filtrar las palabras del array que cumplan el patrón y tengan al menos 4 caracteres
    $pangramas = array_filter($palabras, function($palabra) use ($patron) {
        return preg_match($patron, $palabra) && strlen($palabra) >= 5;
    });

    // Ordenar los pangramas alfabéticamente
    sort($pangramas);

    // Tomar los primeros 30 pangramas
    $pangramas = array_slice($pangramas, 0, 30);

    // Si no hay suficientes pangramas, mostrar un mensaje de aviso
    if (count($pangramas) < 30) {
        /*
        echo "No se han podido generar 30 pangramas con la combinación de letras proporcionada";
        echo "<br>";
        */
    }

    // Devolver el array de pangramas
    return $pangramas;
}

/*
 * En lugar de generar strings y letras de forma pseudoaleatoria, vamos a ejecutar las funciones en bucle
 * El objetivo es conseguir un array de combinaciones de letras que satisfagan los pangramas en longitud y
 * cantidad.
 * Para ello, ejecutaremos en bucle estas funciones hasta que guardemos un número considerable de estas combinaciones
 * 
 */
//////////////////////////////////////////IMPORTANTE///////////////////////////////////////////////////////
//generación de un string de letras pseudoalatorias
$stringAleatorio = generarStringAleatorio();
//control
//echo "$stringAleatorio";
//echo "<br>";
//generación de una letra obligatoria del string de letras pseudoaleatorias
$letraAleatoria = substr($stringAleatorio, mt_rand(0, strlen($stringAleatorio) - 1), 1);
//control
//echo "$letraAleatoria";
//echo "<br>";
//////////////////////////////////////////IMPORTANTE/////////////////////////////////////////////////////////
//generación de pangramas
echo "patata";
$pangramas = generarPangramas($stringAleatorio, $letraAleatoria, $palabras);
print_r($pangramas);

$combinacionesAceptables = array();

while (count($combinacionesAceptables) < 365) {
    $miStringAleatorio = generarStringAleatorio();
    $letraAleatoria = $miStringAleatorio[mt_rand(0, 6)];
    $pangramas = generarPangramas($miStringAleatorio, $letraAleatoria, $palabras);

    if (count($pangramas) == 30) {
        $combinacionesAceptables[] = array(
            'stringAleatorio' => $miStringAleatorio,
            'letraAleatoria' => $letraAleatoria
        );
    }
}

// Mostrar las combinaciones de letras aceptables
echo 'Combinaciones de letras aceptables: ';
foreach ($combinacionesAceptables as $combinacion) {
    echo $combinacion['stringAleatorio'] . '-' . $combinacion['letraAleatoria'] . ' ';
}
echo '<br>';

$cant=count($combinacionesAceptables);
echo "$cant";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Spelling Bee</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Spelling Bee</h1>
    <div class="letters">
      <?php 
        // Mostrar las letras de una de las combinaciones aceptables
        $combinacion = $combinacionesAceptables[array_rand($combinacionesAceptables)];
        $combinacion = implode('', $combinacion);
        foreach (str_split($combinacion) as $letra) {
          echo "<div class='letter'>$letra</div>";
        }
      ?>
    </div>
    
    <form>
      <input type="text" placeholder="Escribe tu palabra aquí...">
      <button type="submit">Comprobar</button>
    </form>
  </div>
</body>
</html>



