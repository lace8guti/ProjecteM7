<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
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

$miStringAleatorio="OERLTFJ";
$letraAleatoria="O";


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
$stringAleatorio=$miStringAleatorio;

//generación de pangramas
$pangramas = generarPangramas($stringAleatorio, $letraAleatoria, $palabras);
//print_r($pangramas);

$combinacionesAceptables = array();
?>
<?php

/*
<!DOCTYPE html>
<html>
<head>
	<title>Spelling Bee</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Spelling Bee</h1>
		<p>Find all the pangrams!</p>
		<div class="game-board">
			<?php
				// Get the letters for the game board
				$letters = ["O","E","R","L","T","F","J"];
				// Output the game board
				foreach ($letters as $letter) {
					echo '<div class="letter-tile">' . $letter . '</div>';
				}
			?>
		</div>
		<form method="post" action="check-words.php">
			<label for="word">Enter a word:</label>
			<input type="text" name="word" id="word" required>
			<input type="hidden" name="letters" value="<?php echo implode('', $letters); ?>">
			<input type="submit" value="Check">
		</form>
		<div class="pangram-list">
			<?php
				// Get the pangrams for the game board
				$pangrams = $pangramas;
				// Output the list of pangrams
				echo '<p>Pangrams:</p>';
				foreach ($pangrams as $pangram) {
					echo '<div class="pangram">' . $pangram . '</div>';
				}
			?>
		</div>
	</div>
</body>
</html>
*/
?>

------------------------------------------------------------------------
<?php

/*
<!DOCTYPE html>
<html>
<head>
	<title>Spelling Bee</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Spelling Bee</h1>
		<p>Find all the pangrams!</p>
		<div class="game-board">
			<?php
				// Get the letters for the game board
				$letters = ["O","E","R","L","T","F","J"];
				// Output the game board
				foreach ($letters as $letter) {
					echo '<button class="letter-tile" onclick="addToWord(this.innerHTML)">' . $letter . '</button>';
				}
			?>
		</div>
		<form method="post" action="check-words.php">
			<label for="word">Enter a word:</label>
			<input type="text" name="word" id="word" required>
			<div class="letter-buttons">
				<?php
					// Output the letter buttons
					foreach ($letters as $letter) {
						echo '<button class="letter-button" type="button" onclick="addToWord(this.innerHTML)">' . $letter . '</button>';
					}
				?>
			</div>
			<input type="hidden" name="letters" value="<?php echo implode('', $letters); ?>">
			<input type="submit" value="Check">
		</form>
		<div class="pangram-list">
			<?php
				// Get the pangrams for the game board
				$pangrams = $pangramas;
				// Output the list of pangrams
				echo '<p>Pangrams:</p>';
				foreach ($pangrams as $pangram) {
					echo '<div class="pangram">' . $pangram . '</div>';
				}
			?>
		</div>
	</div>
	<script>
		// Add event listener to each button and append clicked letter to input field
		function addToWord(letter) {
			document.getElementById("word").value += letter;
		}
	</script>
</body>
</html>

*/
?>
<?php
/*
<!DOCTYPE html>
<html>
<head>
	<title>Spelling Bee</title>
	<link rel="stylesheet" href="style.css">
        <style>
            .word-input-container {
	position: relative;
	display: flex
            }
        </style>
</head>
<body>
	<div class="container">
		<h1>Spelling Bee</h1>
		<p>Find all the pangrams!</p>
		<div class="game-board">
			<?php
				// Get the letters for the game board
				$letters = ["O","E","R","L","T","F","J"];
				// Output the game board
				foreach ($letters as $letter) {
					echo '<button class="letter-tile" onclick="addToWord(this.innerHTML)">' . $letter . '</button>';
				}
			?>
		</div>
		<form method="post" action="check-words.php">
			<div class="word-input-container">
				<label for="word">Enter a word:</label>
				<input type="text" name="word" id="word" required>
				<?php
					// Output the letter buttons in a circular pattern around the input field
					$numLetters = count($letters);
					$angleStep = 360 / $numLetters;
					for ($i = 0; $i < $numLetters; $i++) {
						$angle = $i * $angleStep;
						echo '<button class="letter-button" type="button" style="transform: rotate(' . $angle . 'deg) translate(100px) rotate(-' . $angle . 'deg);" onclick="addToWord(this.innerHTML)">' . $letters[$i] . '</button>';
					}
				?>
			</div>
			<input type="hidden" name="letters" value="<?php echo implode('', $letters); ?>">
			<input type="submit" value="Check">
		</form>
		<div class="pangram-list">
			<?php
				// Get the pangrams for the game board
				$pangrams = $pangramas;
				// Output the list of pangrams
				echo '<p>Pangrams:</p>';
				foreach ($pangrams as $pangram) {
					echo '<div class="pangram">' . $pangram . '</div>';
				}
			?>
		</div>
	</div>
	<script>
		// Add event listener to each button and append clicked letter to input field
		function addToWord(letter) {
			document.getElementById("word").value += letter;
		}
	</script>
</body>
</html>

*/
?>

