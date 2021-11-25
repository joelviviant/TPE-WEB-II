<?php

class remarkModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=cinema;charset=utf8', 'root', '');
    }

    function getRemark($idRemark)
    {
        $query = $this->db->prepare("SELECT * FROM remarks WHERE id_remark = ? ");
        $query->execute([$idRemark]);
        $remark = $query->fetch(PDO::FETCH_OBJ);
        return $remark;
    }

    function getRemarkByFilm($idFilm, $orderby, $order)
    {
        $query = $this->db->prepare("SELECT * FROM remarks AS a INNER JOIN user AS b ON t.id_user = y.id_user WHERE t.id_film = ?
            order by $orderby $order");
        $query->execute([$idFilm]);
        $remark = $query->fetchAll(PDO::FETCH_OBJ);
        return $remark;
    }



    function addRemark($remark, $qualification, $id_user, $id_Film)
    {
        $query = $this->db->prepare("INSERT INTO remarks(remark, qualification, id_user, id_film) VALUES (?,?,?,?)");
        $query->execute([$remark, $qualification, $id_user, $id_Film]);
        return $this->db->lastInsertId();
    }

    function deleteRemark($idRemark)
    {
        $query = $this->db->prepare("DELETE FROM remarks WHERE id_remark = ?");
        $query->execute([$idRemark]);
    }
}
