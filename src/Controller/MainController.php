<?php 

namespace App\Controller;

use App\Service\AdditionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController{

    
    /**
     * @Route("/blog/{page}", name="app_blog",requirements={"page":"\d+"})
     */
    public function blog($page=0):Response{  
        return new Response("blog ".$page);
    }
      
    
    /**
     * @Route("/", name="app_home")
     */
    public function index(AdditionService $addService):Response{
        
        dd($addService->add(4,3));
        
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