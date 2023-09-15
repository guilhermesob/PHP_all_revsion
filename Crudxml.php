<?php
// Verifique se o arquivo XML existe, se não, crie um
$nomeArquivo = 'dados.xml';
if (!file_exists($nomeArquivo)) {
    $xml = new SimpleXMLElement('<data></data>');
    $xml->asXML($nomeArquivo);
}

// Função para ler os dados do arquivo XML
function lerDadosXML($arquivo) {
    $xml = simplexml_load_file($arquivo);
    return $xml;
}

// Função para adicionar um novo item no XML
function adicionarItemXML($arquivo, $item) {
    $xml = lerDadosXML($arquivo);
    $novoItem = $xml->addChild('item', $item);
    $xml->asXML($arquivo);
}

// Função para excluir um item do XML
function excluirItemXML($arquivo, $item) {
    $xml = lerDadosXML($arquivo);
    foreach ($xml->item as $i => $value) {
        if ($value == $item) {
            unset($xml->item[$i]);
        }
    }
    $xml->asXML($arquivo);
}

// Processar solicitações POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $novoItem = $_POST['novoItem'];
        adicionarItemXML($nomeArquivo, $novoItem);
    } elseif (isset($_POST['excluir'])) {
        $itemParaExcluir = $_POST['itemParaExcluir'];
        excluirItemXML($nomeArquivo, $itemParaExcluir);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD com XML</title>
</head>
<body>
    <h1>Lista de Itens</h1>
    <ul>
        <?php
        $xml = lerDadosXML($nomeArquivo);
        foreach ($xml->item as $item) {
            echo '<li>' . $item . '</li>';
        }
        ?>
    </ul>

    <h2>Adicionar um Novo Item</h2>
    <form method="post">
        <input type="text" name="novoItem" placeholder="Novo item" required>
        <input type="submit" name="adicionar" value="Adicionar">
    </form>

    <h2>Excluir um Item</h2>
    <form method="post">
        <select name="itemParaExcluir" required>
            <?php
            foreach ($xml->item as $item) {
                echo '<option value="' . $item . '">' . $item . '</option>';
            }
            ?>
        </select>
        <input type="submit" name="excluir" value="Excluir">
    </form>
</body>
</html>
