<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperatura</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function clearResult() {
            document.getElementById("resultado").innerHTML = "";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Conversor de Temperatura</h1>
        <form action="temperatura.php" method="POST" onreset="clearResult()">
            <label for="valor">Temperatura:</label>
            <input type="number" id="valor" name="valor" step="0.01" required> <br><br>

            <label for="converter">Converter de:</label>
            <select id="converter" name="converter" required>
                <option value="celsius">Celsius</option>
                <option value="fahrenheit">Fahrenheit</option>
            </select> <br><br>

            <input type="submit" value="Converter">
            <input type="reset" value="Limpar">
        </form>
        <div class="conversor">
            <?php
            $resultado = "";
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['valor']) && isset($_POST['converter'])) {
                    $valor = $_POST['valor'];
                    $converter = $_POST['converter'];

                    if ($converter == "celsius") {
                        $resultado = ($valor * 9.0/5.0) + 32; // celsius para fahrenheit
                        $resultado = number_format($resultado, 2) . " °F";
                    } else {
                        $resultado = ($valor - 32) * 5.0/9.0; // fahrenheit para celsius
                        $resultado = number_format($resultado, 2) . " °C";
                    }
                } else {
                    echo "<p class='error'>Formulário não enviado corretamente.</p>";
                }
            }
            ?>
            <p>
                Valor convertido:
            </p>
            <p id="resultado">
                <?php echo $resultado; ?>
            </p>
        </div>
    </div>
</body>
</html>
