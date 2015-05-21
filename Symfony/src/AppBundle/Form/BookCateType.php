<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BookCateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', 'choice', array(
                'empty_value' => 'Toutes les categories',
                'mapped' => false,
                "label" => "Catégorie",
                "required" => false,
                'choices' => array(
                    'Science-fiction' => 'Science-fiction',
                    'Divers' => 'Divers',
                    'Polar/Thriller' => 'Polar/Thriller',
                    'Historique' => 'Historique',
                    'Biographie' => 'Biographie',
                    'Aventure' => 'Aventure',
                    'Jeunesse' => 'Jeunesse',
                    'Comics' => 'Comics',
                    'Humour' => 'Humour',
                    'Manga' => 'Manga',
                    'Indépendant' => 'Indépendant',
                    'Érotique' => 'Érotique'
                )
            ))
            ->add('dispo', 'choice', array(
                'empty_value' => 'Toutes les disponibilités',
                'mapped' => false,
                "label" => "Disponibilité",
                "required" => false,
                'choices' => array(
                    'Disponible' => 'Disponible',
                    'Indisponible' => 'Indisponible'
                )
            ))
            ->add('keyword', 'search', array(
                'mapped' => false,
                "label" => "Mots-clé",
                "required" => false
            ))
            ->add('Rechercher', 'submit')
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
        return 'appbundle_book_cate';
    }
}
