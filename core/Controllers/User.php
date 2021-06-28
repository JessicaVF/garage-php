<?php
namespace Controllers;

class User extends Controller{
    protected $modelName = \Model\User::class;

    public function index(){

        $users =$this->model->findAll($this->modelName);

        $titreDeLaPage = "users";

        \Rendering::render("users/users", compact('users', 'titreDeLaPage'));
    }
}