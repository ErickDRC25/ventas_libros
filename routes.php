
 <?php
    $controller = $_GET['controller'] ?? 'Catalogo';
    $action = $_GET['action'] ?? 'index';

    $controllerName = $controller .'Controller';
    $controllerPath = "app/controller/$controllerName.php";

    if (file_exists($controllerPath)) {
        require_once $controllerPath; //instacio la clase
        $controllerObj  = new $controllerName;//Contiene el nombre ed la clase q es  class AuthController

        if (method_exists($controllerObj, $action)) { //primera parametro instancia la clase y el segundo la accion
            $controllerObj->$action();
        } else {
            echo "Action '$action' no encontrado";
        }
    } else {
        echo "Controlador ' $controllerName' No encontrado ";
    }
