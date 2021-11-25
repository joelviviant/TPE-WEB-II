<?php

require_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class userView
{

    private $authHelper;
    private $smarty;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $isLogged = $this->authHelper->isLogged();
        $isAdmin = $this->authHelper->isAdmin();
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
        $this->smarty->assign('isLogged', $isLogged);
        $this->smarty->assign('isAdmin', $isAdmin);
    }

    function showUsers($users)
    {

        $this->smarty->assign('title', 'List of Users');
        $this->smarty->assign('users', $users);
        $this->smarty->display('templates/userList.tpl');
    }

    function editUser($user)
    {
        $this->smarty->assign('title', 'Edit users');
        $this->smarty->assign('name', $user->name);
        $this->smarty->assign('id', $user->id_user);
        $this->smarty->assign('mail', $user->mail);
        $this->smarty->assign('type', $user->type);
        $this->smarty->display('templates/editUser.tpl');
    }

    function showError($error)
    {
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/editUser.tpl');
    }
}
