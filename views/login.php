<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title>Login - Sistema Academico</title>
</head>
<body>
    <div id="login">
        <header class="header">
            <img src="./views/includes/logo-ifrs.png" alt="logo IFRS">
            <h1>Gerenciador de Estágios</h1>
        </header>
        <main>
            <div>
                <h2>Login</h2>
                <form action="fazerLogin.php" class="form" method="post">
                    <label for="login">Login: </label>
                    <input type="text" name="login">
                    <label for="senha">Senha: </label>
                    <input type="password" name="senha">
                    <button type="submit" class="btn btn-submit">Entrar</button>
                </form>
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
    </div>
</body>
</html>