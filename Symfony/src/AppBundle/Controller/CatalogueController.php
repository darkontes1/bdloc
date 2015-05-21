<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Entity\Author;
use AppBundle\Entity\Serie;
use AppBundle\Entity\Commande;
use AppBundle\Entity\RelBookOrder;
use AppBundle\Form\BookCateType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CatalogueController extends Controller
{
    /**
     * @Route("/catalogue", name="catalogue")
     */
    public function catalogueAction(Request $request)
    {        
        $bookrepo=$this->get("doctrine")->getRepository("AppBundle:Book");
        //$book=$bookrepo->findBy(array(), null, 5);
        $book=$bookrepo->allResults();
        $orderrepo=$this->get("doctrine")->getRepository("AppBundle:RelBookOrder");
        $order=$orderrepo->findAll();

        $books = new Book();
        $createBookForm = $this->createForm(new BookCateType(), $books);
        $createBookForm->handleRequest($request);
        if($createBookForm->isValid()){
            $bookrepo=$this->get("doctrine")->getRepository("AppBundle:Book");
            $books=$bookrepo->cateResult();
        }

        if(!$this->getUser()) {
            return $this->redirectToRoute('home');
        }

        /*$dessinateur=$bookrepo->findByDessinateur($book);*/

        $params=array(
            'createBookForm' => $createBookForm->createView(),
            'books'=>$book,
            'orders'=>$order
        );

        return $this->render('catalogue.html.twig',$params);
    }

    /**
    * @Route("/details/{id}", name="book_details") 
    */
    public function bookDetailsAction($id)
    {

        $bookRepo = $this->get("doctrine")->getRepository("AppBundle:Book");
        $book = $bookRepo->find($id);

        if(!$this->getUser()) {
            return $this->redirectToRoute('home');
        }

        if (!$book){
            throw $this->createNotFoundException("Oupsie !");
        }

        $params = array(
            "book" => $book
        );
        return $this->render("bd/book_details.html.twig", $params);
    }


}