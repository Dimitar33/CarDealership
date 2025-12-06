<?php
require_once __DIR__ . "/../lib/common.php";
class User
{
    private $db;

    public function __construct()
    {
        $this->db = require __DIR__ . "/../lib/dbConnect.php";
    }

    public function loginUser($email, $password)
    {
        try {

            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            
            $statement = $this->db->prepare($sql);
            $statement->execute(['email' => $email, 'password' => $password]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            return $user ?: null;

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function createUser($username, $email, $password, $phone)
    {

        try {

            $sql = "INSERT INTO users (username, email, password, phone) VALUES (:username, :email, :password, :phone)";

            $statement = $this->db->prepare($sql);
            $statement->execute([':username' => $username, ':email' => $email, ':password' => $password, ':phone' => $phone]);

            //$new_user['password'] = password_hash($new_user['password'], PASSWORD_DEFAULT);

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function addFavorite($userId, $carId)
    {
        try {

            $sql = "INSERT INTO user_favorites (user_id, car_id) VALUES (:user_id, :car_id)";

            $statement = $this->db->prepare($sql);
            $statement->execute(['user_id' => $userId, 'car_id' => $carId]);

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function removeFavorite($userId, $carId)
    {
        try {

            $sql = "DELETE FROM user_favorites WHERE user_id = :user_id AND car_id = :car_id";

            $statement = $this->db->prepare($sql);
            $statement->execute(['user_id' => $userId, 'car_id' => $carId]);

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function getFavorites($userId)
    {
        try {

            $sql = "SELECT cars.* FROM cars 
                    JOIN user_favorites ON cars.id = user_favorites.car_id 
                    WHERE user_favorites.user_id = :user_id";

            $statement = $this->db->prepare($sql);
            $statement->execute(['user_id' => $userId]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function isFavorite($userId, $carId)
    {
        try {

            $sql = "SELECT * FROM user_favorites WHERE user_id = :user_id AND car_id = :car_id";

            $statement = $this->db->prepare($sql);
            $statement->execute(['user_id' => $userId, 'car_id' => $carId]);
            $favorite = $statement->fetch(PDO::FETCH_ASSOC);

            return $favorite ? true : false;

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}