<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BookType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('num')
            ->add('title')
            ->add('editor')
            ->add('reference')
            ->add('cover')
            ->add('exlibris')
            ->add('nbPages')
            ->add('planche')
            ->add('idBel')
            ->add('exemplaires')
            ->add('dessinateur')
            ->add('coloriste')
            ->add('scenariste')
            ->add('serie')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Book'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_book';
    }
}
