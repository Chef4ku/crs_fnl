<?php
if (isset($_GET["id"])) {
    $item = "id";
    $valor = $_GET["id"];

    $usuario = ControladorFormularios::ctrSelectRegistro($item, $valor);
}
?>

<div>
    <form method="post">

        <h2> Nuevos datos</h2>

        <label for="username">Nombre: </label>
        <input type="text" value="<?php echo $usuario["username"]; ?>" placeholder="Escriba su nombre" id="username" name="actualizarUsername">
        <br>

        <label for="email">Email: </label>
        <input type="email" value="<?php echo $usuario["email"]; ?>" placeholder="Escriba su email" id="email" name="actualizarEmail">
        <br>

        <label for="password">Password: </label>
        <input type="password" placeholder="Escriba su contraseña" id="password" name="actualizarPassword">
        <br>

        <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
        <input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">

        <?php
        $actualizar = ControladorFormularios::ctrActualizarRegistro();
        if ($actualizar == "ok") {
            echo
            '<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
            </script>';

            echo '<div class="alert-update">El usuario ha sido actualizado</div>
            <script>
                setTimeout(function(){
                    window.location = "index.php?path=inicio";
                },3000);
            </script>';
        }
        ?>
        <button type="submit" class="btn">Actualizar</button>
    </form>
</div>