<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title>Adicionar/Alterar Usuário</title>
</head>
<body>
    <?php include("includes/menu.php"); ?>
    <div class="container">
        <?php include("includes/sidebar.php"); ?>
        <div class="content">
            <header>
                <div>
                    <div class="caminho"><a href="home.php">Home</a> > <?php if ($_SESSION['usuario']->getNivel() === '2'): ?> <a href="usuarios.php">Usuarios</a> > <?php endif; ?> <a href="#"><?php echo $usuario->getId() ? 'Alterar' : 'Cadastrar'; ?> Usuario</a></div>
                    <h2><?php echo $usuario->getId() ? 'Alterar' : 'Cadastrar'; ?> Usuario</h2>
                    <a href="usuarios.php" class="btn">Voltar para Usuarios</a>
                </div>
            </header>
            <hr>
            <main>
                <form action="usuarioSalvar.php" class="form" method="POST">
                    <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
                    <input type="hidden" name="id_entidade" value="<?php echo $usuario->getIdEntidade(); ?>">
                
                    <label for="login">Login: </label>
                    <input type="text" name="login" value="<?php echo htmlspecialchars($usuario->getLogin()); ?>" required>
                
                    <label for="senha">Senha: </label>
                    <input type="password" name="senha" placeholder="<?php echo empty($usuario->getId()) ? 'Informe a senha' : 'Em branco para manter a senha atual'; ?>">
                
                    <label for="nome_entidade">Nome: </label>
                    <input type="text" name="nome_entidade" value="<?php echo htmlspecialchars($usuario->getNomeEntidade()); ?>" required>
                
                    <label for="email_entidade">Email: </label>
                    <input type="email" name="email_entidade" value="<?php echo htmlspecialchars($usuario->getEmailEntidade()); ?>" required>
                
                    <?php if ($_SESSION['usuario']->getNivel() === '2'): ?>

                    <label for="tipo_entidade">Tipo de Usuário: </label>
                    <select name="tipo_entidade">
                        <option value="estudante" <?php echo $usuario->getTipoEntidade() === 'Estudante' ? 'selected' : ''; ?>>Estudante</option>
                        <option value="empresa" <?php echo $usuario->getTipoEntidade() === 'Empresa' ? 'selected' : ''; ?>>Empresa</option>
                        <option value="professor" <?php echo $usuario->getTipoEntidade() === 'Professor' ? 'selected' : ''; ?>>Professor</option>
                        <option value="administrador" <?php echo $usuario->getTipoEntidade() === 'Administrador' ? 'selected' : ''; ?>>Administrador</option>
                    </select>

                    <label for="nivel">Nível de Acesso: </label>
                    <select name="nivel">
                        <option value="1" <?php echo $usuario->getNivel() === '1' ? 'selected' : ''; ?>>Nível 1 (Somente Leitura)</option>
                        <option value="2" <?php echo $usuario->getNivel() === '2' ? 'selected' : ''; ?>>Nível 2 (Edição e Remoção)</option>
                    </select>
                
                    <?php else: ?>
                        <input type="hidden" name="tipo_entidade" value="<?php echo $usuario->getTipoEntidade(); ?>">
                        <input type="hidden" name="nivel" value="<?php echo $usuario->getNivel(); ?>">
                    <?php endif; ?>

                    <button type="submit" class="btn-submit btn">Salvar</button>
                </form>
            </main>
            <?php include('views/includes/footer.php'); ?>
        </div>
    </div>

    <script src="./sidebar.js"></script>
</body>
</html>
