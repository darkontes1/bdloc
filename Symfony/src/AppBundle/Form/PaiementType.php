<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaiementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ccn','text')
            ->add('cvv','text')
            ->add('exp', 'date', array(
                    'widget' => 'choice',
                    'format' => 'MM yyyydd',
                ))
            // ->add('amo')
            ->add('cur')
            ->add('mid')
            // ->add('tim')
            ->add('tok')
            ->add('tes')
            ->add('Payer', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Paiement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_paiement';
    }
}
