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
     * @Route("/catalogue/{page}", 
     * requirements={"page":"[1-9]\d*"}, 
     * defaults={"page":1},
     * name="catalogue")
     */
    public function catalogueAction(Request $request, $page)
    {        
        $bookrepo = $this->get("doctrine")->getRepository("AppBundle:Book");
        //$book = $bookrepo->allResults();

        //$orderrepo = $this->get("doctrine")->getRepository("AppBundle:RelBookOrder");
        //$order = $orderrepo->findAll();
        $cate = "";
        $exem = "";
        $mc = "";
        $books = new Book();
        $createBookForm = $this->createForm(new BookCateType(), $books);
        $createBookForm->handleRequest($request);
        $toto = $request->getQueryString();

        if($createBookForm->isValid()){
            $cate = $createBookForm->get("category")->getData();
            $exem = $createBookForm->get("dispo")->getData();
            $mc = $createBookForm->get("keyword")->getData();
            //$bookrepo=$this->get("doctrine")->getRepository("AppBundle:Book");
            //$book = $bookrepo->cateResult($cate, $exem, $mc);
        }
        $paginationResults = $bookrepo->findPaginated($page, $cate, $exem, $mc);
        if (!$paginationResults){
            throw $this->createNotFoundException();
        }

        if(!$this->getUser()) {
            return $this->redirectToRoute('home');
        }

        $params=array(
            'createBookForm' => $createBookForm->createView(),
            'toto' => $toto,
            //'books' => $book,
            //'orders' => $order,
            "paginationResults" => $paginationResults
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