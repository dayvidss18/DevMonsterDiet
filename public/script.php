<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $dados = [];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $senha1 = $_POST['senha1'];
    $senha2 = $_POST['senha2'];
    $senhaUsuario = '';
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $imc = 0;
    $avaliacaoUsuario = '';

    if (isset($_POST['sexo'])) {
        $sexo = $_POST['sexo'];
        echo "Sexo selecionado: " . htmlspecialchars($sexo) . "<br>";
    } else {
        echo "Nenhuma opção de sexo foi selecionada.<br>";
        exit();
    }

    function verificaSenhaIgual() {
        global $senha1, $senha2, $senhaUsuario;
        if ($senha1 == $senha2) {
            $senhaUsuario = $senha1;
        } else {
            echo "As senhas não são iguais.<br>";
            exit();
        }
    }

    function verificaImc() {
        global $altura, $peso, $imc, $avaliacaoUsuario, $sexo;
        $imc = $peso / ($altura * $altura);
        
        if ($sexo == 'masculino') {
            if ($imc < 18) {
                $avaliacaoUsuario = 'Abaixo Do Peso';
            } elseif ($imc >= 18 && $imc < 24) {
                $avaliacaoUsuario = 'Peso Ideal';
            } elseif ($imc >= 24 && $imc < 29) {
                $avaliacaoUsuario = 'Acima Do Peso';
            } else {
                $avaliacaoUsuario = 'Obesidade 1';
            }
        } elseif ($sexo == 'feminino') {
            if ($imc < 18) {
                $avaliacaoUsuario = 'Abaixo Do Peso';
            } elseif ($imc >= 18 && $imc < 24) {
                $avaliacaoUsuario = 'Peso Ideal';
            } elseif ($imc >= 24 && $imc < 29) {
                $avaliacaoUsuario = 'Acima Do Peso';
            } else {
                $avaliacaoUsuario = 'Obesidade 1';
            }
        }
    }

    verificaSenhaIgual();
    verificaImc();

    $dados = [
        "nome" => $nome,
        "idade" => $idade,
        "email" => $email,
        "altura" => $altura,
        "peso" => $peso,
        "imc" => $imc,
        "avaliacao" => $avaliacaoUsuario
    ];    
    
    echo "Dados: <pre>" . print_r($dados, true) . "</pre><br>";

    header("Location: index.html");
    exit();
}
?>

