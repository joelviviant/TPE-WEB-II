<?php

class UserModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=cinema;charset=utf8', 'root', '');
    }

    function getUserByEmail($mail)
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE mail = ?');
        $query->execute([$mail]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function getUserById($id)
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE id_user = ?');
        $query->execute([$id]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }


    function insertUser($name, $mail, $password, $type)
    {
        $query = $this->db->prepare('INSERT INTO user (name, mail, password, type) values(?,?,?,?)');
        $query->execute([$name, $mail, $password, $type]);
    }

    function getUsers()
    {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    function editUser($name, $mail, $type, $id_user)
    {
        $query = $this->db->prepare("UPDATE users SET name = ?, mail = ?, type = ? WHERE id_user = ?");
        $query->execute([$name, $mail, $type, $id_user]);
    }

    function deleteUser($id_user)
    {
        $query = $this->db->prepare("DELETE FROM users WHERE id_user = ?");
        $query->execute([$id_user]);
    }
}
