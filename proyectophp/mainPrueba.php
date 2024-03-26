<?php

include 'Database/Db.php';
include_once "ModeloGenerico.php";

$conexion = new Database(); 
$user = new user($conexion);

if(isset($_POST["btnGuardar"])){
    if(!empty($_POST["nombre"]) && !empty($_POST["documento"]) && !empty($_POST["apellido"]) && !empty($_POST["estrato"]) && !empty($_POST["direccion"])){
        $datos_paciente = array(
            'documento' => $_POST["documento"],
            'nombre' => $_POST["nombre"],
            'apellido' => $_POST["apellido"],
            'direccion' => $_POST["direccion"],
            'telefono' => $_POST["telefono"],
            'estrato' => $_POST["estrato"],
        );
        
        $resultado = $user->registrar('paciente', $datos_paciente);
        if ($resultado) {
            echo "Paciente registrado exitosamente.";
        } else {
            echo "Error al registrar el paciente.";
        }
    } else {
        echo "Alguno de los campos está vacío";
    }
}



/*
$datos_usuario = array(
    'nombre' => 'Juan',
    'documento' => 123456789,
    'clave' => 'password123',
    'rol' => 1
);

$datos_paciente = array(
    'documento' => '1234',
    'nombre' => 'Sofia',
    'apellido' => 'Lopez',
    'direccion' => 'calle 23',
    'telefono' => '3152211010',
    'estado'=> 1

);

$datos_estratos = array(
    
    'nombre' => '1',
    

);


/*$resultado = $user->registrar($conexion, 'usuarios', $datos_usuario);
if ($resultado) {
    echo "Usuario registrado exitosamente.";
} else {
    echo "Error al registrar el usuario.";
}*/

/*$resultado = $user->registrar($conexion, 'roles', $datos_rol);
if ($resultado) {
    echo "Rol registrado exitosamente.";
} else {
    echo "Error al registrar el rol.";
}
?>*/

/*$resultado = $user->registrar($conexion, 'paciente', $datos_paciente);
if ($resultado) {
    echo "Paciente registrado exitosamente.";
} else {
    echo "Error al registrar el paciente.";
}*/

/*$resultado = $user->registrar($conexion, 'estratos', $datos_estratos);
if ($resultado) {
    echo "Estrato registrado exitosamente.";
} else {
    echo "Error al registrar el estrato.";
}*/


/*
// Consultar todos los usuarios
// Definir columnas y condiciones
$columnas = array('usu_nombre', 'usu_docum', 'usu_clave', 'rol_id');
$condiciones = 'usu_docum = ?'; 
$valores = array(1140521110); 

// Consultar usuarios con columnas específicas y condiciones
$usuarios = $user->consultar($conexion->acceso, 'usuarios', $columnas, $condiciones, $valores);

// Mostrar usuarios
if (!empty($usuarios)) {
    echo "Usuarios encontrados:<br><br>";
    foreach ($usuarios as $usuario) {
        echo "Nombre: " . $usuario['usu_nombre'] . " " ."Documento: ". $usuario['usu_docum'] . " " . "Clave: " . $usuario['usu_clave'] . " " . "Rol: " . $usuario['rol_id'] . " ". "<br>";
    }
} else {
    echo "No se encontraron usuarios.";
}

// Consulta de Pacientes
$columnas = array('pac_docum', 'pac_nombre', 'pac_apellido', 'pac_direccion', 'pac_telefono', 'est_id');
$condiciones = 'pac_id = ?'; 
$valores = array(1); 

// Consultar usuarios específicas y con condiciones
$pacientes = $user->consultar($conexion->acceso, 'paciente', $columnas, $condiciones, $valores);

// Mostrar los resultados
if (!empty($pacientes)) {
    echo "Pacientes encontrados:<br><br>";
    foreach ($pacientes as $paciente) {
        echo "Documento: " . $paciente['pac_docum'] . " " ."Nombre: ". $paciente['pac_nombre'] . " " . "Apellido: " . $paciente['pac_apellido'] . " " . "Dirección: " . $paciente['pac_direccion'] . " ". "Teléfono: " . $paciente['pac_telefono'] . " " ."Estrago: " . $paciente['est_id'] ."<br>";
    }
} else {
    echo "No se encontraron usuarios.";
}


// Consulta de Roles
$columnas = array('rol_nombre');
$condiciones = 'rol_id = ?'; 
$valores = array(1); 

// Consultar roles con columnas específicas y condiciones
$roles = $user->consultar($conexion->acceso, 'roles', $columnas, $condiciones, $valores);

// Mostrar los resultados
if (!empty($roles)) {
    echo "Roles encontrados:<br><br>";
    foreach ($roles as $rol) {
        echo "Nombre: " . $rol['rol_nombre'] ."<br>";
    }
} else {
    echo "No se encontraron roles.";
}

// Consulta de Estratos
$columnas = array('est_nombre');
$condiciones = 'est_id = ?'; 
$valores = array(1); 

// Consultar estartos con columnas específicas y condiciones
$estratos = $user->consultar($conexion->acceso, 'estratos', $columnas, $condiciones, $valores);

// Mostrar los resultados
if (!empty($estratos)) {
    echo "Estratos encontrados:<br><br>";
    foreach ($estratos as $estrato) {
        echo "Nombre: " . $estrato['est_nombre'] ."<br>";
    }
} else {
    echo "No se encontraron estratos.";
}*/
