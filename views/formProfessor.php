<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title><?php echo $professor->getNome() ? 'Alterar' : 'Cadastrar'; ?> professor</title>
</head>
<body>
    <?php include("includes/menu.php"); ?>
    <div class="container">
        <?php include("includes/sidebar.php"); ?>
        <div class="content">
            <main>
                <header>
                    <div>
                        <div class="caminho"><a href="home.php">Home</a> > <a href="professores.php">Professores</a> > <a href="#"><?php echo $professor->getId() ? 'Alterar' : 'Cadastrar'; ?> Professor</a></div>
                        <h2><?php echo $professor->getId() ? 'Alterar' : 'Cadastrar'; ?> Professor</h2>
                        <a href="professores.php" class="btn">Voltar para Professores</a>
                    </div>
                </header>
                <hr>
                <form action="professorSalvar.php" class="form" method="POST">
                    <input type="hidden" name="id" value="<?php echo $professor->getId(); ?>">
    
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome_professor" value="<?php echo $professor->getNome(); ?>" required>

                    <label for="siap">SIAPE:</label>
                    <input type="text" name="siap_professor" value="<?php echo $professor->getSiap(); ?>" required>
    
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf_professor" value="<?php echo $professor->getCpf(); ?>" required>
    
                    <label for="email">E-mail:</label>
                    <input type="email" name="email_professor" value="<?php echo $professor->getEmail(); ?>" required>
        
                    <button type="submit" class="btn btn-submit"><?php echo $professor->getNome() ? 'Alterar' : 'Cadastrar'; ?></button>
                </form>
            </main>
            <?php include('views/includes/footer.php'); ?>
        </div>
    </div>

    <script src="./sidebar.js"></script>
</body>
</html>