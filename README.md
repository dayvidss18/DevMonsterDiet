# Symfony Tests
Branch Criada para testar o symfony no projeto

# Como Buildar
- Instale o Composer no site oficial
- Digite o arquivo da branch composer install
- Adicione o .env 
- Baixe o Symfony Cli
- Rode usando symfony server:start
- Para parar o server digite symfony local:server:stop
<<<<<<< HEAD

# Frontend 
Todo codigo frontend deve ser feito na pasta https://github.com/dayvidss18/DevMonsterDiet/tree/symfonytest/public para referenciar o style ou script você deve colocar a apenas o nome do arquivo "style.css" ou "script.js" caso tenha alguma pasta digite o "nomepasta/style.css" ou "nomepasta/script.js" caso precisar usar uma biblioteca js ou css ela será incluida no projeto final.

E na pasta https://github.com/dayvidss18/DevMonsterDiet/tree/symfonytest/templates todos html deve ter a seguinte sintaxe exemplo.html.twig estilos e scripts não funcionaram nessa pasta e não pode apagar base.html.twig as branch é de livre acesso.

# Backend 
Todo codigo backend deve ser introduzidos na pasta src e src/controllers https://github.com/dayvidss18/DevMonsterDiet/tree/symfonytest/src/Controller

Sintaxe de uma rota é:
```php 
    #[Route("/"), methods: ["GET"]]
    public function index(): Response{
        return new Response("Hello World");
    }
```

lembrando que ela deve estar em uma class que herda o atributo AbstractController, todas as bibliotecas basicas deve ser importadas como:

```php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Attribute\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Dotenv\Dotenv;
```
Todas Bibliotecas Basicas utilizadas no projeto estão ai.

