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
print_r($pangramas);
echo "<br>";
echo " ------------------------------------------------------------------------ ";
echo "<br>";
echo "EIBTMLQ-E EAPMBSQ-E OIHMTBS-B EOSCLDF-E AUPCRDH-C AELBJMR-L AOTRCMB-O EINMTSC-T AEPDRYN-N EAVPJSG-G AETMPCV-P EALFDJX-A AEFHNBV-V EIMCVSH-E OADLYXF-A EIMHTCS-S EISPXYM-S UAGRDPY-G AEVHLFS-S AEDLXMN-D IELNMDC-C IOSDPRN-S";
echo "<br>";
echo "<br>";
$combinacionesAceptables = array();
$pangramas = generarPangramas("EIBTMLQ", "E", $palabras);
print_r($pangramas);
echo "<br>";
echo "<br>";
$pangramas = generarPangramas("EAPMBSQ", "E", $palabras);
print_r($pangramas);
echo "<br>";
echo "<br>";
$pangramas = generarPangramas("OIHMTBS", "B", $palabras);
print_r($pangramas);
echo "<br>";
echo "<br>";
$pangramas = generarPangramas("EOSCLDF", "E", $palabras);
print_r($pangramas);
echo "<br>";
echo "<br>";
$pangramas = generarPangramas("AUPCRDH", "C", $palabras);
print_r($pangramas);
echo "<br>";
echo "<br>";
$pangramas = generarPangramas("AELBJMR", "L", $palabras);
print_r($pangramas);
echo "<br>";
echo "<br>";
$pangramas = generarPangramas("AOTRCMB", "O", $palabras);
print_r($pangramas);
echo "<br>";
echo "<br>";
$pangramas = generarPangramas("EINMTSC", "T", $palabras);
print_r($pangramas);
echo "<br>";
echo "<br>";
$pangramas = generarPangramas("AEPDRYN", "N", $palabras);
print_r($pangramas);
echo "<br>";
echo "<br>";
$pangramas = generarPangramas("EAVPJSG", "G", $palabras);
print_r($pangramas);
echo "<br>";
$COMBINACIONS_365="EIBTMLQ-E EAPMBSQ-E OIHMTBS-B EOSCLDF-E AUPCRDH-C AELBJMR-L AOTRCMB-O EINMTSC-T AEPDRYN-N EAVPJSG-G AETMPCV-P EALFDJX-A AEFHNBV-V EIMCVSH-E OADLYXF-A EIMHTCS-S EISPXYM-S UAGRDPY-G AEVHLFS-S AEDLXMN-D IELNMDC-C IOSDPRN-S AENYLMV-A UATRCGP-G EAYXBST-A OEQSGDT-O OIBPVDN-O EADXPQL-L EACRLHV-L OEYSGRH-E EADGXNJ-E IAGPBLN-A EOHRTYX-T AEVSMJC-S UEYNSXT-X UESDXMQ-U AOCRHPN-O AEFTCHP-C IAYSGNV-G UEYNPRJ-E AOTNSYL-A AEBMLPS-A IOTSPLC-P IENSRLP-R EOVRNDL-O EIXQDCL-E IESMNTR-M IECRFHT-E OERFTBQ-B AIQDCNS-S AEJFMSN-S AUNMGYS-G EIVRGLX-V IAPRTBV-I OIXTQRS-I IUDXFGS-U OADNFVR-N EOJMVRS-M AEBCRHJ-A AUGVBNM-M AENLPJR-N EARMHSD-R IEYLSMT-I OESTVCM-T UAYBPND-A OAGLRCT-O IUFBPRL-I AOVLMRQ-L EABRQGC-A AELPYMV-P EUMVLNG-V AOFBPXR-R AIQXTFD-D AEFVSNB-F OATGDBM-B AONDRVX-R IANSRLP-I EUBVXRL-U IAYXCMR-I AIGBXJS-I AERLNFY-Y AIQSCGT-T EOTBLRX-R UEVTDRL-E EABDPLV-A EAFCGTS-S AIQTYXC-T UONGLCR-C EIXNTBS-I AONTQYS-O AUMRCGF-R AEBVCRL-C IEBQSJL-B UEXMLTR-X AIYLHFS-F EIJFBML-L OIVJGSP-I AEBGLTY-L IEHDMNG-G AIHLRPV-A AIMCSRP-C EAQJDCN-D UITVFSJ-U EALBQDM-A AUTGYRX-U OERSJNP-O EOHXCSM-O AEDJPMS-D IARYQFM-A UENGMFR-G EAXBLRV-B AUMVRPQ-R AEVRCXD-A AELPQDM-M AOMSXHR-X EICGLXM-M EANTVDS-V UAFHPRN-N UEPSRGB-U AIGFLMB-M EIPLBRS-L AENMTBP-M IEJTMPG-P UAPRGJN-U EAMTBPS-S AEMNRVF-N IATSVNQ-N AEJPYVN-V IAJBYRV-V IUVTCRM-T IOSVGBR-R AIMPLCX-I OEFSNBG-N AEQVRCY-V AUQSMHR-M EIQFLRD-R IACNPXG-A EANDXMH-D EISHRMJ-R AEXTPBN-T EOLQNYM-E UEQTCML-M EAYSBMF-B OIBDSMF-M AEDJRGN-D IACRGYN-R UEPDRMG-U IEPHRXF-R AEMYPVB-A EALDGNC-L IONTVRC-I AUBJRYG-R UEXVLSG-E OAPCSMR-M EUDJQTS-Q AOHMGSB-S OIRXBGC-O OEVFCXS-S EINXVML-M EOLTMNJ-L UATLHRQ-A AUQTVPL-A EAGSJTF-G OATNSXF-O EIVCXRB-C EACQDSL-C AIHNYRV-N AEJBVLM-B EUHFDBN-N EURXNSG-S AETRJHP-E EAHNLGS-E EIMQLHS-L AICSYMT-A EABRXMV-R AISDRTP-P OETYCRP-R EUCYBGN-N IEPGTMS-G AORCTSF-R AUQSMNP-P AIBHVNX-I OUHTSPR-U EIGPXRJ-G EOSMCNB-S OAGPTRY-G IANRDXL-I OUMLSCY-L OITRHCD-O UAPSLNF-U AOGFVBT-A EALCPNT-N UARFSYG-R EUSQDBX-U EUVFSGR-G OATXSGB-S AELRXHV-A AIXDNRG-D IOYBPSC-S AERBGDQ-G EICPHBR-E UATHMRB-R IEGVRQP-I OUPYSTC-S AEJBSLR-E AIJPSYV-V AICPMHX-C IAJXLBR-I AIYFHNS-I AELFYNJ-A IAGMFVN-N EOSJFRN-E AEYTRHV-A EADGRQB-R EIYMGLB-M UACVJLR-V OAPSYGM-G IEDHBNV-D UATVSJQ-U EABVDSQ-S AECRQVP-A OALJTHG-L AECFDXN-N EANGFHD-E IECBLTR-I AORYGLX-A EAJBLVH-L OINTBXJ-N EOLBYRX-O OACDHBN-C AILTGDM-G UADJMFL-D AOCSYNJ-A EAFSYDP-S AEBSGFD-G EAMCTNV-E EAQFTLY-T IODCTNP-P AIDGFCL-I AICFJVL-L UESCFPB-S IALJDCG-I IANGPYT-N EIHCRLS-I EOSFQTR-O AEMXPLN-E EAXVDRF-F AORHPSJ-R EIBRSQL-L UEVPGNY-G IESRFLV-R AEMXCRP-C AOBSXPL-A AERTJML-E UEYLCDS-C EIFRTVD-R AEXMPJN-M EARTHYC-T IETCRSX-C AUFGXHR-A OAMJNCS-C AUGTRSP-S AESMQVY-E EIXSNVQ-X AEGNHTV-E IOSNJXR-S UECRHJN-N EARHPDB-A UEXRSMF-F AENTGMB-E EAFBLHR-A UAFVYGR-A EOXFPLN-P IODSVMJ-D AILBYCJ-B IEJNSTL-L AILCRNX-R UEVLRND-E EUXCMHR-C EAMPSTD-E EATMNYC-M EAYCXND-C EOHYTRN-E AUYLMTQ-L AORCPDX-X AEJSPRB-R UAJMNVC-C EAGPSCL-P AOMCDFT-T UOYRLBT-R EIMDPVN-D OECSQXR-S AUXRMNC-N EISDFMN-S AEVCNBT-A EACMYRH-E EUDRLBF-U EASNPVB-B OEBNSQP-P EIMFSHX-X UESMYJV-S EAFGTMX-G UEPRTNG-N AEYTDCF-T IUBFDSV-S IETVMLR-V AETYHLV-V UEYTRDJ-E OATLSBG-B AIXBRSV-R OAPSGMB-O EUDRSBV-B EIXRSVC-E AINSCTP-T IAYTCGD-A OAXNDPS-N EAJLVYT-L EADFQGR-F OEVTMHR-M AOFGTDC-A AUSTRGF-A OASFTNV-V EASBRTJ-S IUBLFSC-C EOFTDNS-E UASDCYJ-C EUGQPSC-E EATCNVP-N AEDRMLS-A OABNSXT-X AIYLCNJ-C AEBSPMF-A OEVQMTS-M AOPXBFL-A AOHJCYN-A AUGBSJH-U AIPJSFD-S EARBPCS-C EANHPCG-G IEVPLNS-L OEBPMSN-P IACBRSM-B IABRMJD-D AEGSTND-T AEHQNMJ-M AEPXLFQ-P EOBHNJS-E AITGPQL-I UEVSPLQ-V EUNTGHM-U AIPLFYH-I AELCSVP-C EUSHMDP-M AERHNSV-S EASLRQG-S AOGLCXT-C AEMBRNV-M IEHLGSP-S AESLQND-D AEXNYTR-E OEMBJSN-E AEFMQCD-A OADNSGR-D UASJHRN-N EOLRMJB-R ";

