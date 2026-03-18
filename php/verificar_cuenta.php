<?php

//predefinir usuario y contraseña
$usuario_cliente = "adminc";
$contrasena_cliente = "1234";

$usuario_vendedor = "adminv";
$contrasena_vendedor = "1234";

//verificamos que el formulario se mandó por metodo POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //verificamos que los datos enviados existan
    if(isset($_POST["user"]) && isset($_POST["password"])){
        //recibimos datos del formulario y los almacenamos en variables

        $usuario_ingresado = $_POST["user"];
        $contrasena_ingresada = $_POST["password"];

        //validamos que el ususario y la contraseña ingresados coincidan con los predefinidos
        if(($usuario_cliente === $usuario_ingresado) && ($contrasena_ingresada === $contrasena_cliente)){
            //header("Location: ../cliente_tiendas.html");
            echo "<script>
                    alert('Se inicio sesion correctamente');
                    window.location.href = '../cliente_tiendas.html';
                  </script>";
            
            exit();
        } else if(($usuario_vendedor === $usuario_ingresado) && ($contrasena_ingresada === $contrasena_vendedor)){
            echo "<script>
                    alert('Se inicio sesion correctamente');
                    window.location.href = '../vendedor_tienda.html';
                  </script>";
            exit();
        } else{
            echo "<script>
                    alert('Usuario o contraseña incorrecta. Por favor intente de nuevo');
                    window.location.href = '../crear_cuenta.html';
                  </script>";
            exit();
        }
        
        


    }
}

?>