<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function clearResult() {
            document.getElementById("resultado").innerHTML = "";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Conversor de Moedas</h1>
        <form action="conversor.php" method="POST" id="conversorForm" onreset="clearResult()">
            <label for="valor"> Valor: </label>
            <input type="number" id="valor" name="valor" step="0.01" min="0" required> <br><br>

            <label for="converterd"> Converter de: </label>
            <select id="converterd" name="converterd" required>
                <option value="BRL">BRL</option>
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
            </select> <br><br>

            <label for="converterp"> Converter para: </label>
            <select id="converterp" name="converterp" required>
                <option value="BRL">BRL</option>
                <option value="EUR">EUR</option>
                <option value="USD">USD</option>
            </select> <br><br>

            <input type="submit" value="Converter">
            <input type="reset" value="Limpar">
        </form>
        <div class="conversor">
            <?php
            $resultado = "";
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['valor']) && isset($_POST['converterd']) && isset($_POST['converterp'])) {
                    $valor = $_POST['valor'];
                    $converterd = $_POST['converterd'];
                    $converterp = $_POST['converterp'];

                    if ($valor <= 0) {
                        echo "<p class='error'>Por favor, insira um valor maior que zero.</p>";
                    } else {
                        // Taxas de conversão
                        $taxas = [
                            'BRL_USD' => 0.19,
                            'USD_BRL' => 5.37,
                            'USD_EUR' => 0.93,
                            'EUR_USD' => 1.07,
                            'BRL_EUR' => 0.1735,
                            'EUR_BRL' => 5.764
                        ];

                        if ($converterd == $converterp) {
                            $resultado = $valor;
                        } else {
                            $chave = "{$converterd}_{$converterp}";
                            if (isset($taxas[$chave])) {
                                $resultado = $valor * $taxas[$chave];
                            } else {
                                echo "<p class='error'>Conversão de moeda não disponível.</p>";
                                exit;
                            }
                        }

                        $resultado = number_format($resultado, 2) . " $converterp";
                    }
                } else {
                    echo "<p class='error'>Formulário não enviado corretamente.</p>";
                }
            }
            ?>
            <p class="result-label">Valor convertido: <p id="resultado"> <?php echo $resultado; ?>
            </p>
        </div>
    </div>
</body>
</html>
