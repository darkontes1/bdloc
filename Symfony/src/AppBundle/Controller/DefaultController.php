<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {

        if ($this->getUser()) {
            return $this->redirectToRoute('catalogue');
        }

        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/reglement", name="rules")
     */
    public function rulesAction()
    {
        return $this->render('default/rules.html.twig');
    }

    /**
     * @Route("/catalogue", name="catalogue")
     */
    public function catalogueAction()
    {
        return $this->render('catalogue.html.twig');
    }

    /**
    * @Route(
    *   "/details/{id}",
    *   name="book_details"
    * ) 
    */
    public function bookDetailsAction($id)
    {

        $bookRepo = $this->get("doctrine")->getRepository("AppBundle:Book");
        $book = $bookRepo->find($id);

        
        if (!$book){
            throw $this->createNotFoundException("Oupsie !");
        }
         
            

        //récupère les commentaires associés à l'article actuel
        //$commentsRepo = $this->get("doctrine")->getRepository("AppBundle:Comment");
        //$comments = $commentsRepo->findByStory($story);
        //$comments = $commentsRepo->findBy(
        //  array("story" => $story)
        //);

        $params = array(
            "book" => $book
        );
        return $this->render("bd/book_details.html.twig", $params);
    }
}
