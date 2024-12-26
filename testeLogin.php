<?php 
    if(isset($_POST['submit']) && !empty($_POST['emailLogin']) && !empty($_POST['senhaLogin']))
    {
        //access
        include_once('conexaodb.php');
        $emailLogin = $_POST['emailLogin'];
        $senhaLogin = $_POST['senhaLogin'];

        $sql = "SELECT * FROM usuarios WHERE email = '$emailLogin'";
        $result = $conexao->query($sql);

        if($result){
            if($result->num_rows > 0){
                $usuario = $result->fetch_assoc();
                if(password_verify($senhaLogin, $usuario['senha'])){

                    session_start();

                    $_SESSION['email'] = $emailLogin;
                    $_SESSION['senha'] = $usuario['senha'];
                    echo "sessao init";
                    header('Location: dashboard.php');
                    exit();
                }
                else{
                    echo "Usuario não encontrado";   
                }
            }else{
                header('Location: index.html');
                
            }
        }
    
    }
?>