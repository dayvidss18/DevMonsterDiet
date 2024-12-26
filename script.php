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
    $dieta = $_POST['dieta'] ?? 'Não';
    $imc = 1;
    $avaliacaoUsuario = 'ok';
    $recomendacao = '';

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
    function recomendaRecomendacao(){
        global $avaliacaoUsuario, $recomendacao;
        if($avaliacaoUsuario == 'Extrema Magreza'){
            $recomendacao = 'Se o seu IMC está abaixo de 18,5, é importante ganhar peso de forma saudável.
             Aumente sua ingestão calórica com alimentos ricos em nutrientes, como nozes, abacates, carnes magras e carboidratos integrais.
             Coma de 5 a 6 refeições pequenas ao dia e inclua proteínas de alta qualidade (como ovos, peixes e legumes). Priorize gorduras saudáveis,
             como azeite de oliva e peixes gordurosos. Foque em musculação para ganhar massa muscular e evite exercícios aeróbicos excessivos. 
             Hidrate-se bem e, se necessário, considere suplementos como whey protein para complementar sua alimentação.';
        }elseif($avaliacaoUsuario == 'Normal'){
            $recomendacao = 'Se o seu IMC está entre 18,5 e 24,9, você está no peso ideal. Para manter essa faixa, 
             mantenha uma alimentação equilibrada com porções adequadas de proteínas, carboidratos integrais e gorduras saudáveis. 
             Priorize alimentos frescos e nutritivos, como frutas, legumes, carnes magras e grãos integrais. Faça refeições regulares e inclua exercícios físicos,
             com foco em atividades aeróbicas e de resistência, para manter a saúde e o peso. Mantenha-se hidratado e evite excessos de alimentos processados e açúcares.';
        }elseif($avaliacaoUsuario == 'Sobrepeso'){
            $recomendacao = 'Se o seu IMC está entre 25,0 e 29,9, você está na faixa de sobrepeso. Para melhorar sua saúde e alcançar um peso ideal, é importante adotar uma alimentação balanceada, 
             rica em vegetais, proteínas magras e carboidratos integrais. Evite alimentos ricos em gorduras saturadas e açúcares refinados. Pratique atividades físicas regulares, combinando exercícios aeróbicos e musculação,
             para queimar gordura e fortalecer os músculos. Mantenha-se hidratado e procure controlar o tamanho das porções para evitar o consumo excessivo de calorias.';
        }elseif($avaliacaoUsuario == 'Obesidade'){
            $recomendacao = 'Se o seu IMC está entre 25,0 e 29,9, você está na faixa de sobrepeso. Para melhorar sua saúde e alcançar um peso ideal, é importante adotar uma alimentação balanceada, rica em vegetais, 
            proteínas magras e carboidratos integrais. Evite alimentos ricos em gorduras saturadas e açúcares refinados. Pratique atividades físicas regulares, combinando exercícios aeróbicos e musculação, para queimar gordura e fortalecer os músculos. 
            Mantenha-se hidratado e procure controlar o tamanho das porções para evitar o consumo excessivo de calorias.';
        }elseif($avaliacaoUsuario == 'Obesidade Grave'){
            $recomendacao = 'Se o seu IMC está acima de 39, você está na faixa de obesidade mórbida. Nessa situação, é crucial adotar uma abordagem cuidadosa e estruturada para a perda de peso. Priorize uma alimentação saudável, focando em alimentos ricos em nutrientes e com baixo teor calórico,
             como vegetais, proteínas magras e carboidratos integrais. Evite alimentos processados, fritos e ricos em açúcares. A prática regular de atividades físicas, com acompanhamento profissional, é fundamental, combinando exercícios aeróbicos e de força. Procure orientação médica e nutricional para garantir um plano de perda de peso seguro e eficaz,
              que pode incluir, em alguns casos, intervenções mais específicas como tratamentos médicos ou até cirurgias.';
        }
    }

    recomendaRecomendacao();
    verificaSenhaUsuario();
    verificaImc();

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,idade,email,senha,altura,peso,sexo,imc,dieta,avaliacaoUsuario,recomendacao) 
    VALUES('$nome','$idade','$email','$senha','$altura','$peso','$sexo','$imc','$dieta','$avaliacaoUsuario','$recomendacao')");
    header('Location: index.html');
    }
?>

