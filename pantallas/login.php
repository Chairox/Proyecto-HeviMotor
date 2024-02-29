<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<style>
    body{
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url(../img/fondo3.jpg);
    background-size: cover;

    }
    form{
    box-shadow: 0 0 20px rgb(0, 183, 255);
    padding: 50px;
    border-radius: 25px;
    display: flex;
    flex-direction: column;
    text-align: center;
    width: 380px;
    border-radius: 40px;

    }
    table{
        border: 2px solid #353a46;
        background-color: #145672;
        border-radius: 5px;
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
        width: 100px;
        height: 100px;
    }

    label{
        font-size: 14px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        border-radius: 40px;
    }

    input[type=submit]{
        background-color: rgb(4, 255, 234);
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
    <form method="post" action="menuprincipal.php">
        <center>
        <table>
            <tr><td colspan="2" style="background-color: rgb(4, 255, 234);; padding-bottom: 5px; padding-top: 5px; padding-left: 140px; border-radius: 40px;"><label>Login</label></td></tr>
            <tr><td align="center" rowspan="5"><img src="../img/candado.png" alt=""></td><td><label>Usuario</label></td></tr>
            <tr><td><input type="text" name="txtusuario"></td></tr>
            <tr><td><label>Password</label></td></tr>
            <tr><td><input type="password" name="txtpassword"></td></tr>
            <tr><td><input type="submit" value="Ingresar"></td></tr>
        </table>
    </center>
    </form>
</body>
</html>