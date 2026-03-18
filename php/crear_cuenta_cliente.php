<?php

//verificamos que el formulario se mandó por metodo POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //verificamos que los datos enviados existan
    if(isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["direction"]) && isset($_POST["terminos"])){
        //recibimos datos del formulario y los almacenamos en variables

        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $contrasena_ingresada = $_POST["confirm"];
        $direction = $_POST["direction"];
        $terminos = $_POST["terminos"];


        //De momento solo muestra la alrerta, pero luego almacenará los datos
        echo "<script>
                    alert('Cuenta de cliente creada con exito!');
                    window.location.href = '../index.html';
                  </script>";
        

    }
}

?>