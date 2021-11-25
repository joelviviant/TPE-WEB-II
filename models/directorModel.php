<?php

class directorModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=cinema;charset=utf8', 'root', '');
    }

    function getDirectors()
    {
        $query = $this->db->prepare("SELECT * FROM directors");
        $query->execute();
        $directors = $query->fetchAll(PDO::FETCH_OBJ);
        return $directors;
    }

    function getDirector($id_director)
    {
        $query = $this->db->prepare("SELECT * FROM directors where id_director = ?");
        $query->execute([$id_director]);
        $director = $query->fetch(PDO::FETCH_OBJ);
        return $director;
    }
    function addDirector($name, $last_name, $date_of_birth, $about_the_director)
    {
        $query = $this->db->prepare("INSERT INTO directors(name, last_name, date_of_birth, about_the_director) VALUES(?, ?, ?, ?)");
        $query->execute([$name, $last_name, $date_of_birth, $about_the_director]);
    }

    function deleteDirector($id_director)
    {
        $query = $this->db->prepare("DELETE FROM directors WHERE id_director = ?");
        $query->execute([$id_director]);
    }


    function editDirector($id_director, $name, $last_name, $date_of_birth, $about_the_director)
    {
        $query = $this->db->prepare("UPDATE directors SET name = ?, last_name = ?, date_of_birth = ?,
        about_the_director = ? WHERE id_director = ?");
        $query->execute([$name, $last_name, $date_of_birth, $about_the_director, $id_director]);
    }

   
}
