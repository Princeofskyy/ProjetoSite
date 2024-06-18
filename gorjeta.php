<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjeta</title>
    <link rel="stylesheet" href="style.css">
    <script>
        //função para fazer p botão "limpar"também limpar o resultado final do calculo
        function clearResult() {
            document.getElementById("resultadoValor").innerHTML = "";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Gorjeta</h1>
        <form action="gorjeta.php" method="POST">
            <label for="valorconta">Valor da Conta:</label>
            <input type="number" id="valorconta" name="valorconta" step="0.01" min="0" required> <br><br>

            <label for="porcentagem">Porcentagem da Gorjeta (%):</label>
            <input type="number" id="porcentagem" name="porcentagem" step="0.01" min="0" required> <br><br>

            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar" onclick="clearResult()">
        </form>
        <div class="conversor">
            <?php
            $resultado = "";
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['valorconta']) && isset($_POST['porcentagem'])) {
                    $valorconta = $_POST['valorconta'];
                    $porcentagem = $_POST['porcentagem'];
                    
                    if ($valorconta <= 0 || $porcentagem < 0) {
                        echo "<p class='error'>Por favor, insira valores válidos.</p>"; //verificação de valores inválidos
                    } else {
                        $gorjeta = ($valorconta * $porcentagem) / 100; //calcula a gorjeta
                        $resultado = number_format($gorjeta, 2);
                    }
                } else {
                    echo "<p class='error'>Formulário não enviado corretamente.</p>";
                }
            }
            ?>
            <p class='resultado'>Valor da Gorjeta: R$<span id="resultadoValor"><?php echo $resultado; ?></span></p>
        </div>
    </div>
</body>
</html>
