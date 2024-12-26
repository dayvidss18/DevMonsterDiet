<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once('conexaodb.php');
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $senha1 = $_POST['senha1'];
    $senha2 = $_POST['senha2'];
    $senha = '';
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $sexo = $_POST['sexo'];
    $imc = 1;
    $avaliacaoUsuario = 'ok';

    function verificaSenhaUsuario(){
        global $senha1,$senha2,$senha;
        if($senha1 == $senha2){
            $senha = password_hash($senha1, PASSWORD_DEFAULT);
        }else
        echo "As senhas não são iguais";
    }

    function verificaImc(){
        global $imc,$peso,$altura,$avaliacaoUsuario;
        $alturaEmMetros = $altura / 100;
        $imc = $peso / ($alturaEmMetros * $alturaEmMetros);
        if($imc < 18.5){
            $avaliacaoUsuario = 'Extrema Magreza';
        }elseif($imc > 18.5 && $imc < 24.5){
            $avaliacaoUsuario = 'Normal';
        }elseif($imc > 25.0 && $imc < 29.0){
            $avaliacaoUsuario = 'Sobrepeso';
        }elseif($imc > 29.0 && $imc < 39.0){
            $avaliacaoUsuario = 'Obesidade';
        }else{
            $avaliacaoUsuario = "Obesidade Grave";
        }
    }


    verificaSenhaUsuario();
    verificaImc();

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,idade,email,senha,altura,peso,sexo,imc,avaliacaoUsuario) 
    VALUES('$nome','$idade','$email','$senha','$altura','$peso','$sexo','$imc','$avaliacaoUsuario')");
    header('Location: index.html');
    }
?>

