<?php
require_once 'BaseController.php';
require_once __DIR__ . '/../models/User.php';

class UserController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function home()
    {
        $this->view('home');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => $_POST['password']
            ];
            if ($this->userModel->register($data)) {
                $this->redirect(BASE_URL . '/?action=login');
            } else {
                $this->view('register', ['error' => 'Erro ao registrar usuário']);
            }
        } else {
            $this->view('register');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $user = $this->userModel->login($email, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $this->redirect(BASE_URL . '/?action=profile');
            } else {
                $this->view('login', ['error' => 'Email ou senha inválidos']);
            }
        } else {
            $this->view('login');
        }
    }

    public function profile()
    {
        if (isset($_SESSION['user_id'])) {
            $user = $this->userModel->getUserById($_SESSION['user_id']);
            $this->view('profile', ['user' => $user]);
        } else {
            $this->redirect(BASE_URL . '/?action=login');
        }
    }

    public function editProfile()
    {
        if (isset($_SESSION['user_id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email'])
                ];
                if ($this->userModel->updateUser($_SESSION['user_id'], $data)) {
                    $this->redirect(BASE_URL . '/?action=profile');
                } else {
                    $this->view('profile', ['error' => 'Erro ao atualizar perfil', 'user' => $data]);
                }
            }
        } else {
            $this->redirect(BASE_URL . '/?action=login');
        }
    }

    public function deleteAccount()
    {
        if (isset($_SESSION['user_id'])) {
            if ($this->userModel->deleteUser($_SESSION['user_id'])) {
                session_destroy();
                $this->redirect(BASE_URL . '/?action=register');
            } else {
                $this->view('profile', ['error' => 'Erro ao excluir conta']);
            }
        } else {
            $this->redirect(BASE_URL . '/?action=login');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect(BASE_URL . '/');
    }
}
