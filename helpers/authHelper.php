<?php
class AuthHelper
{
    public function __construct()
    {
    }

    public function login($user)
    {
        session_start();
        $_SESSION['ID_USER'] = $user->id_user;
        $_SESSION['EMAIL'] = $user->mail;
        $_SESSION['TYPE'] = $user->type;
    }

    public function logout()
    {
        if (!isset($_SESSION))
            session_start();
        session_destroy();
    }

    public function checkLoggedIn()
    {
        if (!isset($_SESSION))
            session_start();
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }

    public function isLogged()
    {
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['ID_USER'])) return true;
        return false;
    }

    public function isAdmin()
    {
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['TYPE']))
            return $_SESSION['TYPE'] == 'admin';
        return false;
    }

    public function getUserId()
    {

        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['ID_USER']))
            return $_SESSION['ID_USER'];
    }
}