//////AQUÍ VA LAS MANIPULACIONES QUE SE HACEN AL PATRÓN QUE SE PEDIRÁ A LA BBDD/////

$patronPedido="/^[EAVPJSG]*G[EAVPJSG]*$/";
if (preg_match('/\[(.*?)\]/', $patronPedido, $matches)) {
    $letrasNoCentralesEnSucio = $matches[1]; //todavía hay que quitarle el caracter central
}

$asterisco = strpos($patronPedido, '*');
$segundo_corchete = strpos($patronPedido, '[', $asterisco);
$letraCentral = substr($patronPedido, $asterisco + 1, $segundo_corchete - $asterisco - 1);

$letrasNoCentrales = str_replace($letraCentral, "", $letrasNoCentralesEnSucio);

//$letrasNoCentrales = "EAVPJS";
//$letraCentral="G";

////ALTERAR EL ORDEN DE LAS LETRAS NO CENTRALES DE FORMA ALEATORIA////  
$aleatorios = str_split($letrasNoCentrales, 1);
shuffle($aleatorios);

// Guardar cada valor del array en una variable diferente
$var1 = $aleatorios[0];
$var2 = $aleatorios[1];
$var3 = $aleatorios[2];
$var4 = $aleatorios[3];
$var5 = $aleatorios[4];
$var6 = $aleatorios[5];

