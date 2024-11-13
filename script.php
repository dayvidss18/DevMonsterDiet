<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $dados = [];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $emailLogin = $_POST['emailLogin'];
    $senha1 = $_POST['senha1'];
    $senha2 = $_POST['senha2'];
    $senhaUsuario = '';
    $senhaLogin = $_POST['senhaLogin'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $imc = 0;
    
    function verificaSenhaIgual(){
        global $senha1;
        global $senha2;
        global $senhaUsuario;
        if($senhap1 == $senhap2){
            $senhaUsuario = $senha1;
        }
    }
    
    
    array_push($dados,$nome,$idade);
    echo $dados;
    header("location: dashboard.php");
}



?>