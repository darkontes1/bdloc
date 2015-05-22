<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Entity\Author;
use AppBundle\Entity\Serie;
use AppBundle\Entity\Commande;
use AppBundle\Entity\RelBookOrder;
use AppBundle\Entity\PickUpSpot;

use AppBundle\Form\PickUpSpotType;
use AppBundle\Form\CommandeType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class OrderController extends Controller
{


    /**
    * @Route("/ajout/{id}", name="ajoutPanier") 
    */
    public function ajoutPanierAction($id)
    {
        $em=$this->get("doctrine")->getManager();


        $orderrepo=$this->get("doctrine")->getRepository("AppBundle:Commande");

        $user=$this->getUser();

        $bookrepo=$this->get("doctrine")->getRepository("AppBundle:Book");

        $book=$bookrepo->find($id);
        $ex=$book->getExemplaires();


        $book->setExemplaires($ex-1);

        $bookrepo=$this->get("doctrine")->getRepository("AppBundle:Book");

        $book=$bookrepo->find($id);
        
        $em->persist($book);
        $em->flush();

        

        

        if($commande=$orderrepo->findOneBy(array('user'=>$user, 'status'=>"panier"))){
            
            $commande=$orderrepo->findOneBy(array('user'=>$user, 'status'=>"panier"));


            $nb=$commande->getNbBD();
            $commande->setNbBD($nb+1);
            
            
        }

        else{

            $commande= new Commande();

            $commande->setDate(new \DateTime());
            $commande->setNbBD(1);
            $commande->setUser($this->getUser());
            $commande->setStatus("panier");                                      

            
        }

        $em->persist($commande);
        $em->flush();

        $panier= new RelBookOrder();
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
       

        $order=$orderrepo->findByStatus(false);

        if (!$orderrepo->findByStatus(false)) {
            return $this->redirectToRoute('catalogue');
        }
        $param=array(
            'orders'=>$order

            );


        return $this->render('order/panier.html.twig',$param);

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


        
        $nb=$dyingorder->getNbBD();
        if ($nb>0) {
            $dyingorder->setNbBD($nb-1);
        }
        

        $em->persist($dyingorder);
        $em->flush();

        if (!$dyingorder) {
            throw  $this->createAccessDeniedException("access denied");
            
        }


        
        $relrepo=$this->get("doctrine")->getRepository("AppBundle:RelBookOrder");

        
        


        $dyingrel=$relrepo->findByOrder($dyingorder);

        $ex=$dyingrel[0]->getBook()->getExemplaires();
        $dyingrel[0]->getBook()->setExemplaires($ex+1);


        $em->remove($dyingrel[0]);
        $em->flush();

        return $this->redirectToRoute('panier');


    }

    /**
    * @Route("/panier/confirmation/{id}", name="panier_confirm") 
    */
     public function panierConfirmAction($id,Request $request)
    {
        $spot=new PickUpSpot(); 
        $validrepo=$this->get("doctrine")->getRepository("AppBundle:Commande");

        $relrepo=$this->get("doctrine")->getRepository("AppBundle:RelBookOrder");



        $valid=$validrepo->find($id);

        $rel=$relrepo->findByOrder($valid);
        
        $count=count($rel);
        

        $createSpotForm = $this->createForm(new PickUpSpotType(), $spot);
        $createSpotForm->handleRequest($request);

    
        if ($createSpotForm->isValid()){

            $valid->setStatus("valider");
            $valid->setPickUpSpot($createSpotForm->get("relais")->getData());
            $valid->setDate(new \DateTime('+2 days'));
            
            for ($i=0; $i<$count ; $i++) { 
                $rel[$i]->setStatus(true);
            }

            $em = $this->get("doctrine")->getManager();
            $em->persist($valid);
            $em->flush();

            return $this->redirectToRoute('validation',array('id'=>$id));


        }

        $params = array(
            "createSpotForm" => $createSpotForm->createView()
        );
        return $this->render("order/confirm.html.twig", $params);
    }

    /**
    * @Route("/panier/validation/{id}", name="validation") 
    */
    public function paniervalidAction($id,Request $request)
    {
         
        $validrepo=$this->get("doctrine")->getRepository("AppBundle:Commande");
        dump($id);
        $valid=$validrepo->find($id);

        $relrepo=$this->get("doctrine")->getRepository("AppBundle:RelBookOrder");

        $rel=$relrepo->findByOrder($valid);

        

        $params = array(
            "valid" => $valid,
            "rel"=>$rel
        );
        return $this->render("order/valid.html.twig", $params);


        

    }



}