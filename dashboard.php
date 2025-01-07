<?php 
    session_start();
    if ((!isset($_SESSION['email']) || !isset($_SESSION['senha']))) {
        header('Location: index.html');
        exit();
    }else{
        $logado = $_SESSION['email'];
        

                
    }
?>
<?php
    include_once('conexaodb.php');
    $sql = "SELECT * FROM  usuarios ORDER BY id DESC";
    
    $result = $conexao->query($sql);
    $usuario = $result->fetch_assoc();
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Perfil do Usuário</title>
</head>
<body>
    <div class="dahsboard_tela">
        <div class="dashboard_container">
                <div class="logo_dashboard">
                    <img src="dino.png" alt="imagem Dinossauro" class="dashboard_avatar" width="100" height="100">
                </div>
                <div class="dashboardInfoUsuarioItem">
                <?php  echo $usuario['nome'];  ?>
                </div>
                <div class="dashboardInfoUsuarioItem">
                    <?php  echo $usuario['idade'];  ?>
                </div>
                <div class="dashboardInfoUsuarioItem">
                    <?php  echo $usuario['sexo'];  ?>
                </div>
                <div class="dashboardInfoUsuarioItem">
                    <?php  echo $usuario['peso'];  ?>
                </div>
                <div class="dashboardInfoUsuarioItem">
                    <?php  echo $usuario['altura'];  ?>
                </div>
                <div class="dashboardInfoUsuarioItem">
                    <?php  echo $usuario['imc'];  ?>
                </div>
                <div class="dashboardInfoUsuarioItem">
                    <?php  echo $usuario['avaliacaoUsuario'];  ?>
                </div>
        </div>
        <div class="dashboard_tela_secundario">
                <div class="dashboard_tela_secundario_item">
                        <h1>Dieta</h1>
                        <?php 
                        
                        include_once('script.php');
                        $dieta = '';
                        $descriçãoDieta = '';
                        if($usuario['dieta'] == 'nao'){
                            $dieta = 'Dieta DinoCarnivora';
                            $descriçãoDieta = 'A dieta "T-Rex" para humanos foca em alta ingestão de proteínas animais, com carnes magras (bife, frango, peixe) e ovos como base. É uma dieta de baixo carboidrato, priorizando gorduras saudáveis de fontes como abacate e óleos vegetais. Vegetais com baixo amido,
                             como brócolis e espinafre, podem ser incluídos para fornecer fibras e micronutrientes. O foco é em alimentos naturais, com ênfase no aumento de massa muscular.';

                            echo $dieta;
                            echo "<br>";
                            echo $descriçãoDieta;
                        }elseif($usuario['dieta'] == 'vegetariano'){
                            $dieta = 'Dieta Bronto';
                            $descriçãoDieta = 'Baseada exclusivamente em alimentos de origem vegetal, exclui carnes, laticínios, ovos e mel.  
                            **Alimentos Recomendados:** Leguminosas (feijões, lentilhas, grão-de-bico), cereais integrais, frutas, vegetais, oleaginosas (nozes, castanhas) e sementes (chia, linhaça).';

                            echo $dieta;
                            echo "<br>";
                            echo $descriçãoDieta;
                            
                        }elseif($usuario['dieta'] == 'sim'){
                            $dieta = 'Dieta triceratops';
                            $descriçãoDieta = 'Baseada exclusivamente em alimentos de origem vegetal, exclui carnes, laticínios, ovos e mel.  
                            **Alimentos Recomendados:** Leguminosas (feijões, lentilhas, grão-de-bico), cereais integrais, frutas, vegetais, oleaginosas (nozes, castanhas) e sementes (chia, linhaça).';

                            echo $dieta;
                            echo "<br>";
                            echo $descriçãoDieta;
                        }
                        
                        
                        ?>
                </div>
                <div class="dashboard_tela_secundario_item1">
                    <h1>Recomendação</h1>
                    <?php 
                            include_once('script.php');
                            $imc = $usuario['imc'];
                            function recomendaRecomendacao(){
                                global $imc, $recomendacao;
                                if($imc < 18.5){
                                    $recomendacao = 'Se o seu IMC está abaixo de 18,5, é importante ganhar peso de forma saudável.
                                                     Aumente sua ingestão calórica com alimentos ricos em nutrientes, como nozes, abacates, carnes magras e carboidratos integrais.
                                                     Coma de 5 a 6 refeições pequenas ao dia e inclua proteínas de alta qualidade (como ovos, peixes e legumes). Priorize gorduras saudáveis,
                                                     como azeite de oliva e peixes gordurosos. Foque em musculação para ganhar massa muscular e evite exercícios aeróbicos excessivos. 
                                                     Hidrate-se bem e, se necessário, considere suplementos como whey protein para complementar sua alimentação.';
                                }elseif($imc >= 18.5 && $imc <= 24.9){
                                    $recomendacao = 'Se o seu IMC está entre 18,5 e 24,9, você está no peso ideal. Para manter essa faixa, 
                                                     mantenha uma alimentação equilibrada com porções adequadas de proteínas, carboidratos integrais e gorduras saudáveis. 
                                                     Priorize alimentos frescos e nutritivos, como frutas, legumes, carnes magras e grãos integrais. Faça refeições regulares e inclua exercícios físicos,
                                                     com foco em atividades aeróbicas e de resistência, para manter a saúde e o peso. Mantenha-se hidratado e evite excessos de alimentos processados e açúcares.';
                                }elseif($imc >= 25.0 && $imc <= 29.9){
                                    $recomendacao = 'Se o seu IMC está entre 25,0 e 29,9, você está na faixa de sobrepeso. Para melhorar sua saúde e alcançar um peso ideal, é importante adotar uma alimentação balanceada, 
                                                     rica em vegetais, proteínas magras e carboidratos integrais. Evite alimentos ricos em gorduras saturadas e açúcares refinados. Pratique atividades físicas regulares, combinando exercícios aeróbicos e musculação,
                                                     para queimar gordura e fortalecer os músculos. Mantenha-se hidratado e procure controlar o tamanho das porções para evitar o consumo excessivo de calorias.';
                                }elseif($imc >= 30.0 && $imc <= 39.9){
                                    $recomendacao = 'Se o seu IMC está entre 30,0 e 39,9, você está na faixa de obesidade. Para melhorar sua saúde e alcançar um peso ideal, é importante adotar uma alimentação balanceada, rica em vegetais, 
                                                     proteínas magras e carboidratos integrais. Evite alimentos ricos em gorduras saturadas e açúcares refinados. Pratique atividades físicas regulares, combinando exercícios aeróbicos e musculação, para queimar gordura e fortalecer os músculos. 
                                                     Mantenha-se hidratado e procure controlar o tamanho das porções para evitar o consumo excessivo de calorias.';
                                }else{
                                    $recomendacao = 'Se o seu IMC está acima de 39, você está na faixa de obesidade mórbida. Nessa situação, é crucial adotar uma abordagem cuidadosa e estruturada para a perda de peso. Priorize uma alimentação saudável, focando em alimentos ricos em nutrientes e com baixo teor calórico,
                                                     como vegetais, proteínas magras e carboidratos integrais. Evite alimentos processados, fritos e ricos em açúcares. A prática regular de atividades físicas, com acompanhamento profissional, é fundamental, combinando exercícios aeróbicos e de força. Procure orientação médica e nutricional para garantir um plano de perda de peso seguro e eficaz,
                                                     que pode incluir, em alguns casos, intervenções mais específicas como tratamentos médicos ou até cirurgias.';
                                }
                            }                                

                            recomendaRecomendacao();
                            echo $recomendacao;

                    ?>
                </div>
        </div>
    </div>

</body>
</html>
