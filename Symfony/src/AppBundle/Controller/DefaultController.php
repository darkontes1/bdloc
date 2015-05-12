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
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/connection", name="connect")
     */
    public function connectAction()
    {
        return $this->render('default/connect.html.twig');
    }

    /**
     * @Route("/reglement", name="rules")
     */
    public function rulesAction()
    {
        return $this->render('default/rules.html.twig');
    }

    /**
     * @Route("/abonnement", name="subscribe")
     */
    public function subscribeAction()
    {
        return $this->render('default/subscribe.html.twig');
    }
}
