<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title>Gerenciador de Estagios - Home</title>
</head>
<body>
    <?php include('views/includes/menu.php'); ?>
    <div class="container">
        <?php include('views/includes/sidebar.php'); ?>
        <div class="content">
            <header>
                <div>
                    <div class="caminho "><a href="home.php">Home</a> ></div>
                    <h2>Olá, <?php echo $_SESSION['usuario']->getNomeEntidade(); ?>!</h2>
                </div>
            </header>
            <main>
                <ul>
                    <li>
                        <a class="card" href="estagios.php">
                            <img src="./views/includes/estagio.png" alt="icone estagio" class="card-img">
                            <h3 class="card-descricao">Estágios</h3>
                        </a>
                    </li>
                    <?php if ($_SESSION['usuario']->getNivel() === '2'): ?>
                    
                    <li>
                        <a class="card" href="empresas.php">
                            <img src="./views/includes/empresa.png" alt="icone empresa" class="card-img">
                            <h3 class="card-descricao">Empresas</h3>
                        </a>
                    </li>
                    <li>
                        <a class="card" href="professores.php">
                            <img src="./views/includes/professor.png" alt="icone professor" class="card-img">
                            <h3 class="card-descricao">Professores</h3>
                        </a>
                    </li>
                    <li>
                        <a class="card" href="estudantes.php">
                            <img src="./views/includes/estudante.png" alt="icone estudante" class="card-img">
                            <h3 class="card-descricao">Estudantes</h3>
                        </a>
                    </li>
                    <li>
                        <a class="card" href="usuarios.php">
                            <img src="./views/includes/usuario.png" alt="icone usuario" class="card-img">
                            <h3 class="card-descricao">Usuários</h3>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php if ($_SESSION['usuario']->getNivel() === '2'): ?>
                <hr>
                <ul>
                    <li>
                        <a class="card" href="estagio.php">
                            <img src="./views/includes/plus.png" alt="icone de adicionar" class="card-img">
                            <h3 class="card-descricao">Adicionar Estagio</h3>
                        </a>
                    </li>
                </ul>
                <?php endif; ?>
            </main>
            <?php include('views/includes/footer.php'); ?>
        </div>
    </div>
    
    <script src="./sidebar.js"></script> 
</body>
</html>