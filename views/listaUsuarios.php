<!DOCTYPE html>
<html lang="py-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title>Sistema Acadêmico - Usuário</title>
</head>
<body>
    <?php $isNivel2 = $_SESSION['usuario']->getNivel() === '2'; ?>
    <?php include('./views/includes/menu.php'); ?>
    <div class="container">
        <?php include('./views/includes/sidebar.php'); ?>
        <div class="content">
            <header>
                <div>
                    <div class="caminho"><a href="home.php">Home</a> > <a href="usuarios.php">Usuarios</a></div>
                    <h2>Usuários</h2>
                    <form action="usuarios.php">
                        <input type="text" name="busca">
                        <select name="campo" class="btn">
                            <option value="nome">nome</option>
                            <option value="login">login</option>
                            <option value="cpf">CPF</option>
                            <option value="rg">RG</option>
                            <option value="curso">Curso</option>
                        </select>
                        <select name="ordem" class="btn">
                            <option value="ASC">Crescente</option>
                            <option value="DESC">Decrescente</option>
                        </select>
                        <button type="submit" class="btn">Buscar</button>
                    </form>
                </div>
                <?php if ($isNivel2): ?>
                    <a href="usuario.php" class="btn">Adicionar Usuário</a>
                <?php endif; ?>
            </header>
            <hr>
            <main>
                <div class="zoom-btns">
                    <button type="button" id="zoomzar" class="btn">Zoom +</button>
                    <button type="button" id="deszoomzar" class="btn">Zoom -</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Login</th>
                            <th>Senha</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Email</th>
                            <th>Nível</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario->getLogin()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getSenha()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getNomeEntidade()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getTipoEntidade()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getEmailEntidade()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getNivel()); ?></td>
                            <td>
                                <a href="usuario.php?id=<?php echo $usuario->getId(); ?>"><i class="fa-solid fa-pencil" style="color: #FFD43B;"></i></a>
                                |
                                <a href="usuarioDeletar.php?id=<?php echo $usuario->getId(); ?>"><i class="fa-solid fa-trash" style="color: #f00;"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </main>
            <?php include('views/includes/footer.php'); ?>
        </div>
    </div>
            
    <script src="./zoom.js"></script>
    <script src="./sidebar.js"></script>
</body>
</html>