<?php
class UserController
{

    public function register()
    {
        require_once __DIR__ . "/../models/user.php";

        if (isset($_POST['submit'])) {

            $userModel = new User();
            $userModel->createUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['phone']);

            header("Location: /CarDealership/public/index.php?controller=user&action=login");
            exit();
        }
        require_once __DIR__ . "/../views/registration.php";
    }

    public function login()
    {
        require_once __DIR__ . "/../models/user.php";

        if (isset($_POST['submit'])) {

            $userModel = new User();
            $user = $userModel->loginUser($_POST['email'], $_POST['password']);

            if ($user) {

                $_SESSION['UserID'] = $user['id'];
                $_SESSION['Username'] = $user['username'];
                $_SESSION['Active'] = true;

                header("Location: /CarDealership/public/index.php?controller=car&action=allCars");
                exit();
            } else {
                echo "<p>Wrong email or password!</p>";
                return;
            }
        }

        require_once __DIR__ . "/../views/login.php";
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location: /CarDealership/public/index.php?controller=user&action=login");
        exit();
    }

    public function addFavorite($carId)
    {
        require_once __DIR__ . "/../models/user.php";

        $userId = $_SESSION['UserID'];

        if (!$userId) {
            echo "<p>User not found!</p>";
            return;
        }

        $userModel = new User();
        $userModel->addFavorite($userId, $carId);
        $cars = $userModel->getFavorites($userId);

         require_once __DIR__ . "/../views/userFavorites.php";
    }

    public function removeFavorite($carId)
    {
        require_once __DIR__ . "/../models/user.php";

        $userId = $_SESSION['UserID'];

        if (!$userId) {
            echo "<p>User not found!</p>";
            return;
        }

        $userModel = new User();
        $userModel->removeFavorite($userId, $carId);
        $cars = $userModel->getFavorites($userId);

         require_once __DIR__ . "/../views/userFavorites.php";
    }

    public function getFavorites($userId)
    {
        require_once __DIR__ . "/../models/user.php";

        $userModel = new User();
        $userModel->getFavorites($userId);
        $isFavorite = $userModel->isFavorite($userId, $carId);

        require_once __DIR__ . "/../views/userFavorites.php";
    }
}