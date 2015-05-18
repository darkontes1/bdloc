<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Util\SecureRandom;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class UserController extends Controller
{
    /**
     * @Route("/enregistrement", name="register_user")
     */
    public function registerUserAction(Request $request)
    {
        $user = new User();
        $createUserForm = $this->createForm(new UserType(), $user);
        $createUserForm->handleRequest($request);
        if ($createUserForm->isValid()){
            $generator = new SecureRandom();
            $salt = bin2hex( $generator->nextBytes(50) );
            $token = bin2hex( $generator->nextBytes(50) );
            $user->setSalt($salt);
            $user->setToken($token);
            $user->setStatus(true);
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
            return $this->redirectToRoute('catalogue');
        }

        return $this->render("user/modify_user.html.twig");
    }

    /**
     * @Route("/profil/modifier-utilisateur", name="modify_data_user")
     */
    public function modifyUserAction(Request $request)
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('catalogue');
        }

        return $this->render("user/modify_data_user.html.twig");
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
}