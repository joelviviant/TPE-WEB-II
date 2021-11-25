<?php
require_once "views/loginView.php";
require_once "models/userModel.php";
require_once "helpers/authHelper.php";
require_once "views/registerView.php";
require_once "views/userView.php";

class UserController
{

    private $loginview;
    private $model;
    private $authHelper;
    private $registerview;
    private $userview;


    public function __construct()
    {
        $this->loginview = new LoginView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
        $this->registerview = new RegisterView();
        $this->userview = new userView();
    }

    function registerUser()
    {
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $User = $this->model->getUserEmail($email);
            if (isset($User) && !empty($User)) {
                $this->registerview->showRegister("That email has already been registered");
            } else {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->model->insertUser($name, $email, $password, 'no-admin');
                $user = $this->model->getUserEmail($email);
                $this->authHelper->login($user);
                $this->registerview->showHome();
            }
        }
    }

    function logout()
    {
        $this->authHelper->checkLoggedIn();
        session_destroy();
        $this->loginview->showLogin("You are no longer logged in");
    }

    public function showLog()
    {
        $isLog = $this->authHelper->isLogged();
        if ($isLog)
            $this->loginview->showHome();
        else
            $this->loginview->showLog();
    }

    public function verifyLogin()
    {

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->getUserEmail($email);

            if ($user && password_verify($password, $user->clave)) {
                $this->authHelper->login($user);
                $this->loginview->showHome();
            } else {
                $this->loginview->showLog("Access not allowed");
            }
        }
    }

    function deleteUser($id_usuario)
    {
        $this->authHelper->checkLoggedIn();
        $isAd = $this->authHelper->isAdmin();
        if ($isAd) {
            $this->model->deleteUser($id_user);
            header("Location: " . BASE_URL . "users");
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }

    function showRegister()
    {
        $isLog = $this->authHelper->isLogged();
        if ($isLog)
            $this->registerview->showHome();
        else
            $this->registerview->showRegister();
    }

    function getUsers()
    {
        $this->authHelper->checkLoggedIn();
        $isAd = $this->authHelper->isAdmin();
        if ($isAd) {
            $users = $this->model->getUsers();
            $this->userview->showUsers($users);
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }

    function editUser($id_user)
    {
        $this->authHelper->checkLoggedIn();
        $isAd = $this->authHelper->isAdmin();
        if ($isAd) {
            if (
                isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['type'])
            ) {

                $name = $_POST['name'];
                $mail = $_POST['mail'];
                $type = $_POST['type'];
                $this->model->editUser($name, $mail, $type, $id_user);
                header("Location: " . BASE_URL . "users");
            } else {
                $this->userview->showError("Fill in all the data");
            }
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }

    function editUserForm($id)
    {
        $this->authHelper->checkLoggedIn();
        $isAd = $this->authHelper->isAdmin();
        if ($isAd) {
            $user = $this->model->getUserById($id);
            $this->userview->editUser($user);
        } else {
            header("Location: " . BASE_URL . "login");
        }
    }

   
}
