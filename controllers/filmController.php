<?php

require_once "models/filmModel.php";
require_once "views/filmView.php";
require_once "helpers/authHelper.php";
require_once "models/directorModel.php";

class FilmController
{
    private $model;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new filmModel();
        $this->view = new filmView();
    }

    public function getFilms()
    {
        if (isset($_GET['number']))
            $page = (int) $_GET['number'];
        else
            $page = 1;
        if (isset($_GET['numbers']))
            $pageSize = (int) $_GET['numbers'];
        else
            $pageSize = 2;

        if ($page == 1)
            $offset = 0;
        else
            $offset = ($numbers * $number) - 2;
        $film = $this->model->getFilm($offset, $numbers);
        $counts = $this->model->countFilms();
        $filmModel = new FilmModel();
        $this->view->showFilms($film, $DirectorModel->getDirector(), $counts->size / $numbers);
    }

    public function getFilm($id)
    {
        $film = $this->model->getFilm($id);
        $this->view->showFilm($film);
    }
    public function addFilm()
    {
        $this->authHelper->checkLoggedIn();
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $id_director = $_POST['director'];
        $this->model->addBook($title, $description, $category, $date, $id_director);
        header("Location: " . BASE_URL);
    }

    public function deleteFilm($id)
    {
        $this->authHelper->checkLoggedIn();
        $this->model->deleteFilm($id);
        header("Location: " . BASE_URL);
    }

    public function editFilm($id)
    {
        $this->authHelper->checkLoggedIn();
        if (
            isset($_POST['title']) && isset($_POST['description']) && isset($_POST['category'])
            && isset($_POST['date'])
        ) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $date = $_POST['date'];
            $this->model->editfilm($id, $title, $description, $category, $date);
        }
    }

    public function editFilmForm($id)
    {
        $this->authHelper->checkLoggedIn();
        $film = $this->model->getFilm($id);
        $this->view->editFilm($film);
    }

  

    function getFilmByDirector($id_director)
    {
        $film = $this->model->getFilmByDirector($id_director);
        $this->view->showFilmsByDirector($films);
    }

    
}
