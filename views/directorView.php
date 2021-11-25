<?php

require_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class directorView
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

    public function showDirectors($directors)
    {
        $this->smarty->assign('title', 'List of Directors');
        $this->smarty->assign('directors', $directors);
        $this->smarty->display('templates/directorList.tpl');
    }

    function editDirector($director)
    {
        $this->smarty->assign('id', $director->id_director);
        $this->smarty->assign('name', $director->name);
        $this->smarty->assign('last-name', $director->last_name);
        $this->smarty->assign('date', $director->date);
        $this->smarty->assign('about_the_director', $director->about_the_director);
        $this->smarty->display('templates/editDirector.tpl');
    }
}
