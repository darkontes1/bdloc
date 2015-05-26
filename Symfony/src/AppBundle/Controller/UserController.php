<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Util\SecureRandom;

use AppBundle\Entity\User;
use AppBundle\Entity\Paiement;
use AppBundle\Entity\transaction;
use AppBundle\Form\UserAllType;
use AppBundle\Form\UserDataType;
use AppBundle\Form\UserPassType;
use AppBundle\Form\UserDeleteType;
use AppBundle\Form\PaiementType;


class UserController extends Controller
{
    /**
     * @Route("/enregistrement", name="register_user")
     */
    public function registerUserAction(Request $request)
    {
        $user = new User();
        $createUserForm = $this->createForm(new UserAllType(), $user);
        $createUserForm->handleRequest($request);
        if ($createUserForm->isValid()){
            $generator = new SecureRandom();
            $salt = bin2hex( $generator->nextBytes(50) );
            $token = bin2hex( $generator->nextBytes(50) );
            $user->setSalt($salt);
            $user->setToken($token);
            $user->setStatus(true);
            $user->setCP(75);
            $user->setRoles(array("ROLE_USER"));
            $user->setDateCreated( new \DateTime() );
            $user->setDateModified( new \DateTime() );
            $user->setDateLastLogin( new \DateTime() );
            $encoder = $this->get("security.password_encoder");
            $encodedPassword = $encoder->encodePassword(
                $user, $user->getPassword()
            );
            $user->setPassword($encodedPassword);
            $em = $this->get("doctrine")->getManager();
            $em->persist($user);
            $em->flush();
            //dump($user);
            //Create a message for the user
            $this->addFlash(
                'notice',
                'Vous avez bien été enregistré !'
            );
            return $this->redirectToRoute('login');
        }

        if ($this->getUser()) {
            return $this->redirectToRoute('catalogue');
        }
        $params = array(
            "createUserForm" => $createUserForm->createView()
        );
        return $this->render("user/register_user.html.twig", $params);
    }

