<style>
    * {
        font-family: 'Libre Baskerville', serif;
        color: #F5F5F5;
    }

    body {
        background-image: url('v2.jpeg');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: scroll;
        background-position: center;
    }

    h2 {
        color: #FFFFE0;
    }

    .cuadrado {
        background: rgb(0, 0, 0, 0.5);
        width: 30%;
        padding: 0.2em;
        margin: 0.5em;
    }

    .ejercicio {   
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
</style>

<?php

echo "<div class='ejercicio'>";

echo "<div class='cuadrado' id='ejUno'>";
echo "<h2>Ejercicio 1: tipos de datos</h2>";
$numero = 100;
$float = 0.10;
$cadena = "!Hola, Mundo!";
$boolean = true;
echo "<p><b>Tipos de datos:</b> <br>Int: $numero <br>Float: $float
    <br>String: $cadena <br>Boolean: $boolean</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejDos'>";
echo "<h2>Ejercicio 2: cadenas</h2>";
$text1 = "HOLA";
$text2 = "mundo";
$textLength = strlen($text1);
$textToLower = strtoupper($text2);
$concatenar = "¡" . $text1 . " " . $textToLower . "!";
echo $concatenar;
echo "</div>";

echo "<div class='cuadrado' id='ejTres'>";
echo "<h2>Ejercicio 3: comillas dentro de cadenas</h2>";
echo "<p>\"Comillas dobles\" y 'comillas simples'</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejCuatro'>";
echo "<h2>Ejercicio 4: diferencias entre comillas simples y dobles</h2>";
$uno = "uno";
$dos = "dos";
echo "Variable con comillas dobles: $uno";
echo "<br>";
echo 'Variable con comillas simples $dos';
echo "</div>";

echo "<div class='cuadrado' id='ejCinco'>";
echo "<h2>Ejercicio 5: comillas en c&oacutedigo HTML/CSS</h2>";
echo "<p style='color:pink'>So nice.</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejSeis'>";
echo "<h2>Ejercicio 6: caracteres especiales</h2>";
echo "<p>Esto es</p>" . PHP_EOL . "<p>un salto de l&iacutenea.</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejSiete'>";
echo "<h2>Ejercicio 7: concatenar cadenas</h2>";
$concatenacion = "Hola, " . "me llamo Jes&uacutes. Encantado.";
echo $concatenacion;
echo "</div>";

echo "<div class='cuadrado' id='ejOcho'>";
echo "<h2>Ejercicio 8: añandiendo saltos de l&iacutenea</h2>";
$concatenacion = "<p>Hola,</p>" . PHP_EOL . "<p>me llamo Jes&uacutes. Encantado.</p>";
echo $concatenacion;
echo "</div>";

echo "<div class='cuadrado' id='ejNueve'>";
echo "<h2>Ejercicio 9: variables</h2>";
$saludo = "hola";
echo "<p>Mi gato te dice $saludo de su parte.</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejDiez'>";
echo "<h2>Ejercicio 10: usar variables</h2>";
$num1 = 1;
$num2 = 1;
echo "<p>El resultado de 1 + 1 es " . ($num1 + $num2) . " (mat&eacutematico)";
echo "</div>";

echo "<div class='cuadrado' id='ejOnce'>";
echo "<h2>Ejercicio 11: concatenar variables y cadenas</h2>";
$diario = "Querido diario, ";
$miMensajeAlMundo = $diario . "estoy empezando a ver variables en las personas.";
echo $miMensajeAlMundo;
echo "</div>";

echo "<div class='cuadrado' id='ejDoce'>";
echo "<h2>Ejercicio 12: variables en cadenas</h2>";
$variable = "una variable";
echo "<p>No s&eacute qu&eacute hora es ya, $variable.</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejTrece'>";
echo "<h2>Ejercicio 13: tipos de variables</h2>";
$entero = 25;
$flotante = 3.14;
$booleano = true;

echo "Variable entera: $entero<br>";
echo "Variable flotante: $flotante<br>";
echo "Variable booleana: " . ($booleano ? 'true' : 'false') . "<br>";
echo "</div>";

echo "<div class='cuadrado' id='ejCatorce'>";
echo "<h2>Ejercicio 14: operaciones aritm&eacuteticas</h2>";

$num1 = 10;
$num2 = 5;

$suma = $num1 + $num2;
$resta = $num1 - $num2;
$multiplicacion = $num1 * $num2;
$division = $num1 / $num2;

echo "Suma: $num1 + $num2 = $suma<br>";
echo "Resta: $num1 - $num2 = $resta<br>";
echo "Multiplicaci&oacuten: $num1 * $num2 = $multiplicacion<br>";
echo "Divisi&oacuten: $num1 / $num2 = $division<br>";
echo "</div>";

echo "<div class='cuadrado' id='ejQuince'>";
echo "<h2>Ejercicio 15: nombres de variables</h2>";

$nombreEstudiante = "Jesús";
$edadEstudiante = 19;
$promedioNotas = 8.5;
$esEstudianteActivo = true;

echo "Nombre del estudiante: $nombreEstudiante<br>";
echo "Edad del estudiante: $edadEstudiante años<br>";
echo "Promedio de notas: $promedioNotas<br>";
echo "¿Es estudiante activo?: " . ($esEstudianteActivo ? 'S&iacute' : 'No') . "<br>";
echo "</div>";

echo "<div class='cuadrado' id='ejDieciseis'>";
echo "<h2>Ejercicio 16: unir variables y texto</h2>";

$dia = 10;
$saludMental = "peor";
$quien = "las variables";

echo "Querido diario, llevo " . $dia . " d&iacuteas escribiendo variables,"
    . " mi salud mental va a " . $saludMental . ". Creo que " . $quien .
    " est&aacuten conspirando contra m&iacute";
echo "</div>";

echo "<div class='cuadrado' id='ejDiecisiete'>";
echo "<h2>Ejercicio 17: variables l&oacutegicas y texto</h2>";
$miBooleano = false;
if ($miBooleano) {
    echo "<p>Me encuentro bien mentalmente</p>";
} else {
    echo "<p>No me encuentro bien mentalmente</p>";
}
echo "</div>";

echo "<div class='cuadrado' id='ejDieciocho'>";
echo "<h2>Ejercicio 18: variables enteras (integer)</h2>";
$numeroEntero = 15;
$resultado = $numeroEntero + 10;
echo "La variable entera es: $numeroEntero<br>";
echo "El resultado de la operaci&oacuten ($numeroEntero + 10) es: $resultado";
echo "</div>";

echo "<div class='cuadrado' id='ejDiecinueve'>";
echo "<h2>Ejercicio 19: notaci&oacuten complemento a dos</h2>";
$numDec1 = 10;
$numDec2 = 20;
$numBin1 = decbin($numDec1);
$numBin2 = decbin($numDec2);
echo "<p>Suma con decimales: 10 + 20 = " . ($num1 + $num2) . "</p>";
echo "<p>Suma con binarios: " . $numBin1 . " + " . $numBin2 . " = " . ($numBin1 + $numBin2) . "</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejVeinte'>";
echo "<h2>Ejercicio 20: variables decimales (float)</h2>";
$numeroFlotante1 = 10.5;
$numeroFlotante2 = 4.2;
$suma = $numeroFlotante1 + $numeroFlotante2;
echo "Número 1: $numeroFlotante1<br>";
echo "Número 2: $numeroFlotante2<br>";
echo "Resultado de la suma: $suma";
echo "</div>";

echo "<div class='cuadrado' id='ejVeintiuno'>";
echo "<h2>Ejercicio 21: variables de cadenas (string)</h2>";
$dia = "O TENGO NI IDEA";
$programmingLanguage = "php";
$min = strtolower($dia);
$may = strtoupper($programmingLanguage);
echo "<p>N$min de a que d&iacute estamos, lo &uacutenico
que s&eacute es que la realidad es una simulaci&oacute
programada en $may</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejVeintidos'>";
echo "<h2>Ejercicio 22: conversiones de tipos</h2>";
$numerito = "10";
$cadenita = "10";
$int = (int) $cadenita;
$string = (string) $numerito;
echo "<p>Esto es un " . gettype($int) . ": " . $int . "</p>";
echo "<p>Esto es un " . gettype($string) . ": " . $string . "</p>";
echo "<p>
Este hombre, por una parte, cree que sabe algo, mientras que no sabe [nada]. Por otra parte, yo, que igualmente no s&eacute [nada], tampoco creo [saber algo].</p>";
echo "<p>Estoy delirando.</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejVeintitres'>";
echo "<h2>Ejercicio 23: conversi&oacuten expl&iacutecita</h2>";
$variable3455 = 1.5;
$variable3456 = (int) $variable3455;
echo "<p>La variable \$variable3455 es de tipo " . gettype($variable3456) . ".</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejVeinticuatro'>";
echo "<h2>Ejercicio 24: conversi&oacuten autom&aacutetica</h2>";
$a = 1.5;
$b = 2;
$c = $a * $b;
echo "<p>Resultado de la multiplicaci&oacute de un double y un integer = $c (" . gettype($c) . ")</p>";
echo "</div>";

echo "<div class='cuadrado' id='ejVeinticinco'>";
echo "<h2>Ejercicio 25: variables como variables l&oacutegicas</h2>";
$autorizado = "";
if ($autorizado) {
    echo "<p>Usted est&aacute autorizado.</p>";
} else {
    echo "<p>Creo que mi madre es una variable.</p>";
}
echo "</div>";

echo "</div>";
?>