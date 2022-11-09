<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    public function list(EntityManagerInterface $em,ProductRepository $repo): Response
    {
        dump($repo->searchByName2("sam"));
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    public function detail($id=0,ProductRepository $repo): Response{
        return $this->render("produit/detail.html.twig",[
            "produit"=>$repo->find($id)
        ]);
    }


    public function add(Request $request,ProductRepository $repo): Response{

        // création objet produit
        $product = new Product();
        // création formulaire
        $formProduct = $this->createForm(ProductType::class,$product);
        // recup des données
        $formProduct->handleRequest($request);

        if($formProduct->isSubmitted() && $formProduct->isValid() ){
            //traitement
            $repo->add($product,true);
            $this->addFlash("success","Le produit a bien été ajouté!");
            return $this->redirectToRoute("app_produit_detail",
            ["id"=>$product->getId()]);
        }

        return $this->render("produit/add.html.twig",[
            "formProduct"=>$formProduct->createView()
        ]);
    }
}
