<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title><?php echo $estudante->getNome() ? 'Alterar' : 'Cadastrar'; ?> Estudante</title>
</head>
<body>
    <?php include("includes/menu.php"); ?>
    <div class="container">
        <?php include("includes/sidebar.php"); ?>
        <div class="content">
            <header>
                <div>
                    <div class="caminho"><a href="home.php">Home</a> > <a href="estudantes.php">Estudantes</a> > <a href="#"><?php echo $estudante->getNome() ? 'Alterar' : 'Cadastrar'; ?> Estudante</a></div>
                    <h2><?php echo $estudante->getNome() ? 'Alterar' : 'Cadastrar'; ?> Estudante</h2>
                    <a href="empresas.php" class="btn">Voltar para Estudantes</a>
                </div>
            </header>
            <hr>
            <main>
                <form action="estudanteSalvar.php" class="form" method="POST">
                    <input type="hidden" name="id" value="<?php echo $estudante->getId(); ?>">
              
                    <label for="nome_estudante">Nome:</label>
                    <input type="text" name="nome_estudante" value="<?php echo $estudante->getNome(); ?>" required>

                    <label for="matricula_estudante">Matrícula:</label>
                    <input type="text" name="matricula_estudante" value="<?php echo $estudante->getMatricula(); ?>" required>

                    <label for="cpf_estudante">CPF:</label>
                    <input type="text" name="cpf_estudante" value="<?php echo $estudante->getCpf(); ?>" required>
            
                    <label for="rg_estudante">RG:</label>
                    <input type="text" name="rg_estudante" value="<?php echo $estudante->getRg(); ?>">
                        
                    <label for="email_estudante">E-mail:</label>
                    <input type="email" name="email_estudante" value="<?php echo $estudante->getEmail(); ?>" required>
                            
                    <label for="dataNasc_estudante">Data de Nascimento:</label>
                    <input type="date" name="dataNasc_estudante" value="<?php echo $estudante->getDataNasc(); ?>" required>
            
                    <label for="endereco_estudante">Endereço:</label>
                    <input type="text" name="endereco_estudante" value="<?php echo $estudante->getEndereco(); ?>" required>
        
                    <label for="cidade_estudante">Cidade:</label>
                    <input type="text" name="cidade_estudante" list="lista-municipios" value="<?php echo $estudante->getCidade(); ?>" required>
                    <datalist id="lista-municipios"></datalist>
    
                    <label for="telefone_estudante">Telefone:</label>
                    <input type="text" name="telefone_estudante" value="<?php echo $estudante->getTelefone(); ?>" required>
                    
                    <label for="curso_estudante">Curso:</label>
                    <select name="curso_estudante">
                        <option value="Administração" <?php echo $estudante->getCurso() === "Administração" ? 'selected' : ''; ?>>Administração</option>
                        <option value="Agropecuária" <?php echo $estudante->getCurso() === "Agropecuária" ? 'selected' : ''; ?>>Agropecuária</option>
                        <option value="Informatica" <?php echo $estudante->getCurso() === "Informatica" ? 'selected' : ''; ?>>Informática</option>
                        <option value="Meio Ambiente" <?php echo $estudante->getCurso() === "Meio Ambiente" ? 'selected' : ''; ?>>Meio Ambiente</option>
                        <option value="Viticultura e Enologia" <?php echo $estudante->getCurso() === "Viticultura e Enologia" ? 'selected' : ''; ?>>Viticultura e Enologia</option>
                    </select>

                    <label for="ano_letivo_estudante">Ano Letivo:</label>
                    <select name="ano_letivo_estudante">
                        <option value="1" <?php echo $estudante->getAnoLetivo() === "1" ? 'selected' : ''; ?>>Primeiro</option>
                        <option value="2" <?php echo $estudante->getAnoLetivo() === "2" ? 'selected' : ''; ?>>Segundo</option>
                        <option value="3" <?php echo $estudante->getAnoLetivo() === "3" ? 'selected' : ''; ?>>Terceiro</option>
                    </select>

                    <button type="submit" class="btn-submit btn"><?php echo $estudante->getNome() ? 'Alterar' : 'Cadastrar'; ?></button>
                </form>
            </main>
            <?php include('views/includes/footer.php'); ?>
        </div>
    </div>
    <script src="./sidebar.js"></script>
    <script src="./carregaMunicipios.js"></script>
</body>
</html>