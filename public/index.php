<?php
session_start();


$controllerName = ucfirst($_GET['controller'] ?? 'car') . 'Controller';
$actionName = $_GET['action'] ?? 'allCars';
$id = $_GET['id'] ?? null;

$controllerPath = __DIR__ . '/../src/controllers/' . $controllerName . '.php';
require_once $controllerPath;

$controller = new $controllerName();

if ($id != null && method_exists($controller, $actionName)) {

    $controller->$actionName($id);
} else if (method_exists($controller, $actionName)) {

    $controller->$actionName();
} else {
    var_dump($_GET);
    echo "<p>Action not found!</p>";
}

require_once __DIR__ . '/templates/footer.php';