<?php
require_once __DIR__ . '/../models/User.php';

// Habilitar asserções
ini_set('zend.assertions', 1);
ini_set('assert.exception', 1);

$userModel = new User();

// Teste de registro de usuário
$userData = [
    'name' => 'Teste',
    'email' => 'teste@example.com',
    'password' => 'senha123'
];
assert($userModel->register($userData) === true, description: 'Falha ao registrar usuário');

// Teste de login
$user = $userModel->login('teste@example.com', 'senha123');
assert($user !== false, 'Falha no login do usuário');

// Teste de atualização de usuário
$updateData = [
    'name' => 'Teste Atualizado',
    'email' => 'teste_atualizado@example.com'
];
assert($userModel->updateUser($user['id'], $updateData) === true, 'Falha ao atualizar usuário');

// Teste de exclusão de usuário
assert($userModel->deleteUser($user['id']) === true, 'Falha ao excluir usuário');
