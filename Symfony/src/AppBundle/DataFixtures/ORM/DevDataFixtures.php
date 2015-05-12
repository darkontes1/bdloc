<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAware;


use AppBundle\Entity\Story;
use AppBundle\Entity\Comment;
use AppBundle\Entity\User;

class DevDatafixtures extends ContainerAware implements FixtureInterface
{

    public $em;
    public function load(ObjectManager $em)
    {



        $this->em=$em;
        for ($i=0; $i<5 ; $i++) { 

            $faker = \Faker\Factory::create();
            //$faker->addProvider(new Faker\Provider\ja_JP\Company($faker));


            $user=$this->createUser();
        

            /*for ($x=0; $x<5 ; $x++) { 
                
                $story=$this->createStory($user);

                for ($y=0; $y <2 ; $y++) {
                    $this->createComment($story);
                    
                }
            }*/
            $em->flush();
        }
    }

        public function createUser()
        {
            $userAdmin = new User();

            $faker = \Faker\Factory::create();
            
            $userAdmin->setNom($faker->lastName);
            $userAdmin->setPrenom($faker->firstName);
            $userAdmin->setPseudo($faker->userName);
            $userAdmin->setEmail($faker->email);
            $userAdmin->setStatus(true);
            

            $generator= new SecureRandom();
                $salt=bin2hex($generator->nextBytes(50));
                $token=bin2hex($generator->nextBytes(50));

                $userAdmin->setSalt($salt);
                $userAdmin->setToken($token);


                $userAdmin->setPassword("test");

                $userAdmin->setRaisons("test");



                $userAdmin->setDateCreated(new \DateTime());
                $userAdmin->setDateModified(new \DateTime());
                $userAdmin->setDateLastLogin(new \DateTime());

            $this->em->persist($userAdmin);

            return $userAdmin;
        }

        public function createStory($userAdmin)
        {

                $story= new Story();

                $faker = \Faker\Factory::create('fr_FR');

                $story->setTitle($faker->sentence);
                $story->setContent($faker->text);
                $story->setDateCreated(new \DateTime());
                $story->setDateModified($story->getDateCreated());
                $slug=$this->container->get('cocur_slugify')->slugify($story->getTitle());
                $story->setSlug($slug);
                $story->setAuthor( $userAdmin);
                $story->setDatePublished(new \DateTime());
                $story->setIsPublished(true);


                $this->em->persist($story);
                return $story;
        }
        public function createComment($story)
        {

                    $comment=new Comment();

                    $faker = \Faker\Factory::create('ja_JP');

                    /*$faker = new Faker\Generator();
                    $faker->addProvider(new Faker\Provider\ja_JP\Person($faker));*/

                    $comment->setPseudo($faker->kanaName);
                    $comment->setEmail($faker->email);
                    $comment->setContent($faker->kanaName);

                    $comment->setDateCreated(new \DateTime());
                    $comment->setDateModified($comment->getDateCreated());
                    //$comment->setStory(getStory()->getId());

                    $comment->setStory($story);

                    
                    $em=$this->container->get("doctrine")->getManager();           
                    $this->em->persist($comment);
                    return $comment;
        }
               
    
}