<?php
if (!isset($_SESSION["validarIngreso"]) || $_SESSION["validarIngreso"] != "ok") {
    echo
    '<script>
          window.location = "index.php?path=login";
     </script>';
}

$usuario = ControladorFormularios::ctrSelectRegistro(null, null);
$posts = ControladorFormularios::ctrSelectPosts();
?>

<div id="inicio">
    <table class="tabla">
        <h2>Registros</h2>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $key => $value) : ?>
                <tr>
                    <td><?php echo $value["id"]; ?></td>
                    <td><?php echo $value["username"]; ?></td>
                    <td><?php echo $value["email"]; ?></td>
                    <td><?php echo $value["date"]; ?></td>
                    <td>
                        <div>
                            <a href="index.php?path=editar&id=<?php echo $value["id"]; ?>" class="btn_editar">Editar</a>

                            <form method="post">
                                <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarRegistro">
                                <button type="submit" class="btn_borrar">Borrar</button>
                                <?php
                                $eliminar = new ControladorFormularios();
                                $eliminar->ctrEliminarRegistro();
                                ?>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <br>
    <hr>
    <br>

    <section id="posts">
        <div id="posts-header">
            <h2>Posts</h2>
            <form method="post">
                <input type="email" name="p_email" id="p_email" placeholder="email">
                <br>
                <input type="password" name="p_password" id="p_password" placeholder="password">
                <br>
                <textarea name="p_content" id="p_content" cols="20" rows="10"></textarea>
                <br>
                <button type="submit">Crear Post</button>
                <?php
                $post = new ControladorFormularios();
                $post->ctrCrearPost()
                ?>
            </form>
        </div>
        <br>
        <?php foreach ($posts as $key => $value) : ?>
            <div class="post" id=<?php echo "post_" . $key ?>>
                <div class="post-headers">
                    <div class="post-h">
                        <div class="post-author">
                            <?php echo $value["author"] ?>
                        </div>
                        <div class="post-date">
                            <?php echo " - " . $value[3] ?>
                        </div>
                    </div>
                    <div class="post-id">
                        <?php echo "# " . $value["id"] ?>
                    </div>
                </div>
                <hr>
                <div class="post-content">
                    <?php echo $value["content"] ?>
                </div>
            </div>
            <br>
        <?php endforeach ?>
    </section>
</div>