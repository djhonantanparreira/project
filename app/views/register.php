<h2>Registrar</h2>
<?php if (isset($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>
<form method="post" action="<?= BASE_URL ?>/?action=register">
    <label>Nome:</label><br>
    <input type="text" name="name" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Senha:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Registrar</button>
</form>
