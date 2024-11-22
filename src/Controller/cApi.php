<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Attribute\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Dotenv\Dotenv;
    use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

    
    class cApi extends AbstractController {
        #[Route("/register", methods: ["POST"])]
        public function register(Request $request): Response {
            
            $conn = new \mysqli($_ENV["HOST"], "root", $_ENV["PASSWORD"]);

            if($conn->connect_error){
                return new Response("500");
            }else {
                $sql_query = "USE diet;";
                mysqli_query($conn, $sql_query);
                $sql_query = '
                CREATE TABLE IF NOT EXISTS usuarios (
                    nome VARCHAR(30),
                    idade INT,
                    senha VARCHAR(15),
                    altura FLOAT,
                    peso FLOAT,
                    imc FLOAT,
                    sexo ENUM("masculino", "feminino")
                    email VARCHAR(60)
                )';
                if(mysqli_query($conn, $sql_query)){
                    $dados = [];
                    $nome = $request->get("nome");
                    $idade = $request->get("idade");
                    $email = $request->get("email");
                    $senha1 = $request->get("senha1");
                    $senha2 = $request->get("senha2");
                    $senhaUsuario = '';
                    $altura = $request->get("altura");
                    $peso = $request->get("peso");
                    $imc = 0;
                    $sexo = $request->get("altura");
                    $avaliacaoUsuario = '';
                    if ($sexo) {
                        $sexo = $request->get("sexo");
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
                    $sql_query = "SELECT * FROM usuarios WHERE nome = $nome";

                    $result = $conn->query($sql_query);
                    if($result->num_rows == 0){
                        $sql_query = "INSERT INTO usuarios ($nome, $idade, $senhaUsuario, $altura, $peso, $imc, $sexo)";
                        if(mysqli_query($conn, $sql_query)){
                            return new Response("Internal Error 500, INSERT ERROR");
                        }
                    }
                }else {
                    return new Response("Internal Error 500, TABLE IS NO CREATED");
                }
            
                
                return new Response("200");
            }
            $conn>close();
            //echo "Dados: <pre>" . print_r($dados, true) . "</pre><br>";
        }
        #[Route("/login", methods: ["POST"])]
        public function login(Request $request, AuthenticationUtils $authenticationUtils): Response {
            $conn = new \mysqli($_ENV["HOST"], "root", $_ENV["PASSWORD"]);

            if($conn->connect_error){
                return new Response("500");
            }else {
                $sql_query = "USE diet;";
                mysqli_query($conn, $sql_query);
                $sql_query = '
                CREATE TABLE IF NOT EXISTS usuarios (
                    nome VARCHAR(30),
                    idade INT,
                    senha VARCHAR(15),
                    altura FLOAT,
                    peso FLOAT,
                    imc FLOAT,
                    sexo ENUM("masculino", "feminino"),
                    email VARCHAR(60)
                )';
                if(mysqli_query($conn, $sql_query)){
                    $email = $request->get("emailLogin");
                    $senha = $request->get("senhaLogin");
                    if(isset($email) && isset($senha)){
                        $sql_query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
                        $dados = $conn->query($sql_query);
                        $rows = $dados->num_rows;

                        if($rows <= 0){
                            $error = $authenticationUtils->getLastAuthenticationError();
                            return $this->render("diet/login.html.twig", ["error"=>$error ? $error->getMessage(): null]);
                        }else {
                            return $this->render("diet/dashboard.html.twig");
                        }
                    }
                }else {
                    return new Response("Internal Error 500, TABLE IS NO CREATED");
                }
            }
            $conn->close();
        }
    }
?>