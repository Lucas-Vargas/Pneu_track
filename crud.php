<?php
session_start();
class Crud
{
    private $conn;
    private $db_name = "pneutrackdb";
    private $id;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // -----------------------------------------------------------------------------------------------

    // all the commands involving the view/mod of the database

    public function read()
    {
        $query = "SELECT * FROM pneutrackdb.user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readTarefa($login)
    {
        $query = "SELECT id FROM trabfinal.usuario WHERE login = :login";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $login2 = $row["id"];

        $query = "SELECT * FROM " . $this->db_name . ".tarefa WHERE usuario_id = :usuario_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':usuario_id', $login2);
        $stmt->execute();

        return $stmt;
    }




} # end of the class