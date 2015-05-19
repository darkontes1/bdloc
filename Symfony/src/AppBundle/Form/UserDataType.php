<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserDataType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null,  array(
                "label" => "Pseudo de l'utilisateur"
            ))
            ->add('nom', null, array(
                "label" => "Nom de l'utilisateur"
            ))
            ->add('prenom', null, array(
                "label" => "Prenom de l'utilisateur"
            ))
            ->add('email', 'email', array(
                "label" => "Email"
            ))
            ->add('adresse', 'string', array(
                "label" => "Adresse (num rue app)"
            ))
            ->add('telephone', 'integer', array(
                "label" => "Telephone"
            ))
            ->add('Modifier', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_user';
    }
}
