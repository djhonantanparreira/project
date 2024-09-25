<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Projeto Base</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
    <!-- Importar jQuery via CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Seu JavaScript -->
    <script src="<?= BASE_URL ?>/js/main.js"></script>
</head>
<body>
    <nav>
        <a href="<?= BASE_URL ?>">Home</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?= BASE_URL ?>/?action=profile">Meu Perfil</a>
            <a href="<?= BASE_URL ?>/?action=logout">Sair</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/?action=login">Login</a>
            <a href="<?= BASE_URL ?>/?action=register">Registrar</a>
        <?php endif; ?>
    </nav>
    <div class="container">
