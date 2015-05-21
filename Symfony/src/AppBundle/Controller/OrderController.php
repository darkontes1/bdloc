<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Entity\Author;
use AppBundle\Entity\Serie;
use AppBundle\Entity\Commande;
use AppBundle\Entity\RelBookOrder;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class OrderController extends Controller
{


    /**
    * @Route("/ajout/{id}", name="ajoutPanier") 
    */
    public function ajoutPanierAction($id)
    {
        $em=$this->get("doctrine")->getManager();
        $commande= new Commande();

        $bookrepo=$this->get("doctrine")->getRepository("AppBundle:Book");

        $book=$bookrepo->find($id);
        $ex=$book->getExemplaires();


        $book->setExemplaires($ex-1);

        $panier= new RelBookOrder();

        $commande->setDate(new \DateTime());
        $commande->setNbBD(1);
        $commande->setUser($this->getUser());
        $commande->setStatus("panier");
        
            
            $em->persist($book);
            $em->flush();
            $em->persist($commande);
            $em->flush();
        
        



        $panier->setOrder($commande);
        $panier->setStatus(false);
        $panier->setDateOrder(new \DateTime());
        $panier->setBook($book);


        $em->persist($panier);
        $em->flush();
        

        return $this->redirectToRoute('catalogue');

    }


    /**
    * @Route("/panier", name="panier") 
    */
    public function afficherPanierAction(){

        $orderrepo=$this->get("doctrine")->getRepository("AppBundle:RelBookOrder");
        

        $order=$orderrepo->findAll();


        $param=array(
            'orders'=>$order

            );


        return $this->render('panier.html.twig',$param);

    }
    
    /**
    * @Route("/panier/effacer/{id}", name="panier_delete") 
    */
     public function panierDeleteAction($id)
    {
        $em=$this->get("doctrine")->getManager();
        
        $orderrepo=$this->get("doctrine")->getRepository("AppBundle:Commande");
        
        $bookrepo=$this->get("doctrine")->getRepository("AppBundle:Book");


        



        $dyingorder=$orderrepo->find($id);

        if (!$dyingorder) {
            throw  $this->createAccessDeniedException("access denied");
            
        }


        
        $relrepo=$this->get("doctrine")->getRepository("AppBundle:RelBookOrder");

        
        


        $dyingrel=$relrepo->findByOrder($dyingorder);

        $ex=$dyingrel[0]->getBook()->getExemplaires();
        $dyingrel[0]->getBook()->setExemplaires($ex+1);

        $em->remove($dyingrel[0]);
        $em->flush();

        $em->remove($dyingorder);
        $em->flush();

        return $this->redirectToRoute('panier');


    }

    /**
    * @Route("/panier/effacer/{id}", name="panier_delete") 
    */
     public function panierConfirmAction($id)
    {



}