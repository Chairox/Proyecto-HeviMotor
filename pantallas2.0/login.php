<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<link rel="website icon" type="png" href="../img/22.png">
<style>
    body{
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: rgb(40, 55, 71);
    background-size: cover;
    }


.header {
    background-color: rgb(40, 55, 71);
    color: white;
    padding: 20px;
    text-align: center;
    border-radius: 40px;
    width: 100%;
    box-sizing: border-box;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
}

    form{
    padding: 50px;
    border-radius: 25px;
    display: flex;
    flex-direction: column;
    text-align: center;
    width: 380px;
    border-radius: 80px;
    color: black;

    }
    table{
        border: 2px solid #353a46;
        background-color: white;
        border-radius: 5%;
        padding: 20px;
    }

    input[type=text], input[type=password]{
        width: 100%;
        padding: 8px 20px;
        border: 2px solid #ccc;
        box-sizing: border-box;
        border-radius: 40px;
    }

    img{

        margin-bottom: 20px;
        margin-left: 2px;
        margin-right: 20px;
    }

    label{
        font-size: 14px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        border-radius: 40px;
    }

    input[type=submit]{
        background-color: white;
        color: black;
        padding: 8px 10px;
        margin: 8px 0px;
        border: solid;
        cursor: pointer;
        width: 40%;
        border-radius: 40px;
    }
    #mensaje-error {
    text-align: center;
    color: red;
    margin-top: 20px;
}
</style>
<body>
<div class="container">
        <div class="header">
            <h1>¡Bienvenido a HeviMotor!</h1>
        </div>
</div>
    <form method="post" action="menuprincipal.php">
        <center>
        <table>
            <tr><td colspan="2" style="background-color: black; color: white; padding-bottom: 5px; padding-top: 5px; padding-bottom: 5px; padding-left: 140px; border-radius: 40px; margin: 10px;"><label>Login</label></td></tr>
            <tr><td align="center" rowspan="5"><img src="../img/lock.gif" alt=""></td><td><label>Usuario</label></td></tr>
            <tr><td><input type="text" name="txtusuario"></td></tr>
            <tr><td><label>Password</label></td></tr>
            <tr><td><input type="password" name="txtpassword"></td></tr>
            <tr><td><input type="submit" value="Ingresar"></td></tr>
        </table>
    </center>
    </form>
</body>
</html>