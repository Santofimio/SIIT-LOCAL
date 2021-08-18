<?php include_once "../Lib/helpers.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Cambia Tu Contraseña</title>
</head>

<body>
    <div class="login-box">
        <h2>Cambia Tu Contraseña</h2>
        <form action="<?php echo getUrl("Access", "Access", "cambioPass", false, "fecth"); ?>" method="POST" id="form">
            <div class="user-box">
                <input type="password" name="pass" required="" id="pass">
                <label>Contraseña</label>
            </div>
            <div class="user-box">
                <input type="password" required="" id="con_pass">
                <label>Repite la contraseña</label>
            </div>
            <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
            <button type="submit" class="manito">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Cambiar Contraseña
            </button>
        </form>
    </div>
</body>

</html>