<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Perfil do Usuário</title>
</head>
<body>
    <div class="container">
        <div class="foto-perfil"></div>
        <div class="info"><strong>Nome:</strong> <?php echo $nome; ?></div>
        <div class="info"><strong>Idade:</strong> <?php echo $idade; ?> anos</div>
        <div class="info"><strong>Peso:</strong> <?php echo $peso; ?> kg</div>
        <div class="info"><strong>Metas:</strong> <?php echo $metas; ?></div>
        <div class="info"><strong>Plano Alimentar:</strong> <?php echo $planoAlimentar; ?></div>
    </div>
</body>
</html>
