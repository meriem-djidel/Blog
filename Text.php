<?php

//
class Text {
    public static function excerpt(string $article ,int $limit = 30)
    {
        // verifie si la taille de la chaîne de caractere n'est pas inferieur a la limit, on recupere la taille de la chaîne avec strlen
        if(mb_strlen($article) <= $limit){
            return $article;
        }
        //function mb-strpos qui donne la position d'une châine de caractere dans chaîne de caratere originale
        $lastSpace = mb_strpos($article, ' ', $limit);
        //sinon chaîne de carractére trop grande on coupe la chaîne avec un substr
        return mb_substr($article, 0, $lastSpace) . '...';
    }

    public static function exxerpt(string $titre ,int $limit = 10 )
    {
        // verifie si la taille de la chaîne de caractere n'est pas inferieur a la limit, on recupere la taille de la chaîne avec strlen
        if(mb_strlen($titre) <= $limit){
            return $titre;
        }
        //function mb-strpos qui donne la position d'une châine de caractere dans chaîne de caratere originale
        $lastSpace = mb_strpos($titre, ' ', $limit);
        //sinon chaîne de carractére trop grande on coupe la chaîne avec un substr
        return mb_substr($titre, 0, $lastSpace) . '...';
    }
}





?>