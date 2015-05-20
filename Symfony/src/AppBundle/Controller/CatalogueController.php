<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Entity\Author;
use AppBundle\Entity\Serie;
use AppBundle\Entity\Commande;
use AppBundle\Entity\RelBookOrder;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CatalogueController extends Controller
{
    /**
     * @Route("/catalogue", name="catalogue")
     */
    public function catalogueAction()
    {        

        $bookrepo=$this->get("doctrine")->getRepository("AppBundle:Book");
        //$book=$bookrepo->findBy(array(), null, 5);
        $book=$bookrepo->allResults();

        $orderrepo=$this->get("doctrine")->getRepository("AppBundle:RelBookOrder");

        

        $order=$orderrepo->findAll();



        /*$dessinateur=$bookrepo->findByDessinateur($book);*/





        $param=array('books'=>$book,
            'orders'=>$order

            );


        return $this->render('catalogue.html.twig',$param);
    }

        /**
    * @Route("/details/{id}", name="book_details") 
    */
    public function bookDetailsAction($id)
    {

        $bookRepo = $this->get("doctrine")->getRepository("AppBundle:Book");
        $book = $bookRepo->find($id);

        
        if (!$book){
            throw $this->createNotFoundException("Oupsie !");
        }

        $params = array(
            "book" => $book
        );
        return $this->render("bd/book_details.html.twig", $params);
    }

}