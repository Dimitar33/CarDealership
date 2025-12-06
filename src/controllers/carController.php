<?php

class CarController
{

    public function allCars()
    {
        require_once __DIR__ . "/../models/car.php";

        $carModel = new Car();
        $cars = $carModel->getAll();

        require_once __DIR__ . "/../views/cars.php";
    }

    public function findCar($id)
    {
        require_once __DIR__ . "/../models/car.php";
        require_once __DIR__ . "/../models/user.php";

        $carModel = new Car();
        $car = $carModel->getById($id);
        if (!$car) {
            echo "<p>Car not found!</p>";
            return;
        }

        $userId = $_SESSION['UserID'];
        $userModel = new User();
        $isFavorite = $userModel->isFavorite($userId, $id);


        require_once __DIR__ . "/../views/carInfo.php";
    }
}