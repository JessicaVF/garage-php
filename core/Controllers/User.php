<?php
namespace Controllers;

class User extends Controller{

    protected $modelName = \Model\User::class;

    public function index(){

        $users =$this->model->findAll($this->modelName);

        $titreDeLaPage = "users";

        \Rendering::render("users/users", compact('users', 'titreDeLaPage'));
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
}