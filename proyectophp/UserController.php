<?php 

if(isset($_POST['submit'])){

    include 'UserModel.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        echo '<div class="alert alert-danger">Nombre de usuario o contraseña vacío</div>';
    } else {
        $user = new User;

        if($user->getUser($username, $password)){
            $nombreUsuario = $user->getUserName($username);
            session_start();
            $_SESSION['usuario'] = $nombreUsuario;
            header('Location: welcome.php');
            exit(); // Agregado para detener la ejecución después de redirigir
        } else {
            echo '<div class="alert alert-danger">Usuario no existe</div>';    
        }
    }
}
?>
