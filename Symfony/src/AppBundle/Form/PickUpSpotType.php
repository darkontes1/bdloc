<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PickUpSpotType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('relais','entity',array(
                'class'=>'AppBundle:PickUpSpot',
                'property'=>'adresse'))
            ->add('cP')
            ->add('nomEntreprise')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PickUpSpot'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_pickupspot';
    }
}
