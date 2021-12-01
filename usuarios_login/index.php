<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="app/controllers/login_controller.php" method="POST">
    
        <label for="field_usuario">usuário: </label>
        <input type="text" name="field_usuario">
        
        <br />

        <label for="field_senha">senha</label>
        <input type="password" name="field_senha">
        
        <br />
        <input type="submit">
    
    </form>
    
</body>
</html>