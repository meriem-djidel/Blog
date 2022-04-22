<?php
class Categorie {
    public $id;
    public $nom;
    
    public function getID ():?int
    {
        return $this->id;
    } 
    public function getNom ():?string
    {
        return $this->nom;
    } 
    
}

?>