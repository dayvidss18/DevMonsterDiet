<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevMonster Diet</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        <header class="">
            <a href="#"><img src="/images/logo.webp" alt="Logo imagem de um dinossauro" width="100px" heigth="100px"></a>
        </header>
        <main>
        <form action="post">

                <div class="container">
                    <h1>Cadastro</h1>
                    <label for="nome">Nome completo:</label>
                    <input type="text" id="nome" name="nome" class="input_text"> 
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="input_text">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha1" id="senha1" class="input_text">
                    <label for="senhaRep">Insira Sua Senha Novamente</label>
                    <input type="password" name="senha2" id="senha2" class="input_text">
                    <label>Sexo:</label>
                    <div class="lista_radio">
                    <label><input type="radio" name="sexo" value="masculino"> Masculino</label>
                    <label><input type="radio" name="sexo" value="feminino"> Feminino</label>
                    </div>
                    <br>
                    <label for="data-nascimento">Data de Nascimento:</label>
                    <input type="date" id="data-nascimento" name="data-nascimento" class="input_text">
                    <br>
                    <label for="idade">Idade:</label>
                    <input type="text" id="idade" name="idade" class="input_text">
                    <br>
                    <label for="altura">Altura:</label>
                    <input type="text" id="altura" name="altura" class="input_text">
                    <br>
                    <label for="peso">Peso atual:</label>
                    <input type="text" id="peso" name="peso" class="input_text">
                    <br>
                    <label>Dificuldades referentes à sua alimentação (qual a sua maior dificuldade?):</label>
                    <textarea id="dificuldades" name="dificuldades"></textarea>
                    <br>
                    <label>Você é vegetariano ou vegano?</label>
                    <div class="lista_radio">
                        <label>
                            <input type="radio" name="vegetariano" value="sim"> Vegetariano</label>
                        <label>
                            <input type="radio" name="vegetariano" value="nao"> Vegano</label>
                        <label>
                            <input type="radio" name="vegetariano" value="nao">Não</label>
                    </div>
                    
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
                    <input type="button" value="Cadastrar" class="botões_geral">
                </div>
            </form>    
        </main>
        <footer class="rodape_container">
            <h1>©DevMonster</h1>
            <p>Todos o direitos reservados</p>
            <p>Este site oferece receitas com fins informativos e educativos. Consulte sempre um profissional de saúde antes de fazer mudanças significativas na sua dieta.</p>
        </footer>
</body>
</html>
