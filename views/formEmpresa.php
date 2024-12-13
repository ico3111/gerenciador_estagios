<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title><?php echo $empresa->getNomeEmpresa() ? 'Alterar' : 'Cadastrar'; ?> Empresa</title>
</head>
<body>
    <?php include("includes/menu.php"); ?>
    <div class="container">
        <?php include("includes/sidebar.php"); ?>
        <div class="content">
            <header>
                <div>
                    <div class="caminho"><a href="home.php">Home</a> > <a href="empresas.php">Empresas</a> > <a href="#"><?php echo $empresa->getNomeEmpresa() ? 'Alterar' : 'Cadastrar'; ?> Empresa</a></div>
                    <h2><?php echo $empresa->getNomeEmpresa() ? 'Alterar' : 'Cadastrar'; ?> Empresa</h2>
                    <a href="empresas.php" class="btn">Voltar para Empresas</a>
                </div>
            </header>
            <hr>
            <main>
                <form action="empresaSalvar.php" method="POST" class="form">
                    <input type="hidden" name="id" value="<?php echo $empresa->getId(); ?>">
                
                    <label for="nome_empresa">Nome da Empresa (Razão Social):</label>
                    <input type="text" name="nome_empresa" value="<?php echo $empresa->getNomeEmpresa(); ?>" required>
                
                    <label for="num_convenio">Número Convênio:</label>
                    <input type="text" name="num_convenio" value="<?php echo $empresa->getNumConvenio(); ?>" required>
                
                    <label for="cidade_empresa">Cidade:</label>
                    <input type="text" name="cidade_empresa" id="cidade_empresa" list="lista-municipios" value="<?php echo $empresa->getCidadeEmpresa(); ?>" required>
                    <datalist id="lista-municipios"></datalist>
                
                    <label for="endereco_empresa">Endereço:</label>
                    <input type="text" name="endereco_empresa" value="<?php echo $empresa->getEnderecoEmpresa(); ?>" required>
                
                    <label for="telefone_empresa">Telefone:</label>
                    <input type="text" name="telefone_empresa" value="<?php echo $empresa->getTelefoneEmpresa(); ?>" required>
                
                    <label for="email_empresa">E-mail:</label>
                    <input type="email" name="email_empresa" value="<?php echo $empresa->getEmailEmpresa(); ?>" required>
                
                    <label for="cnpj_empresa">CNPJ:</label>
                    <input type="text" name="cnpj_empresa" value="<?php echo $empresa->getCnpjEmpresa(); ?>" required>
                
                    <label for="nome_representante">Nome do Representante:</label>
                    <input type="text" name="nome_representante" value="<?php echo $empresa->getNomeRepresentante(); ?>" required>
                
                    <label for="funcao_representante">Função do Representante:</label>
                    <input type="text" name="funcao_representante" value="<?php echo $empresa->getFuncaoRepresentante(); ?>" required>
                
                    <label for="cpf_representante">CPF do Representante:</label>
                    <input type="text" name="cpf_representante" value="<?php echo $empresa->getCpfRepresentante(); ?>" required>
                
                    <label for="rg_representante">RG do Representante:</label>
                    <input type="text" name="rg_representante" value="<?php echo $empresa->getRgRepresentante(); ?>">

                    <button type="submit" class="btn btn-submit"><?php echo $empresa->getNomeEmpresa() ? 'Alterar' : 'Cadastrar'; ?></button>
                </form>
            </main>
            <?php include('views/includes/footer.php'); ?>
        </div>
    </div>
    <script src="./sidebar.js"></script>
    <script src="./carregaMunicipios.js"></script>
</body>
</html>