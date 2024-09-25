<h2>Meu Perfil</h2>
<?php if (isset($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>
<form method="post" action="<?= BASE_URL ?>/?action=editProfile">
    <label>Nome:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
    <button type="submit">Atualizar Perfil</button>
</form>
<form method="post" action="<?= BASE_URL ?>/?action=deleteAccount" onsubmit="return confirm('Tem certeza que deseja excluir sua conta?');">
    <button type="submit">Excluir Conta</button>
</form>
