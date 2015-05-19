<?php
echo getSimpleStyle("Sf/fantastique/anticipation");
function getSimpleStyle($style)
{
    $default = "Divers";
    $mappings = array(
        "Science-fiction" => array(
            "Science-fiction",
            "Heroic Fantasy",
            "Sf/fantastique/anticipation",
            "Science fiction",
            "Anticipation",
            "Fantastique"
        ),
        "Aventure" => array(
            "Aventure",
            "Aventures",
            "Aventure fantastique"
        ),
        "Polar/Thriller" => array(
            "Polar/Thriller",
            "Polar",
            "Polar/Thriler",
            "Policier",
            "Thriller"
        ),
        "Historique" => array(
            "Historique",
            "Histoire",
            "Histoire - Fiction",
            "Aventure historique",
            "Histoire/fiction historique"
        ),
        "Jeunesse" => array(
            "Jeunesse"
        ),
        "Humour" => array(
            "Humoristique",
            "Western humoristique",
            "Humour"
        ),
        "Manga" => array(
            "Manga",
            "Manga - Seinen"
        ),
        "Biographie" => array(
            "Biographie",
            "Autobiographie",
            "Tranche de vie"
        ),
        "Indépendant" => array(
            "Independant"
        ),
        "Érotique" => array(
            "Erotique"
        ),
        "Comics" => array(
            "Super héros",
            "Comics"
        ),
        "Divers" => array(
            "Roman graphique",
            "Animalier",
            "Adaptation",
            "Divers",
            "Chronique urbaine",
            "Chronique",
            "Société/quotidien",
            "Drame",
            "NULL", 
            NULL, 
            false
        ),
    );
    //looks for bad name, and returns good one
    foreach($mappings as $goodName => $badNames){
        if (in_array($style, $badNames)){
            return $goodName;
        }
    }
    return $default;
}