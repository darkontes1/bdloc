<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use AppBundle\Entity\Author;
use AppBundle\Entity\Serie;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CatalogueController extends Controller
{
    /**
     * @Route("/catalogue", name="catalogue")
     */
    public function catalogueAction()
    {
        $bd= new Book();

        $bookrepo=$this->get("doctrine")->getRepository("AppBundle:Book");
        $book=$bookrepo->findBy(array(), null, 5);

        /*$dessinateur=$bookrepo->findByDessinateur($book);*/





        $param=array('books'=>$book

            );


        return $this->render('catalogue.html.twig',$param);
    }
}