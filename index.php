<?php
spl_autoload_register(function ($class) {
    $paths = ['../core/', '../app/controllers/', '../app/models/'];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Routing manual sederhana
$controller = $_GET['controller'] ?? 'Post';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$controllerName = ucfirst($controller);
if (class_exists($controllerName)) {
    $c = new $controllerName;
    if (method_exists($c, $action)) {
        $id ? $c->$action($id) : $c->$action();
    } else {
        echo "Method tidak ditemukan.";
    }
} else {
    echo "Controller tidak ditemukan.";
}