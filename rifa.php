<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa</title>
    <link rel="stylesheet" href="rifa.css">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    $premio = "Funko Pop edição limitada Wanda Maximoff - Vingadores";
    $valor = "R$ 5,00";
    $imagem = "https://http2.mlstatic.com/D_NQ_NP_738645-MLB52404733477_112022-O.webp";
    echo "<h1 class='titulo'>Ação entre amigos - CSL</h1>";
    echo "<div class='headerTitle'>";
    echo "<h2 class='subtitulo'>Quantas rifas gerar: </h2>";
    echo "<div class='head'>";

    echo "<form action='rifa.php' method='get'>";
    echo "<input type='number' placeholder='Digite a quantidade' min='1' max='9999' maxlength=4 name='valor' required/>";
    echo "<button type='submit'>Gerar Rifas</button>"; 
    echo "</form>";
    echo "<form action='index.php' method='get'>";
    echo "<button type='submit class='voltar'>Voltar</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";

    if (isset($_GET['valor']) && !empty($_GET['valor'])) {
        $numero = 1;
        $quantidade = (int) $_GET['valor'];
        while ($numero <= $quantidade) {
            echo "<table>
        <tr>
            <td class='dados'>
                <p class='number'><b>Nº ";
            echo str_pad($numero, 4, '0', STR_PAD_LEFT);
            echo "</b></p>
                <p>Nome: ______________________________</p>
                <p>Telefone: ____________________________</p>
                <p>Email: ______________________________</p>
            </td>
            
            <td class='premio'>
                <h2>Ação entre amigos - CSL</h2>
                <p>$premio</p>
                <p>Valor: $valor</p>
                <p><b>Nº ";
            echo str_pad($numero, 4, '0', STR_PAD_LEFT);
            echo "</b></p>
            </td>
            <td>
                <img src='$imagem' alt='foto' class='foto' />
            </td>
        </tr></table>";
            $numero++;
        }
    }
    ?>
</body>

</html>
