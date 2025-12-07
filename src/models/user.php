<?php
require_once __DIR__ . "/../lib/common.php";
class User
{
    private $db;

    public function __construct()
    {
        $this->db = require __DIR__ . "/../lib/dbConnect.php";
    }

    public function findUser($email, $password)
    {
        try {

            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            
            $statement = $this->db->prepare($sql);
            $statement->execute(['email' => $email, 'password' => $password]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            return $user ?? null;

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function findById($userId)
    {
        try {

            $sql = "SELECT * FROM users WHERE id = :user_id";

            $statement = $this->db->prepare($sql);
            $statement->execute(['user_id' => $userId]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            return $user ?? null;

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }   

    public function findEmail($email)
    {
        try {

            $sql = "SELECT * FROM users WHERE email = :email";

            $statement = $this->db->prepare($sql);
            $statement->execute(['email' => $email]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            return $user['email'] ?? null;

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

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function updateUser($userId, $username, $phone, $address_line, $county, $country, $postcode)
    {
        try {

            $sql = "UPDATE users SET 
            username = :username, 
            phone = :phone, 
            address_line = :address_line, 
            county = :county, 
            country = :country, 
            postcode = :postcode 
            WHERE id = :userId";

            $statement = $this->db->prepare($sql);
            $statement->execute([
                ':userId' => $userId,
                ':username' => $username,
                ':phone' => $phone,
                ':address_line' => $address_line,
                ':county' => $county,
                ':country' => $country,
                ':postcode' => $postcode,
            ]);

        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function deleteUser($userId)
    {
        try {

            $sql = "DELETE FROM users WHERE id = :user_id";

            $statement = $this->db->prepare($sql);
            $statement->execute([':user_id' => $userId]);

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