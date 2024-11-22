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
                    sexo ENUM("masculino", "feminino"),
                    email MEDIUMTEXT
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
                    $sexo = $request->get("sexo");
                    $avaliacaoUsuario = '';

                    function verificaSenhaIgual() {
                        global $senha1, $senha2, $senhaUsuario;
                        if ($senha1 == $senha2) {
                            $senhaUsuario = $senha1;
                        } else {
                            echo "As senhas não são iguais.<br>";
                            exit();
                        }
                    }
                    /*
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
                    }*/
                    verificaSenhaIgual();
                    //verificaImc();

                    $nome = $nome ?? '';
                    $sql_query = "SELECT * FROM usuarios WHERE nome = '$nome'";

                    $result = $conn->query($sql_query);
                    if($result->num_rows == 0){
                        $stmt = $conn->prepare("INSERT INTO usuarios (nome, idade, senha, altura, peso, imc, sexo, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                        if ($stmt === false) {
                            die("Erro ao preparar a consulta: " . $conn->error);
                        }
                        
                        // Corrigindo a string de tipos
                        $stmt->bind_param("sissddss", $nome, $idade, $senha1, $altura, $peso, $imc, $sexo, $email);
                        
                        // Executar a consulta
                        if (!$stmt->execute()) {
                            echo "Erro ao inserir usuário: " . $stmt->error;
                        } else {
                            echo "Usuário inserido com sucesso!";
                        }
                        
                        // Fechar a declaração
                        $stmt->close();
                        if(mysqli_query($conn, $sql_query)){
                            return new Response("Internal Error 500, INSERT ERROR");
                        }
                    }
                    $results = $conn->query($sql_query);
                    $dados = array();
                    while($row = $results->fetch_assoc()){    
                        $dados[] = $row;
                        return $this->render("diet/dashboard.html.twig", ["dados"=>$dados]);
                    }

                }else {
                    return new Response("Internal Error 500, TABLE IS NO CREATED");
                }
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
                            return $this->render("diet/dashboard.html.twig", ["dados"=>$dados]);
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