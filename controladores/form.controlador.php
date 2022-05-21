<?php

class ControladorFormularios
{
    //Registro
    static public function ctrRegistro()
    {
        if (
            isset($_POST["r_email"]) &&
            isset($_POST["r_user_name"]) &&
            isset($_POST["r_password"])
        ) {
            $tabla = "registros";

            $datos = array(
                "email"    => $_POST["r_email"],
                "username" => $_POST["r_user_name"],
                "password" => $_POST["r_password"],
            );

            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
            return $respuesta;
        }
    }

    // SELECT registro
    static public function ctrSelectRegistro($item, $valor)
    {
        $tabla = "registros";
        $respuesta = ModeloFormularios::mdlSelectRegistro($tabla, $item, $valor);
        return $respuesta;
    }

    // ingreso
    public function ctrIngreso()
    {
        if (isset($_POST["i_email"])) {
            $tabla = "registros";
            $item = "email";
            $valor = $_POST["i_email"];

            $respuesta = ModeloFormularios::mdlSelectRegistro($tabla, $item, $valor);
            if (isset($respuesta["email"]) && $respuesta["email"] == $_POST["i_email"] && $respuesta["password"] == $_POST["i_password"]) {
                $_SESSION["validarIngreso"] = "ok";
                // mandar a la pagina de inicio
                echo
                '<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                    window.location = "index.php?path=inicio";
                </script>';
            } else {
                echo
                '<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>';
                echo '<div class="login-fail">Email y/o contraseña incorrectos</div>';
            }
            return $respuesta;
        }
    }

    // Actualizar datos
    static public function ctrActualizarRegistro()
    {
        if (isset($_POST["actualizarUsername"])) {
            if ($_POST["actualizarPassword"] != "") {
                $password = $_POST["actualizarPassword"];
            } else {
                $password = $_POST["passwordActual"];
            }

            $tabla = "registros";
            $datos = array(
                "id" => $_POST["idUsuario"],
                "username" => $_POST["actualizarUsername"],
                "email" => $_POST["actualizarEmail"],
                "password" => $password
            );

            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
            if ($respuesta == "ok") {
                echo
                '<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                window.location = "index.php?path=inicio";
                </script>';
            }
        }
    }

    // Eliminar
    public function ctrEliminarRegistro()
    {
        if (isset($_POST["eliminarRegistro"])) {
            $tabla = "registros";
            $valor = $_POST["eliminarRegistro"];

            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);
            if ($respuesta == "ok") {
                echo
                '<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                    window.location = "index.php?path=inicio";
                </script>';
            }
        }
    }

    public function ctrCrearPost()
    {
        if (!(isset($_POST["p_email"]) &&
            isset($_POST["p_password"]) &&
            isset($_POST["p_content"])
        )) {
            echo "ingrese todos los datos";
        } else {
            $tabla = "registros";
            $item = "email";
            $valor = $_POST["p_email"];

            $respuesta = ModeloFormularios::mdlSelectRegistro($tabla, $item, $valor);
            if (isset($respuesta["email"]) && $respuesta["email"] == $_POST["p_email"] && $respuesta["password"] == $_POST["p_password"]) {
                $tabla = "posts";
                $datos = array(
                    "author" => $_POST["p_email"],
                    "content" => $_POST["p_content"]
                );
                ModeloFormularios::mdlCrearPost($tabla, $datos);
            }
        }
    }
    
    static public function ctrSelectPosts()
    {
        $tabla = "posts";
        $res = ModeloFormularios::mdlSelectPosts($tabla);
        return $res; 
    }
}
