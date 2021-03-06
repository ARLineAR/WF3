<?php

namespace Service;

use Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

class UserManager {
    
    /**
     *
     * @var session
     */
    private $session;
    public function __construct(Session $session){
        $this->session =$session;
    }

    /**
     * Encode le mdp ave l'algo BCrypt
     * 
     * @param string $password
     * @return string
     */
    
    public function encodePassword($password){
        
        return password_hash($password, PASSWORD_BCRYPT);
    }
    
    /**
     * Vérifie la correspondance entre un mdp en clair et un mdp encodé
     * 
     * @param string $plainPassword
     * @param string $encodedPassword
     * @return bool
     */
    public function verifyPassword($plainPassword, $encodedPassword){
        return password_verify($plainPassword, $encodedPassword);
    }
    
    public function login(User $user){
        
        $this->session->set('user', $user);
        
    }
    
    public function logout(){
        
        $this->session->remove('user');
        
    }
    
     public function isUserConnected(){
        
        return $this->session->has('user');       
    }
    
    /**
     * 
     * @return User/null
     */
    public function getUser(){
        
        if($this->isUserConnected()){
            return $this->session->get('user');
        }
    }
    
    /**
     * 
     * @return string
     */
     public function getUsername(){
        
        if($this->isUserConnected()){
            return $this->session->get('user')->getFullname();
        }
        
        return '';
    }
    
    
    public function isAdmin(){
        
        return $this->isUserConnected()&& $this->session->get('user')->isAdmin();
            
    }
}
