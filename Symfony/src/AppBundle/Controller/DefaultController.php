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
}
