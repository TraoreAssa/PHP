<?php
// Avec POO.php

    class Visiteur{
        private $prenom; // ne peux pas etre utiliser en dehors de la class
        public $nom;

        public function set_prenom($nouveau_prenom){ 
        //public = methode  set mettre créer
            $this ->prenom = $nouveau_prenom;
            //
        }

        public function set_nom($nouveau_nom){ 
            $this ->nom = $nouveau_nom;
               
        }
        
        public function get_prenom(){
                        //get lire une donnée
            return $this -> prenom;
        }

    }

?>