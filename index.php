<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Login</h1>
        <input type="text" placeholder="E-mail">
        <br><br>
        <input type="password" placeholder="Senha">
        <br><br>
        <button>Login</button>
        <br><br>
        <button>Registrar</button>
    </div>
    <footer></footer>
    <?php
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $email = $_POST['email'];
        $imc = 0;



        
    ?>  
</body>
</html>
