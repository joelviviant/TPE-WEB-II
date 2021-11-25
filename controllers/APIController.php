<?php

require_once "models/remarkModel.php";
require_once "views/apiView.php";
require_once "models/filmModel.php";
require_once "helpers/authHelper.php";

class APIController
{

    private $model;
    private $view;
    private $authHelper;
    private $modelFilm;

    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new remarkModel();
        $this->view = new apiView();
        $this->modelBook = new filmModel();
    }


    public function getRemarkFilm($params = null)
    {
        $warrant = $params[":ID"];
        $warrantBy = null;
        $warrant = null;
        $film = $this->modelFilm->getFilm($idFilm);
        if (isset($film )) {
            if (isset($_GET['warrantBy']) && ($_GET['warrantBy'] == 'qualification' || $_GET['warrantBy'] == 'año')) {
                $warrant = $_GET['warrant'];
            } else {
                $warrant = 'fecha_creacion';
            }
            if (isset($_GET['warrant']) && ($_GET['warrant'] == 'asc' || $_GET['warrant'] == 'desc'))
                $warrant = $_GET['warrant'];
            else
                $warrant = 'desc';
            $remarks = $this->model->getRemarkFilm($warrant, $warrant, $warrant);
            if (isset($remarks) && !empty($remarks)) {
                return $this->view->response($remarks, 200);
            } else {
                return $this->view->response([], 200);
            }
        } else {
            return $this->view->response("the film does not exist", 404);
        }
    }

    public function addRemarkFilm()
    {
        $this->authHelper->isLogged();
        $id_usuario = $this->authHelper->getUserId();
        $body = $this->getBody();
        if (!isset($body->qualification) || !isset($body->remark) || !isset($body->id_film)) {
            $this->view->response("enter all data please", 400);
        } else {
            $film = $this->$modelFilm->getBook($body->id_film);
            if (!isset($film)) {
                $this->view->response("the film already exists", 404);
            } else {
                $idRemark = $this->model->addRemarkFilm($body->remark, $body->qualification, $id_user, $body->id_film);
                if (isset($idRemark)) {
                    $this->view->response("Congratulations was added successfully", 201);
                } else {
                    $this->view->response("Could not be added", 500);
                }
            }
        }
    }

    public function deleteRemark($params = null)
    {
        $isLogged = $this->authHelper->isLogged();
        if ($isLogged) {
            $isAdmin = $this->authHelper->isAdmin();
            if ($isAdmin) {
                $idRemark = $params[":ID"];
                $remark = $this->model->getRemark($idRemark);
                if (isset($remark)) {
                    $this->model->deleteRemark($idRemark);
                    return $this->view->response("The remark has been deleted", 200);
                } else {
                    return $this->view->response("Remark does not exist", 404);
                }
            } else {
                return $this->view->response("You are not an administrator", 401);
            }
        } else {
            return $this->view->response("You need to be logged in", 402);
        }
    }

    function getFilm($params = null)
    {
        $idFilm =  $params[":ID"];
        $film = $this->$modelFilm->getFilm($idBook);
        if ($film) {
            $this->view->response($film, 200);
        } else {
            return $this->view->response("The film does not exist", 404);
        }
    }


    private function getBody()
    {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }
}
