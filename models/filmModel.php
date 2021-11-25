<?php

class filmModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=cinema;charset=utf8', 'root', '');
    }

    function getFilms($offset, $limit)
    {
        $query = $this->db->prepare('SELECT l.*, f.name, f.last_name FROM films l JOIN directors e ON l.id_director = f.id_director limit ?, ?');
        $query->bindParam(2, $limit, PDO::PARAM_INT);
        $query->bindParam(1, $offset, PDO::PARAM_INT);
        $query->execute();
        $films = $query->fetchAll(PDO::FETCH_OBJ);
        return $films;
    }

    function countFilms()
    {
        $query = $this->db->prepare("SELECT count(*) as amount FROM films l JOIN directors e ON l.id_director = f.id_director");
        $query->execute();
        $amount = $query->fetch(PDO::FETCH_OBJ);
        return $amount;
    }

    function getFilmByDirector($id_director)
    {
        $query = $this->db->prepare("SELECT l.*, f.name, f.last_name FROM films l JOIN directors f ON l.id_director = f.id_director WHERE f.id_director = ?");
        $query->execute([$id_director]);
        $films = $query->fetchAll(PDO::FETCH_OBJ);
        return $films;
    }

    function getfilm($id_films)
    {
        $query = $this->db->prepare("SELECT l.*, e.name, e.last_name FROM films l JOIN directors e ON l.id_director = e.id_director WHERE id_director = ?");
        $query->execute([$id_films]);
        $film = $query->fetch(PDO::FETCH_OBJ);
        return $film;
    }

    function editFilm($id_films, $title, $description, $category, $date)
    {
        $query = $this->db->prepare("UPDATE films SET title = ?, description = ?, category = ?, date = ? WHERE id_director = ?");
        $query->execute([$title, $description, $category, $date, $id_films]);
    }

    function ddeleteFilm($id_films)
    {
        $query = $this->db->prepare("DELETE FROM films WHERE id_director = ?");
        $query->execute([$id_films]);
    }

    function addFilm($title, $description, $category, $date, $id_director)
    {
        $query = $this->db->prepare("INSERT INTO films (title, description, category, date, id_director) VALUES(?,?,?,?, ?)");
        $query->execute([$title, $description, $category, $date, $id_director]);
    }
}
