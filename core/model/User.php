<?php

namespace Model;

class User extends Model{

    protected $table = "users";
    public $id;
    public $username;
    private $password;
    public $email;

    /**
     * Find user base in it's username
     * @param string $username
     * @param string $className
     */
    public function findByUsername(string $username){

        $maRequete = $this->pdo->prepare("SELECT * FROM {$this->table}  WHERE username =:username");

        $maRequete->execute(['username' => $username]);

        $result = $maRequete->fetchObject(\Model\User::class);
        
        return $result;

    }
    public function login($username, $password){
        
        $user= $this->findByUsername($username);

        if(!$user & $user->password !== $password ){

            return false;
        
        }
        
        $_SESSION["user"] = array('id'=> $user->id, 'username' => $username, 'email'=>$user->email);
    
        return true;

    }
    public function logout(){
        session_unset();
    }
    public function isLoggedIn(){

        if($_SESSION["user"]){
            return true;
        }
        return false;

    }
    public function getUser(){
        
        if($this->isLoggedIn()){
            
            $user = $this->find($_SESSION["user"]['id'], \Model\User::class);
            return $user;

        }
    }

}