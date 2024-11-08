<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevMonster Diet</title>
    <link rel="stylesheet" href="/style/styles.css">
</head>
<body>

<div class="container">
    <h1>DevMonster Diet</h1>
    
    <label for="nome">Nome completo:</label>
    <input type="text" id="nome" name="nome">

    <label for="data-nascimento">Data de Nascimento:</label>
    <input type="date" id="data-nascimento" name="data-nascimento">

    <label>Sexo:</label>
    <label><input type="radio" name="sexo" value="masculino"> Masculino</label>
    <label><input type="radio" name="sexo" value="feminino"> Feminino</label>

    <label for="idade">Idade:</label>
    <input type="text" id="idade" name="idade">

    <label for="altura">Altura:</label>
    <input type="text" id="altura" name="altura">

    <label for="peso">Peso atual:</label>
    <input type="text" id="peso" name="peso">

    <label>Dificuldades referentes à sua alimentação (qual a sua maior dificuldade?):</label>
    <textarea id="dificuldades" name="dificuldades"></textarea>

    <label>Você é vegetariano ou vegano?</label>
    <label><input type="radio" name="vegetariano" value="sim"> Vegetariano</label>
    <label><input type="radio" name="vegetariano" value="nao"> Vegano</label>
    <label><input type="radio" name="vegetariano" value="nao"> Não</label>

    <label for="cafe-da-manha">O que você costuma comer no seu CAFÉ DA MANHÃ?</label>
    <textarea id="cafe-da-manha" name="cafe-da-manha"></textarea>

    <label for="almoco">O que você costuma comer no seu ALMOÇO?</label>
    <textarea id="almoco" name="almoco"></textarea>

    <label for="lanche-tarde">O que você costuma comer no seu LANCHE DA TARDE?</label>
    <textarea id="lanche-tarde" name="lanche-tarde"></textarea>

    <label for="janta">O que você costuma comer na sua JANTA?</label>
    <textarea id="janta" name="janta"></textarea>

    <label for="observacoes">No seu fim de semana:</label>
    <textarea id="observacoes" name="observacoes"></textarea>

</div>

</body>
</html>
