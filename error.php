<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro</title>
</head>
<body>
    <h1>Erro :(</h1>
    <p><?php echo $_GET['error'] ?? 'Algo deu errado.'; ?></p>
    <hr>
    <a href="home.php">Voltar para o menu</a>
</body>
</html>