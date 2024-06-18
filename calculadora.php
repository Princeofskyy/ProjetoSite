<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora IMC</title>
    <link rel="stylesheet" href="style.css">
    <script>
        //função para fazer p botão "limpar"também limpar o resultado final do calculo
        function clearResult() {
            document.getElementById("resultado").innerHTML = "";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Calculadora IMC</h1>
        <form action="calculadora.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required> <br><br>

            <label for="peso">Peso (kg):</label>
            <input type="number" id="peso" name="peso" step="0.1" required> <br><br>

            <label for="altura">Altura (m):</label>
            <input type="number" id="altura" name="altura" step="0.01" required> <br><br>

            <label for="anonasc">Ano Nascimento:</label>
            <input type="number" id="anonasc" name="anonasc" required> <br><br>

            <input type="submit" value="Calcular IMC">
            <input type="reset" value="Limpar" onclick="clearResult()">
        </form>
        <div class="resposta">
            <p id="resultado">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_POST['peso']) && isset($_POST['altura']) && isset($_POST['nome']) && isset($_POST['anonasc'])) {
                        $peso = $_POST['peso'];
                        $altura = $_POST['altura'];
                        $nome = $_POST['nome'];
                        $anonasc = $_POST['anonasc'];
                        $anoatual = date('Y');
                        $idade = $anoatual - $anonasc;

                        $erro = empty($peso) || empty($altura) || empty($nome) || empty($anonasc) ? "Todos os campos são obrigatórios!" :
                            ((!is_numeric($altura) || $peso <= 0 || $altura <= 0) ? "Por favor, insira valores válidos para peso e altura!" : "");
                        if ($erro) {
                            echo $erro;
                        } else {
                            $imc = $peso / ($altura * $altura);
                            $imc = number_format($imc, 2);
                            $classificacao = ($imc < 18.5) ? "Abaixo do peso!" :
                                (($imc < 24.9) ? "Peso normal!" :
                                    (($imc < 29.9) ? "Sobrepeso!" : "Obesidade!"));
                            echo "<br>$nome, segue seus dados:<br>";
                            echo "Idade: $idade anos<br>";
                            echo "Seu IMC é: $imc<br>";
                            echo "Classificação: $classificacao";
                        }
                    } else {
                        echo "Formulário não enviado corretamente";
                    }
                }
                ?>
            </p>
        </div>
    </div>
</body>
</html>
