<?php

namespace Entity;

class Membre{

    private $id_membre;
    private $pseudo;
    private $mdp;
    private $nom;
    private $prenom;
    private $email;
    private $civilite;
    private $ville;
    private $code_postal;
    private $adresse;
    private $statut;


/*
    *
    *GETTERS
    *
    */
    public function getId_membre(){
        return $this -> id_membre;
    }

    public function getPseudo(){
        return $this -> pseudo;
    }

    public function getMdp(){
        return $this -> mdp;
    }

    public function getPrenom(){
        return $this -> prenom;
    }

    public function getNom(){
        return $this -> nom;
    }

    public function getEmail(){
        return $this -> email;
    }

     public function getCivilte(){
        return $this -> civilte;
    }

     public function getVille(){
        return $this -> ville;
    }

     public function getCode_postal(){
        return $this -> code_postal;
    }

     public function getAdresse(){
        return $this -> adresse;
    }

     public function getStatut(){
        return $this -> statut;
    }
    

    /*
    *
    *SETTERS
    *
    */
    public function setId_membre($id_membre){
       $this -> id_membre = $id_membre;
    }

    public function setPseudo($pseudo){
       $this -> pseudo = $pseudo;
    }

    public function setMdp($mdp){
       $this -> mdp =$mdp;
    }

    public function setPrenom($prenom){
       $this -> prenom = $prenom;
    }

    public function setNom($nom){
       $this -> nom = $nom;
    }

    public function setEmail($email){
       $this -> email = $email;
    }

     public function setCivilte($civilite){
       $this -> civilte = $civilite;
    }

     public function setVille($ville){
       $this -> ville = $ville;
    }

     public function setCode_postal($code_postal){
       $this -> code_postal = $code_postal;
    }

     public function setAdresse($adresse){
       $this -> adresse = $adresse;
    }

     public function setStatut($statut){
       $this -> statut = $statut;
    }

}