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

                </div>
                <div class="dashboard_tela_secundario_item1">
                    <h1>Recomendação</h1>
                    <?php echo $usuario['recomendacao']; ?>
                </div>
        </div>
    </div>

</body>
</html>
