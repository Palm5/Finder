<?php
session_start();
if(isset($_SESSION["loggato"])){
    header("Location: ./explore.php");
}
?>
<!doctype html>
<html lang="en">
    <head>
    <?php
        include_once "backend/head.php";
    ?>
        
    </head>
    <body>
        
        <form action="backend/login.inc.php" method="post" accept-charset="UTF-8">
            <div class="container content">
                <div class="row">
                    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                    <label for="user" class="visually-hidden">Utente</label>
                    <input type="text" name="user" id="user" class="form-control" placeholder="Utente" required autofocus>
                    <label for="pwd" class="visually-hidden">Password</label>
                    <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password" required>
                    <?php
                    if(isset($_GET["error"])&&$_GET["error"]=="fail"){
                        echo "<p style='color:red'>Hai inserito dei dati incorretti.</p>";
                    }
                    ?>
                    <input name="submit" id="submit" class="w-100 btn btn-lg btn-primary" type="submit" value="Entra">
                </div>
            </div>
        </form>
        <?php
            include_once "backend/footer.php";
        ?>
    </body>
</html>