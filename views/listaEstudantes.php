<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style.css">
    <title>Estudantes</title>
</head>
<body>
    <?php $isNivel2 = $_SESSION['usuario']->getNivel() === '2'; ?>
    <?php include('./views/includes/menu.php'); ?>
    <div class="container">
        <?php include('./views/includes/sidebar.php'); ?>
        <div class="content">
            <header>
                <div>
                    <div class="caminho"><a href="home.php">Home</a> > <a href="estudantes.php">Estudantes</a></div>
                    <h2>Estudantes</h2>
                    <form action="estudantes.php" method="get">
                        <input type="text" name="busca">
                        <select name="campo" class="btn">
                            <option value="nome">Nome</option>
                            <option value="matricula">Matricula</option>
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
                    <a href="estudante.php" class="btn">Adicionar Estudante</a>
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
                            <th>Nome</th>
                            <th>Matrícula</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Email</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>Telefone</th>
                            <th>Curso</th>
                            <th>Ano Letivo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estudantes as $estudante): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($estudante->getNome()) ?></td>
                            <td><?php echo htmlspecialchars($estudante->getMatricula()) ?></td>
                            <td><?php echo htmlspecialchars($estudante->getCpf()) ?></td>
                            <td><?php echo htmlspecialchars($estudante->getRg()) ?></td>
                            <td><?php echo htmlspecialchars($estudante->getEmail()) ?></td>
                            <td><?php echo htmlspecialchars($estudante->getEndereco()) ?></td>
                            <td><?php echo htmlspecialchars($estudante->getCidade()) ?></td>
                            <td><?php echo htmlspecialchars($estudante->getTelefone()) ?></td>
                            <td><?php echo htmlspecialchars($estudante->getCurso()) ?></td>
                            <td><?php echo htmlspecialchars($estudante->getAnoLetivo()) ?></td>
                            <td>
                                <a href="estudante.php?id=<?php echo $estudante->getId(); ?>"><i class="fa-solid fa-pencil" style="color: #FFD43B;"></i></a>
                                |
                                <a href="estudanteDeletar.php?id=<?php echo $estudante->getId(); ?>"><i class="fa-solid fa-trash" style="color: #f00;"></i></a>
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