<?php
/*
// Disposición de botones --> CORRECTO 
//TODO: Hay que combinar la diposición de botones con la forma de los botones que hay en el bloque CORRECTO
// de abajo.

<!DOCTYPE html>
<html>
<head>
	<title>Spelling Bee</title>
	<link rel="stylesheet" href="style.css">
        <style>
            .word-input-container {
	position: relative;
	display: flex;
	align-items: center;
}

.word-input-container label {
	margin-right: 10px;
}

.word-input-container input[type="text"] {
	padding: 5px;
}

.letter-button {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 40px;
	height: 45px;
	border: none;
	background-color: #fff;
	color: #000;
	font-size: 16px;
	font-weight: bold;
	text-align: center;
	border-radius: 0;
	clip-path: polygon;
}
        </style>
</head>
<body>
	<div class="container">
		<h1>Spelling Bee</h1>
		<p>Find all the pangrams!</p>
		<div class="game-board">
			<?php
				// Get the letters for the game board
				$letters = ["E","R","L","T","F","J"];
				// Output the game board
				foreach ($letters as $letter) {
					echo '<button class="letter-tile" onclick="addToWord(this.innerHTML)">' . $letter . '</button>';
				}
			?>
		</div>
		<form method="post" action="check-words.php">
			<div class="word-input-container">
				<label for="word">Enter a word:</label>
				<input type="text" name="word" id="word" required>
				<?php
					// Output the letter buttons in a hexagonal pattern around the input field
					$numLetters = count($letters);
					$angleStep = 360 / $numLetters;
					for ($i = 0; $i < $numLetters; $i++) {
						$angle = $i * $angleStep;
						echo '<button class="letter-button" type="button" style="transform: rotate(' . $angle . 'deg) translate(100px) rotate(-' . $angle . 'deg);" onclick="addToWord(this.innerHTML)">' . $letters[$i] . '</button>';
					}
				?>
			</div>
			<input type="hidden" name="letters" value="<?php echo implode('', $letters); ?>">
			<input type="submit" value="Check">
		</form>
		<div class="pangram-list">
			<?php
				// Get the pangrams for the game board
				$pangrams = $pangramas;
				// Output the list of pangrams
				echo '<p>Pangrams:</p>';
				foreach ($pangrams as $pangram) {
					echo '<div class="pangram">' . $pangram . '</div>';
				}
			?>
		</div>
	</div>
	<script>
		// Add event listener to each button and append clicked letter to input field
		function addToWord(letter) {
			document.getElementById("word").value += letter;
		}
	</script>
</body>
</html>

*/
?>

<?php
/*
$letters = ["O","E","R","L","T","F","J"];
$centerLetter = $letters[0];
$hexagonSide = 80; // Longitud de los lados del hexágono aumentada para agregar más espacio entre botones
$centerX = 250; // Coordenada X del centro del hexágono
$centerY = 250; // Coordenada Y del centro del hexágono
$numLetters = count($letters);
$angleStep = 2 * pi() / $numLetters;

// Calculamos las coordenadas de cada botón y su letra correspondiente
$buttonCoords = [];
for ($i = 0; $i < $numLetters; $i++) {
  $angle = $i * $angleStep;
  $x = $centerX + $hexagonSide * cos($angle);
  $y = $centerY + $hexagonSide * sin($angle);
  $buttonCoords[] = [$x, $y, $letters[$i]];
}

// Mostramos los botones en pantalla
foreach ($buttonCoords as $coords) {
  $x = $coords[0];
  $y = $coords[1];
  $letter = $coords[2];
  $buttonStyle = "position: absolute; left: " . ($x - $hexagonSide) . "px; top: " . ($y - $hexagonSide) . "px; width: " . (2 * $hexagonSide) . "px; height: " . (2 * $hexagonSide) . "px; clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%); padding: 10px;";

  if ($letter === $centerLetter) {
    $buttonStyle .= " background-color: yellow;";
    
  }
  echo '<button style="' . $buttonStyle . '">' . $letter . '</button>';
}

*/
?>

<?php
/*
// Botones hexagonales --> CORRECTO

<!DOCTYPE html>
<html>
<head>
	<title>Spelling Bee</title>
	<style>
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			margin: 20px;
		}
		.letter-button {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: white;
			color: black;
			border: 2px solid black;
			width: 60px;
			height: 70px;
			font-size: 28px;
			font-weight: bold;
			margin: 5px;
			clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
		}
		.letter-button.selected {
			background-color: black;
			color: white;
		}
		.letter-button:hover {
			background-color: yellow;
		}
		.letter-button:focus {
			outline: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<button class="letter-button">R</button>
		<button class="letter-button">E</button>
		<button class="letter-button">J</button>
		<button class="letter-button">F</button>
		<button class="letter-button">L</button>
		<button class="letter-button">T</button>
		<button class="letter-button selected">O</button>
	</div>
</body>
</html>

*/
?>
<!--FRONTEND DE LOS BOTONES: CORRECTO -->
<!DOCTYPE html>
<html>
<head>
	<title>Spelling Bee</title>
	<style>
		.container {
			position: relative;
			width: 450px;
			height: 400px;
			margin: 20px;
		}
		.letter-button {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: white;
			color: black;
			border: 2px solid black;
			width: 60px;
			height: 70px;
			font-size: 28px;
			font-weight: bold;
			margin: 5px;
			clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
		}
		.letter-button.selected {
			background-color: black;
			color: white;
		}
		.letter-button:hover {
			background-color: yellow;
		}
		.letter-button:focus {
			outline: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<button class="letter-button" style="transform: rotate(0deg) translate(120px) rotate(0deg);">R</button>
		<button class="letter-button" style="transform: rotate(60deg) translate(120px) rotate(-60deg);">E</button>
		<button class="letter-button" style="transform: rotate(120deg) translate(120px) rotate(-120deg);">J</button>
		<button class="letter-button" style="transform: rotate(180deg) translate(120px) rotate(180deg);">F</button>
		<button class="letter-button" style="transform: rotate(240deg) translate(120px) rotate(-240deg);">L</button>
		<button class="letter-button" style="transform: rotate(300deg) translate(120px) rotate(-300deg);">T</button>
		<button class="letter-button selected" style="transform: rotate(0deg) translate(0) rotate(0deg);">O</button>
	</div>
</body>
</html>

