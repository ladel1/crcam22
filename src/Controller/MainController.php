<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController{

    /**
     * @Route("/")
     */
    public function index():Response{  
        
        $clients = [
            [
                "firstname"=>"Florian",
                "lastname"=>"Boivin",
                "city"=>"Paris"
            ],
            [
                "firstname"=>"Boris",
                "lastname"=>"Vatin",
                "city"=>"Brest"
            ],
        ];
        $name="Adel";
        return $this->render("main/index.html.twig",compact("clients","name"));
    }

}