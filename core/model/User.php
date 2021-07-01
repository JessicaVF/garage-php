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

        if(!$user || $user->password !== $password ){
                        

            return false;
        
        }
        
        $_SESSION["user"] = array('id'=> $user->id, 'username' => $username, 'email'=>$user->email);
        
        return true;

    }
    public function logout(){
        session_unset();
    }
    public function isLoggedIn(){

        if(isset($_SESSION['user']) & !empty($_SESSION['user'])){
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
    public function createAccount(User $user){
        
        $queryAdd = $this->pdo->prepare("INSERT INTO $this->table (username, password, email) VALUES (:username, :password, :email)");
        $queryAdd->execute(['username' =>$user->username, 'password' =>$user->password, 'email' =>$user->email]); 
        
    }
    public function setPassword($passwordValue){
        
        $this->password= $passwordValue;

    }

    public function isAuthor(Object $gateauOuRecette)
    
    {
            /// on veut comparer $this-id au user_id de cette recette ou ce gateau

            if($this->id == $gateauOuRecette->user_id ){
                return true;
            }else{

                return false;
            }

    }
    public function hasMade(object $gateau){
        
        $make = new \Model\Make();
        
       

        if($make->findByUserAndItem($gateau, $this))
        {   
            return true;

        }else{
            
            return false;
        }
    }

}