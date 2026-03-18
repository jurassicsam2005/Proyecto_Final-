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


        //De momento solo muestra la alrerta, pero luego almacenará los datos
        echo "<script>
                    alert('Cuenta de vendedor creada con exito!');
                    window.location.href = '../index.html';
                  </script>";
        

    }
}

?>