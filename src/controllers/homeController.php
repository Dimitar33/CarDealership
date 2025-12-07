<?php

class HomeController
{
    public function home()
    {
       return require_once __DIR__ . "/../views/cars.php";
    }

    public function about()
    {
        return require_once __DIR__ . "/../views/about.php";
    }
    public function contacts()
    {
        return require_once __DIR__ . "/../views/contacts.php";
    }

    public function favorites()
    {

        require_once __DIR__ . "/../models/user.php";

        $userId = $_SESSION['UserID'];
        if (!$userId) {
            echo "<p>User not found!</p>";
            return;
        }
        $userModel = new User();
        $cars = $userModel->getFavorites($userId);

        return require_once __DIR__ . "/../views/userFavorites.php";
    }

    public function userInfo()
    {

        require_once __DIR__ . "/../models/user.php";

        $userId = $_SESSION['UserID'];

        if (!$userId) {
            echo "<p>User not found!</p>";
            require_once __DIR__ . "/../views/login.php";
            return;
        }
        $userModel = new User();
        $user = $userModel->findById($userId);

        return require_once __DIR__ . "/../views/userInfo.php";
    }
}