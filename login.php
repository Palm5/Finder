<?php

?>
<!doctype html>
<html lang="en">
    <?php
        include_once "backend/head.php";
    ?>
    <body>
        <form>
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <label for="user" class="visually-hidden">Utente</label>
            <input type="text" id="user" class="form-control" placeholder="Utente" required autofocus>
            <label for="pwd" class="visually-hidden">Password</label>
            <input type="password" id="pwd" class="form-control" placeholder="Password" required>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Entra</button>
        </form>
        <?php
            include_once "backend/footer.php";
        ?>
    </body>
</html>