    /**
     * @Route("/profil", name="modify_user")
     */
    public function profilAction(Request $request)
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('home');
        }

        return $this->render("user/modify_user.html.twig");
    }

    /**
     * @Route("/profil/modifier-utilisateur", name="modify_data_user")
     */
    public function modifyUserAction(Request $request)
    {
        $user = $this->getUser();
        $createUserForm = $this->createForm(new UserDataType(), $user);
        $createUserForm->handleRequest($request);
        if ($createUserForm->isValid()){
            $user->setDateModified(new \DateTime());

            $em = $this->get("doctrine")->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('modify_user');
        }

        if (!$this->getUser()) {
            return $this->redirectToRoute('home');
        }
        $params = array(
            "createUserForm" => $createUserForm->createView()
        );
        return $this->render("user/modify_data_user.html.twig", $params);
    }


    /**
     * @Route("/user/payer-amende", name="payer_amende")
     */
    public function showFineAction(Request $request)
    {        
        $fineRepo = $this->get("doctrine")->getRepository("AppBundle:Fine");
        $fines = $fineRepo->findByUser($this->getUser());

        $params=array(
            'fines' => $fines,
        );

        return $this->render('fine.html.twig',$params);
    }

    /**
     * @Route("/user/payer-amende/payemant-cb/{fineId}", name="paiement_amende")
     */
    public function payFineAction(Request $request, $fineId)
    {
        $paiement = new Paiement();
        $transaction = new transaction();
        $fineRepo = $this->get("doctrine")->getRepository("AppBundle:Fine");
        $fine = $fineRepo->find($fineId);


        $createPaiementForm = $this->createForm(new PaiementType(), $paiement);
        $createPaiementForm->handleRequest($request);

        $params = array(
            "createPaiementForm" => $createPaiementForm->createView(),
            "url" => ""
        );

        if ($createPaiementForm->isValid()){
            
            $montant = $fine->getMontant();

            $transaction->setStatus("Validée");
            $transaction->setMessage("Livre rendu abimé");
            $transaction->setMontant($montant);
            $transaction->setDateCreated(new \DateTime());

            
            $paiement->setAmo($montant);
            $date = new \DateTime();
            $date_sec = $date->format('U')-1000;
            $paiement->setTim($date_sec);


            $url_head = "http://guillaume.zz.mu/bank/payment/create?";
            $ccn = "ccn=".$paiement->getCcn();
            $ccn_bis = $paiement->getCcn();
            $cvv = "&cvv=".$paiement->getCvv();
            $date_exp = $paiement->getExp();
            $convert_exp = $date_exp->format('mY');
            $exp = "&exp=".$convert_exp;
            $amo = "&amo=".$paiement->getAmo();
            $amo_bis = $paiement->getAmo();
            $cur = "&cur=".$paiement->getCur();
            $mid = "&mid=".$paiement->getMid();
            $mid_bis = $paiement->getMid();
            $tim = "&tim=".$date_sec;//$paiement->getTim();
            $tim_bis = $date_sec;
            $secret = "3prkrbhtqhhwxgea3v72m6x24zdwbezkb3sx6rdrwk87bqht4ehsc9znabn7m782zk925n9s96h8r8ctn9nq6ev6fbkw5gt3axp7b8xfhcp25su6cvphc7xgwky24fyw";
            $pre_tok = $secret.$mid_bis.$ccn_bis.$amo_bis.$tim_bis;
            $tok = "&tok=".hash("sha256", $pre_tok);
            // $tes = "tes=".$paiement->getTes();


            $url = $url_head.$ccn.$cvv.$exp.$amo.$cur.$mid.$tim.$tok;

            $res = file_get_contents($url); 




            $em = $this->get("doctrine")->getManager();
            $em->persist($paiement);
            $em->flush();

            $em2 = $this->get("doctrine")->getManager();
            $em2->persist($transaction);
            $em2->flush();
            $params["url"] = $url;
            

        }

        return $this->render("payer_fine.html.twig", $params);
    }

    /**
     * @Route("/user/mes-transactions", name="transaction_detail")
     */
    public function showTransactionAction(Request $request)
    {        
        $transacRepo = $this->get("doctrine")->getRepository("AppBundle:transaction");
        $transactions = $transacRepo->findAll();

        $params=array(
            'transactions' => $transactions,
        );

        return $this->render('transaction.html.twig',$params);
    }




    /**
     * @Route("/profil/modifier-password-utilisateur", name="modify_pass_user")
     */
    public function modifyPassAction(Request $request)
    {
        $user = $this->getUser();
        $createUserForm = $this->createForm(new UserPassType(), $user);
        $createUserForm->handleRequest($request);
        if ($createUserForm->isValid()){
            $user->setDateModified(new \DateTime());
            $encoder = $this->get("security.password_encoder");
            $encodedPassword = $encoder->encodePassword(
                $user, $user->getPassword()
            );

            $user->setPassword($encodedPassword);

            $em = $this->get("doctrine")->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('modify_user');
        }

        if (!$this->getUser()) {
            return $this->redirectToRoute('home');
        }
        $params = array(
            "createUserForm" => $createUserForm->createView()
        );
        return $this->render("user/modify_pass_user.html.twig", $params);
    }

    /**
     * @Route("/profil/se-desabonner", name="delete_user")
     */
    public function deleteAction(Request $request)
    {
        $user = $this->getUser();
        $createUserForm = $this->createForm(new UserDeleteType(), $user);
        $createUserForm->handleRequest($request);
        if ($createUserForm->isValid()){
            $user->setDateModified(new \DateTime());
            $user->setStatus(false);

            $em = $this->get("doctrine")->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('logout');
        }
        
        if (!$this->getUser()) {
            return $this->redirectToRoute('home');
        }
        $params = array(
            "createUserForm" => $createUserForm->createView()
        );
        return $this->render("user/delete_user.html.twig", $params);
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request){

        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render(
            'user/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {

    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {

    }

    /**
     * @Route("/historique", name="historique")
     */
    public function historique(){
        $em=$this->get("doctrine")->getManager();


        $orderrepo=$this->get("doctrine")->getRepository("AppBundle:Commande");

        $user=$this->getUser();

        $commande=$orderrepo->findBy(array('user'=>$user, 'status'=>"valider"));

        $count=count($commande);

        $relrepo=$this->get("doctrine")->getRepository("AppBundle:RelBookOrder");

        $comm=$relrepo->findByOrder($commande);
        

        $params = array(
            "comm"=>$comm
        );
        return $this->render("user/historique.html.twig", $params);


    }
}