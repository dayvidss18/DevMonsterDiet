<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Attribute\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


    class cTemplate extends AbstractController {
        #[Route("/", methods: ["GET"])]
        public function index(): Response{
            return $this->render("diet/index.html.twig");
        }

        #[Route("/ficha", methods: ["GET"])]
        public function ficha(): Response{
            return $this->render("diet/ficha.html.twig");
        }

        #[Route("/dashboard", methods: ["GET"])]
        public function dashboard(): Response {
            $conn = new \mysqli($_ENV["HOST"], "root", $_ENV["PASSWORD"]);
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
                $sql_query = 'SELECT * FROM usuarios';
                $results = $conn->query($sql_query);
                $dados = array();
                while($row = $results->fetch_assoc()){    
                    $dados[] = $row;
                }
                return $this->render("diet/dashboard.html.twig", ["dados"=>$dados]);
            }else {
                return new Response("Internal Error 500, TABLE IS NO CREATED");
            }

        }
    }
?>