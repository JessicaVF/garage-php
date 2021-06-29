<?php
namespace Controllers;

class User extends Controller{

    protected $modelName = \Model\User::class;

    public function index(){

        $users =$this->model->findAll($this->modelName);

        $titreDeLaPage = "users";

        \Rendering::render("users/users", compact('users', 'titreDeLaPage'));
    }

    public function login(){

        // if(!empty($_POST['username']) && !empty($_POST['password'])){
        //     $username = $_POST['username'];
        //     $password = $_POST['password'];
        // }
        // else{
        //     die("no username or password have been introduce");
        // }
        $username = "a";
        $password = "a";
        $user = $this->model->login($username, $password);
        
        \Http::redirect("index.php?controller=gateau&task=index");
    }
    
    public function logout(){
        $user = $this->model->logout();
        \Http::redirect("index.php?controller=gateau&task=index");
    }
}