<?php


class Car
{

    private $db;

    public function __construct()
    {
        $this->db = require __DIR__ . "/../lib/dbConnect.php";
    }

    public function getAll()
    {
        try {

            $sql = "SELECT * FROM cars";

            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }


    }

    public function getById($id)
    {

        try {

            $sql = "SELECT * FROM cars WHERE id = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}