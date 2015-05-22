<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

//?appbundle_book_cate%5Bcategory%5D=Science-fiction&appbundle_book_cate%5Bdispo%5D=&appbundle_book_cate%5Badd%5D=&appbundle_book_cate%5Bnbbd%5D=&appbundle_book_cate%5Bkeyword%5D=&appbundle_book_cate%5BRechercher%5D=&appbundle_book_cate%5B_token%5D=E2YMGBtUYpBOqrnKzE1IbrgOj4is6LRKHbTkz1TgF34
class BookCateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
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
            ->add('sort', 'choice', array(
                'empty_value' => 'Pas de tri',
                'mapped' => false,
                "label" => "Trier par",
                "required" => false,
                'choices' => array(
                    'Alpha ASC' => 'Ordre alphabetique croissant',
                    'Alpha DESC' => 'Ordre alphabetique croissant'
                )
            ))
            ->add('nbbd', 'choice', array(
                'empty_value' => 'par défaut : 10',
                'mapped' => false,
                "label" => "Nombre par page",
                "required" => false,
                'choices' => array(
                    'cinq' => '5 par page',
                    'vingt' => '20 par page'
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
        return '';
    }
}
