<?php
require_once __DIR__ . '/../app/controllers/UserController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$userController = new UserController();

switch ($action) {
    case 'register':
        $userController->register();
        break;
    case 'login':
        $userController->login();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'profile':
        $userController->profile();
        break;
    case 'editProfile':
        $userController->editProfile();
        break;
    case 'deleteAccount':
        $userController->deleteAccount();
        break;
    default:
        // Call the public method home()
        $userController->home();
        break;
}
