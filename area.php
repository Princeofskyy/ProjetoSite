<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Áreas</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function showFields() {
            var forma = document.getElementById("forma").value;
            document.getElementById("retanguloFields").style.display = (forma == "retangulo") ? "block" : "none";
            document.getElementById("trianguloFields").style.display = (forma == "triangulo") ? "block" : "none";
            document.getElementById("circuloFields").style.display = (forma == "circulo") ? "block" : "none";
        }
     //função para fazer p botão "limpar"também limpar o resultado final do calculo
        function clearResult() {
            document.getElementById("resultadoValor").innerHTML = "";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Áreas</h1>
        <form action="area.php" method="POST">
            <label for="forma">Escolha a forma:</label>
            <select id="forma" name="forma" onchange="showFields()" required>
                <option value="">Selecione</option>
                <option value="retangulo">Retângulo</option>
                <option value="triangulo">Triângulo</option>
                <option value="circulo">Círculo</option>
            </select> <br><br>

            <div id="retanguloFields" style="display:none;">
                <label for="largura">Digite a largura (em metros):</label>
                <input type="number" id="largura" name="largura" step="0.01" min="0"> <br><br>
                <label for="altura">Digite a altura (em metros):</label>
                <input type="number" id="altura" name="altura" step="0.01" min="0"> <br><br>
            </div>

            <div id="trianguloFields" style="display:none;">
                <label for="base">Digite a base (em metros):</label>
                <input type="number" id="base" name="base" step="0.01" min="0"> <br><br>
                <label for="alturaTriangulo">Digite a altura do Triângulo (em metros):</label>
                <input type="number" id="alturaTriangulo" name="alturaTriangulo" step="0.01" min="0"> <br><br>
            </div>

            <div id="circuloFields" style="display:none;">
                <label for="raio">Digite o raio (em metros):</label>
                <input type="number" id="raio" name="raio" step="0.01" min="0"> <br><br>
            </div>

            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar" onclick="clearResult()">
        </form>
        <div class="conversor">
            <?php
            $resultado = "";
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $forma = $_POST['forma'];

                if ($forma == "retangulo" && isset($_POST['largura']) && isset($_POST['altura'])) {
                    $largura = $_POST['largura'];
                    $altura = $_POST['altura'];
                    $resultado = $largura * $altura;
                    $resultado = "Área do Retângulo: " . number_format($resultado, 2) . " m²";
                } elseif ($forma == "triangulo" && isset($_POST['base']) && isset($_POST['alturaTriangulo'])) {
                    $base = $_POST['base'];
                    $alturaTriangulo = $_POST['alturaTriangulo'];
                    $resultado = 0.5 * $base * $alturaTriangulo;
                    $resultado = "Área do Triângulo: " . number_format($resultado, 2) . " m²";
                } elseif ($forma == "circulo" && isset($_POST['raio'])) {
                    $raio = $_POST['raio'];
                    $resultado = pi() * pow($raio, 2);
                    $resultado = "Área do Círculo: " . number_format($resultado, 2) . " m²";
                } else {
                    echo "<p class='error'>Por favor, preencha todos os campos corretamente.</p>";
                }
            }
            ?>
            <p class='resultado'>Valor convertido: <span id="resultadoValor"><?php echo $resultado; ?></span></p>
        </div>
    </div>
</body>
</html>
