<?php

require_once "libs/smarty-3.1.39/libs/Smarty.class.php";

class filmView
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


    public function showFilms($films, $directors, $countPag)
    {
        $this->smarty->assign('title', 'List of Films');
        $this->smarty->assign('directors', $directors);
        $this->smarty->assign('films', $films);
        $this->smarty->assign('countPag', $countPag);
        $this->smarty->display('templates/filmList.tpl');
    }

    public function showFilm($films)
    {
        $this->smarty->assign('title', 'Data of Film');
        $this->smarty->assign('film', $film);
        $this->smarty->display('templates/filmLayout.tpl');
    }

    public function editFilms($films)
    {
        $this->smarty->assign('id', $films->id_film);
        $this->smarty->assign('title', $films->title);
        $this->smarty->assign('description', $films->description);
        $this->smarty->assign('category', $films->category);
        $this->smarty->assign('date', $films->date);
        $this->smarty->display('templates/editFilm.tpl');
    }

    public function showFilmsByDirectors($films)
    {
        $this->smarty->assign('title', 'List of Films');
        $this->smarty->assign('films', $films);
        $this->smarty->display('templates/filmsByDirectors.tpl');
    }
}
