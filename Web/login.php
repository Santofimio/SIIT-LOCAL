<?php include_once "../Lib/helpers.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>

<body  onload="load();">
    <div class="login-box">
        <h2>Inicio De Sesión</h2>
        <form  action="<?php echo getUrl("Access", "Access", "iniciarSesion",false,"fecth"); ?>" method="POST" id="form">
            <div class="user-box">
                <select name="tip_doc" id="tip_doc" class="bg" >
                    <!-- <option value="">Seleccione</option> -->
                </select>
                <label>Tipo Documento</label>

            </div>
            <div class="user-box">
                <input type="number" name="num_doc" required="" id="num_doc">
                <label># Documento</label>
            </div>
            <div class="user-box">
                <input type="password" name="pass" required="" id="pass">
                <label>Contraseña</label>
            </div>
            <button  type="submit" class="manito">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Entrar
            </button>
        </form>
    </div>
    <script src="js/login.js"></script>
</body>

</html>