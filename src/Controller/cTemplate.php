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
    }
?>