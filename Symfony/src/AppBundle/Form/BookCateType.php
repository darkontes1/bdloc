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
            ->add('Categorie', 'choice', array(
                'choices' => array(
                    'Toutes les catégories' => 'Toutes les catégories',
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
            ->add('Disponibilité', 'choice', array(
                'choices' => array(
                    'Toutes les disponibilités' => 'Toutes les disponibilités',
                    'Disponible' => 'Disponible',
                    'Indisponible' => 'Indisponible'
                )
            ))
            ->add('Mots-clé', 'search', array(
                "label" => "Mots-clé"
            ))
            ->add('submit', 'Rechercher')
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
