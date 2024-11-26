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


    public function insertTruck($driver, $model, $plate, $axels, $weight, $tecnico)
    {
        $query = "INSERT into pneutrackdb.truck (`plate`, `model`, `driver`, `axels`, `weight`) VALUES (:plate, :model, :driver, :axels, :weight);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':plate', $plate);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':driver', $driver);
        $stmt->bindParam(':axels', $axels);
        $stmt->bindParam(':weight', $weight);
        $stmt->execute();
        return $stmt;
    }

    public function readTruck($plate)
    {
        $query = "SELECT * from pneutrackdb.truck WHERE plate=:plate;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':plate', $plate);
        $stmt->execute();
        return $stmt;
    }
    public function updateTruck($driver, $model, $plate, $axels, $weight)
    {
        $query = "UPDATE pneutrackdb.truck set `model` = :model, `driver` = :driver, `axels` = :axels, `weight` = :weight WHERE `plate` = :plate";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':plate', $plate);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':driver', $driver);
        $stmt->bindParam(':axels', $axels);
        $stmt->bindParam(':weight', $weight);
        $stmt->execute();
        return $stmt;
    }

    public function insertTire($km, $recap, $truckfk)
    {
        $query = "INSERT into pneutrackdb.tire (`km`, `Recap`, `truckFk`) VALUES (:km, :recap, :truckfk);";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':km', $km);
        $stmt->bindParam(':recap', $recap);
        $stmt->bindParam(':truckfk', $truckfk);
        $stmt->execute();
        return $stmt;
    }

    public function readPneus()
    {
        $query = "SELECT * FROM pneutrackdb.truck as t join pneutrackdb.tire as p, pneutrackdb.recapdate r;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function removerTruck($plate)
    {
        $query = "DELETE FROM pneutrackdb.truck WHERE plate='$plate'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute() or die(error_log($stmt));
    }



} # end of the class