<?php 
include_once "ModeloGenerico.php";


session_start();

// Verifica si se envió el formulario para cerrar sesión
if(isset($_POST['cerrarSesion'])){
    unset($_SESSION['usuario']);
    header('Location: index.php');
}
?>

<?php if(isset($_SESSION['usuario'])) { ?>
<?php include 'partials/header.php' ?>

<div class="container">
    <div class="row mt-3 justify-content-md-center">
        <div class="col-md-6">
            <h1>Hola, bienvenido <?php echo '<strong>'.$_SESSION['usuario'].'</strong>'; ?></h1>
        </div>
    </div>
    <div class="row mt-3 justify-content-md-center">
        <form action="" method="POST">
            <button type="submit" class="btn btn-primary btn-block" name="cerrarSesion"> Cerrar Sesion </button>
        </form>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <form action="mainPrueba.php" method="POST" autocomplete="off">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Documento</label>
                    <input type="text" name="documento" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" name="nombre" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Apellido</label>
                    <input type="text" name="apellido" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Dirección</label>
                    <input type="text" name="direccion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Telefono</label>
                    <input type="text" name="telefono" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <label for="exampleInputEmail1" class="form-label">Id Estrato</label>
                    <input type="text" name="estrato" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <button type="submit" name="btnGuardar" value="ok" class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" href="welcome.php">Cancelar</a>
            </form>
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Paciente</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>ID Estrato</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $conexion = new Database();

                
                    $modelo = new user($conexion->acceso); 
                
                   
                    $pacientes = $modelo->consultar($conexion->acceso, 'paciente');
                    
                    if ($pacientes) {
                        
                        foreach ($pacientes as $paciente) {
                            echo "<tr>";
                            echo "<td>" . $paciente['pac_id'] . "</td>";
                            echo "<td>" . $paciente['pac_docum'] . "</td>";
                            echo "<td>" . $paciente['pac_nombre'] . "</td>";
                            echo "<td>" . $paciente['pac_apellido'] . "</td>";
                            echo "<td>" . $paciente['pac_direccion'] . "</td>";
                            echo "<td>" . $paciente['pac_telefono'] . "</td>";
                            echo "<td>" . $paciente['est_id'] . "</td>";
                            
                            echo "</tr>";
                        }
                    } else {
                        
                        echo "<tr><td colspan='8'>No se encontraron pacientes.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
<?php } else { 
    // Si no hay una sesión de usuario iniciada, redirige a la página de inicio de sesión
    header('Location: index.php');
} ?>

