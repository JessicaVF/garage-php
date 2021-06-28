<?php
namespace Model;
class User extends Model{
    protected $table = "users";
    public $id;
    public $username;
    protected $password;
    public $email;
   
}