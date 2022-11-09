<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user",name="app_user_")
 */
class UserController extends AbstractController{

    /**
     * @Route("/",name="list")
     */
    public function index(){

    }  

    /**
     * @Route("/add",name="add")
     */
    public function add(){

    }

    /**
     * @Route("/details",name="details")
     */
    public function details(){
        
    }

}