// Definir el array con las palabras permitidas/////TIENE QUE HACERSE MEDIANTE PETICIÓN A LA BBDD!!!!!
$palabrasPermitidas = array("AGAPE", "AGAPES", "AGAVE", "AGAVES", "AJAGA", "APAGA", "APAGAS", "APAGASSES", "APAGAVA", "APAGAVES", "APEGA", "APEGAS", "APEGASSES", "APEGAVA", "APEGAVES", "ASSAGE", "ASSAGES", "ASSAGESSES", "ASSEGA", "EGEES", "GASAS", "GASASSES", "GASAVA", "GASAVES", "GASEGE", "GASEGES", "GASEGESSES", "GASEJA", "GASEJAS", "GASEJASSES");

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener el valor del input text
  $paraula = $_POST["paraula"];

  // Comprobar si la palabra está en el array
  if (in_array(strtoupper($paraula), $palabrasPermitidas)) {
    echo "OK";
  } else {
    echo "FALSO";
  }
}

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
        <script>
function updateInput(button) {
  var input = document.getElementById("word-input");
  input.value += button.textContent;
}
</script>

</head>
<body>
	<div class="container">
		<button class="letter-button" style="transform: rotate(0deg) translate(120px) rotate(0deg);" onclick="updateInput(this)"><?php echo $var1; ?></button>
		<button class="letter-button" style="transform: rotate(60deg) translate(120px) rotate(-60deg);" onclick="updateInput(this)"><?php echo $var2; ?></button>
		<button class="letter-button" style="transform: rotate(120deg) translate(120px) rotate(-120deg);" onclick="updateInput(this)"><?php echo $var3; ?></button>
		<button class="letter-button" style="transform: rotate(180deg) translate(120px) rotate(180deg);" onclick="updateInput(this)"><?php echo $var4; ?></button>
		<button class="letter-button" style="transform: rotate(240deg) translate(120px) rotate(-240deg);" onclick="updateInput(this)"><?php echo $var5; ?></button>
		<button class="letter-button" style="transform: rotate(300deg) translate(120px) rotate(-300deg);" onclick="updateInput(this)"><?php echo $var6; ?></button>
		<button class="letter-button selected" style="transform: rotate(0deg) translate(0) rotate(0deg);" onclick="updateInput(this)"><?php echo $letraCentral; ?></button>
	</div>
        <input type="text" placeholder="Escribe tu palabra aquí..." id="word-input">
      <button type="submit">Comprobar</button>
</body>
</html>

