<div class="box">
    <h1>Sign Up Page</h1>
    <br>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="r_email" id="email"><br><br>

        <label for="user_name">Username:</label>
        <input type="text" name="r_user_name" id="user_name"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="r_password" id="password"><br><br>

        <input type="submit" value="Signup"><br><br>

        <a href="index.php?path=login">Login</a>
        <br>
    </form>
</div>

<?php
$registro = ControladorFormularios::ctrRegistro();
