<link rel="stylesheet" type="text/css" href="estilos.css">
<?php

function multiplicador_constante($semilla, $a, $iteraciones, $digitos) {
    $numeros_aleatorios = array();
    $x = $semilla;

    for ($i = 1; $i-1 < $iteraciones; $i++) {
        $y = $a * $x;       //constante * semilla = a Y
        $x_str = (string)$y; // convierte en numero en txt
        $start = (strlen($x_str) - $digitos) / 2;  //calcula la posicion de los numeros del centro
        $ax = intval(substr($x_str, $start, $digitos)); //da x1,x2,....  Se extraen los dígitos del centro de la cadena convertida, y se convierten a un número entero.
        $numero = $ax / (10 ** $digitos);  // da r1,r2.....  Se normaliza el número
        $numeros_aleatorios[] = array($i, $y, $ax, $numero); //matriz que ayudara a imprmir
        $x = $ax;          
    }

    return $numeros_aleatorios;
}

// Obtener valores desde el formulario
$semilla = (int)$_POST['semilla'];
$a = (int)$_POST['constante'];
$iteraciones = (int)$_POST['iteraciones'];
$digitos = (int)$_POST['digitos'];

$resultados = multiplicador_constante($semilla, $a, $iteraciones, $digitos);

echo "<table border='1'>";
echo "<tr><th>N°</th><th>Yn</th><th>Xn</th><th>Rn</th></tr>";
foreach ($resultados as $row) {
    echo "<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td></tr>";  // Se imprime una fila de la tabla con los valores de $i, $y, $ax y $numero.
}
echo "</table>";
?>


