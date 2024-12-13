<header class="header">
    <ul>
        <li>
            <?php if ($_SESSION['usuario']->getNivel() === '2'): ?>
                <i class="fa-solid fa-bars" id="sidebar-icon"></i>
            <?php endif; ?>
            <a href="home.php" id="logo-home">
                <i class="fa-solid fa-house"></i>
            </a>
            <a href="home.php" id="logo-ifrs">
                <img src="./views/includes/logo-ifrs.png" alt="logo IFRS">
            </a>
        </li>
        <li>
            <h1>Gerenciador de Estágios</h1>
        </li>
        <li>
            <a href="logout.php">Sair</a>
            <a href="usuario.php?id=<?php echo $_SESSION['usuario']->getId(); ?>">
                <i class="fa-solid fa-user"></i>
            </a>
        </li>
    </ul> 
</header>