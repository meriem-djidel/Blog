<?php

class Post {
    public $id;
    public $titre;
    public $article;
    public $id_utilisateur;
    public $id_categorie;
    
    public function getID ():?int
    {
        return $this->id;
    } 
    public function gettitre ():?string 
    {
        return $this->titre;
    }
    public function getarticle ():?string 
    {
        return $this->article;
    }
    public function getID_categorie():?int 
    {
        return $this->id_categorie;
    }
}

?>