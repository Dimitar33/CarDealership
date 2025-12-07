<?php
class UserController
{

    public function register()
    {
        require_once __DIR__ . "/../models/user.php";

        if (isset($_POST['submit'])) {

            $userModel = new User();
            $user = $userModel->findEmail($_POST['email']);

            if ($user) {

                $emailError = "Email already exists!";
                require_once __DIR__ . "/../views/registration.php";
                return;
            }

            if ($_POST['password'] !== $_POST['confirm-password']) {

                $matchError = "Passwords do not match!";
                require_once __DIR__ . "/../views/registration.php";
                return;
            }

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
            $user = $userModel->findUser($_POST['email'], $_POST['password']);

            if ($user) {

                $_SESSION['UserID'] = $user['id'];
                $_SESSION['Username'] = $user['username'];
                $_SESSION['Active'] = true;

                header("Location: /CarDealership/public/index.php?controller=car&action=allCars");
                exit();
            } else {
                $userNotFound = true;
                require_once __DIR__ . "/../views/login.php";
                return;
            }
        }

        require_once __DIR__ . "/../views/login.php";
    }

    public function logout()
    {
        session_destroy();

        header("Location: /CarDealership/public/index.php?controller=user&action=login");
        exit();
    }

    public function update()
    {
        require_once __DIR__ . "/../models/user.php";

        $userId = $_SESSION['UserID'];

        if (!$userId) {
            echo "<p>User not found!</p>";
            require_once __DIR__ . "/../views/login.php";
            return;
        }

        $userModel = new User();
        if ($_POST['action'] === 'update') {

            $userModel->updateUser(
                $userId,
                $_POST['username'],
                $_POST['phone'],
                $_POST['address_line'],
                $_POST['county'],
                $_POST['country'],
                $_POST['postcode'],
            );
        }

        $user = $userModel->findById($userId);

        return require_once __DIR__ . "/../views/userInfo.php";
    }

    public function delete()
    {
        require_once __DIR__ . "/../models/user.php";

        $userId = $_SESSION['UserID'];

        if (!$userId) {
            echo "<p>User not found!</p>";
            require_once __DIR__ . "/../views/login.php";
            return;
        }

        $userModel = new User();
        $userModel->deleteUser($userId);

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
            require_once __DIR__ . "/../views/login.php";
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
            require_once __DIR__ . "/../views/login.php";
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