<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController {

    /**
     * @Route("/hello/{name}/age/{age}", name="hello")
     * Montre la page qui dit bonjour
     *
     * @return void
     */
    public function hello($name = "annonyme", $age = "0"){

        return $this->render('hello.html.twig', [
            'name' => $name,
            'age' => $age
        ]);
    }

    /**
     * @Route("/", name="homepage")
     *
     */
    public function home(){
        $prenom = ["Lior" => 31, "Joseph" => 12 , "Robert" => 22];

        return $this->render( "home.html.twig",[
            'titre' => "Bonjour à tous !",
            'age' => 16,
            'tableau' => $prenom
        ]
            
        );
    }
}