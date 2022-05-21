<div class="box">
    <h1>Login Page</h1>
    <br>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="i_email" id="i_email"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="i_password" id="password"><br><br>

        <input type="submit" value="Login"><br><br>

        <a href="index.php?path=signup">Sign Up</a>
    </form>
</div>

<?php
$ingreso = new ControladorFormularios;
$ingreso->ctrIngreso();
