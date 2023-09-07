<!DOCTYPE html>
<html>
<head>
    <title>Teste de Rede</title>
</head>
<body>
    <h1>Teste de Rede</h1>

    <?php
    // Verifique se foi feita uma solicitação GET
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo "<p>Método GET utilizado.</p>";
        // Aqui você pode adicionar código para processar os parâmetros GET, se necessário.
    }

    // Verifique se foi feita uma solicitação POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>Método POST utilizado.</p>";
        // Aqui você pode adicionar código para processar os dados POST, se necessário.
    }
    ?>

    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <br>
        <input type="submit" value="Enviar via POST">
    </form>

    <br>

    <form method="get">
        <label for="idade">Idade:</label>
        <input type="text" name="idade" id="idade">
        <br>
        <input type="submit" value="Enviar via GET">
    </form>
</body>
</html>
