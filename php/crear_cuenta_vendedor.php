<?php

//verificamos que el formulario se mandó por metodo POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //verificamos que los datos enviados existan
    if(isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["direction"]) && isset($_POST["terminos"]) && isset($_POST["nombre-tienda"]) && isset($_POST["rfc"]) && isset($_POST["tipo-tienda"])){
        //recibimos datos del formulario y los almacenamos en variables

        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $contrasena_ingresada = $_POST["confirm"];
        $direction = $_POST["direction"];
        $terminos = $_POST["terminos"];
        $nombre_tienda = $_POST["nombre-tienda"];
        $rfc = $_POST["rfc"];
        $tipo_tienda = $_POST["tipo-tienda"];

        $error = "";

        //Validacion de los datos

        //Verificacion de campos obligatrios
        if (trim($nombre) === "" || trim($email) === "" || trim($password) === "" || trim($nombre_tienda) === "") {
            $error = "Rellene todos los campos obligatorios";
        } 

        //Verificar el formato del correo
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "El formato del correo electrónico no es válido";
        } 

        //verificar contraseñas (longitud y que coincidan)
        elseif (mb_strlen($password) < 8 || mb_strlen($password) > 16) {
            $error = "La contraseña debe tener entre 8 y 16 caracteres.";
        } 
        // 4. Verificar que coincidan las contraseñas
        elseif ($password !== $contrasena_ingresada) {
            $error = "Las contraseñas no coinciden.";
        }


        if ($error === "") {
            echo "<script>
                    alert('¡Cuenta de vendedor creada con éxito!');
                    window.location.href = '../index.html';
                  </script>";
            
            //Si se llegara a usar base de dtos podriamos hacer el insert 
            
        } else {
            echo "<script>
                    alert('$error');
                    window.history.back(); 
                  </script>";
        }
        

        }
}

?>