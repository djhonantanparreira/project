<h2>Login</h2>
<?php if (isset($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>
<form method="post" action="<?= BASE_URL ?>/?action=login">
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Senha:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Entrar</button>
</form>
