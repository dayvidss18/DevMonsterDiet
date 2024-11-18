<?php 
    if(isset($_POST['submit']) && !empty($_POST['emailLogin']) && !empty($_POST['senhaLogin']))
    {
        //access
        include_once('conexaodb.php');
        $email = $_POST['emailLogin'];
        $senha = $_POST['senhaLogin'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
        $result = $conexao->query($sql);

        print_r($result);
    }else{
        //nacess
        header('Location: index.html');
    }

?>