<?php
namespace Controllers;

class User extends Controller{

    protected $modelName = \Model\User::class;

    public function index(){

        $users =$this->model->findAll($this->modelName);

        $titreDeLaPage = "users";

        $userModel = new \Model\ User();
        $user = $userModel->getUser();

        \Rendering::render("users/users", compact('users', 'titreDeLaPage', 'user'));
    }

    public function show(){

        $user_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $user_id = $_GET['id'];
        }
        if(!$user_id){
            die("il faut entrer un id...");
        }

        $user= $this->model->find($user_id, $this->modelName);

        $titreDeLaPage = $user ->username;

        \Rendering::render("users/user", compact('user', 'titreDeLaPage'));
    }

    public function signIn(){

        
        if(empty($_POST['logRequest'])){

            $titreDeLaPage ="login";

            $userModel = new \Model\ User();
            $user = $userModel->getUser();

            \Rendering::render("users/login", compact('titreDeLaPage', 'user'));

        } else{

            if(!empty($_POST['username']) && !empty($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
            }
            else{
                
                die("no username or password have been introduce");
            }
            
            $user = $this->model->login($username, $password);
            
            if($user){
                \Http::redirect("index.php?controller=gateau&task=index");
            }
            else{
                die("The username or the password are no corret");
            }
        }
    }
    
    public function signOut(){
        $user = $this->model->logout();
        \Http::redirect("index.php?controller=gateau&task=index");
    }

    public function signUp(){

        if(!empty($_POST['usernameCreation']) && !empty($_POST['emailCreation']) && !empty($_POST['passwordCreation']) && !empty($_POST['passwordConfirmation']) && $_POST['passwordCreation']==$_POST['passwordConfirmation']){
            
            $user = $this->model;
            $user->username= $_POST['usernameCreation'];
            $user->email = $_POST['emailCreation'];
            $user->setPassword(htmlspecialchars($_POST['passwordCreation']));
            $user->createAccount($user);
            \Http::redirect("index.php?controller=gateau&task=index");
        }
        else{
            die("Did you fill in all the boxes? The two passwords have to match!");
        }
        
    }
}