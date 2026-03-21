<?php
    $resultado = ""; // Inicializa a variável para evitar avisos
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $operador = $_POST["operador"];
        
        if (!is_numeric($a)) {
            $resultado = "Erro: Valor A deve ser numérico";
        } elseif (in_array($operador, ['soma', 'sub', 'multi', 'divide', 'potencia']) && !is_numeric($b)) {
            $resultado = "Erro: Valor B deve ser numérico";
        } else {
            if ($operador == "soma") {
                $resultado = $a + $b;
            } elseif ($operador == "sub") {
                $resultado = $a - $b;
            } elseif ($operador == "multi") {
                $resultado = $a * $b;
            } elseif ($operador == "divide") {
                // Verificação para não dividir por zero
                $resultado = ($b != 0) ? ($a / $b) : "Erro: Divisão por zero";
            } elseif ($operador == "potencia") {
                $resultado = $a ** $b; // Ou pow($a, $b)
            } elseif ($operador == "raiz") {
                $resultado = sqrt($a); // Calcula a raiz quadrada de A
            } else {
                $resultado = "Operador não definido";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
</head>
<body>
    <h1>Minha Calculadora!</h1>

    <form method='POST' action=''>
        Valor A: <input type="number" step="any" name='a' required><br>
        Valor B: <input type="number" step="any" name='b'><br>
        
        <p>Operação:</p>
        <input type="radio" name="operador" value="soma" checked> Soma<br>
        <input type="radio" name="operador" value="sub"> Subtrai<br>
        <input type="radio" name="operador" value="multi"> Multiplica<br>
        <input type="radio" name="operador" value="divide"> Divide<br>
        <input type="radio" name="operador" value="potencia"> Potência (a elevado a b)<br>
        <input type="radio" name="operador" value="raiz"> Raiz Quadrada (de a)<br>
        
        <br>
        <input type='submit' value='Calcular'>
    </form>

    <br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<strong>Resultado: $resultado</strong>"; 
        }
    ?>
</body>
</html>