<?php

require_once "models/directorModel.php";
require_once "views/directorView.php";
require_once "helpers/authHelper.php";

class DirectorController
{

    private $model;
    private $view;
    private $authHelper;

    function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new directorModel();
        $this->view = new directorView();
    }

    function getDirectors()
    {
        $directors= $this->model->getDirectors();
        $this->view->showDirectors($directors);
    }

    function addDirectors()
    {
        $this->authHelper->checkLoggedIn();
        $name = $_POST['name'];
        $last_Name = $_POST['last-name'];
        $date_of_birth = $_POST['date of birth'];
        $about_the_director = $_POST['about the director'];
        $this->model->addDirectors($name, $last_Name, $date_of_birth, $about_the_director);
        header("Location: " . BASE_URL . "directors");
    }

    function deleteDirector($id)
    {
        $this->authHelper->checkLoggedIn();
        $this->model->deleteDirector($id);
        header("Location: " . BASE_URL . "directors");
    }


    function editDirector($id)
    {
        $this->authHelper->checkLoggedIn();
        if (
            isset($_POST['name']) && isset($_POST['last-name']) && isset($_POST['date of birth'])
            && isset($_POST['about the director'])
        ) {

            $name = $_POST['name'];
            $last_Name = $_POST['last-name'];
            $date_of_birth = $_POST['date of birth'];
            $about_the_director = $_POST['about the director'];
            $this->model->editDirector($id, $name, $last_Name, $date_of_birth, $about_the_director);
        }
        header("Location: " . BASE_URL . "directors");
    }

    function editDirectorForm($id)
    {
        $this->authHelper->checkLoggedIn();
        $director = $this->model->getDirectors($id);
        $this->view->editDirector($director);
    }    
}
