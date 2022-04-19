<?php
namespace Controllers;


//require 'bootstrap.php';


class UsersController extends Controller

{
  
  public function liste()
  {
      
     echo "Index Controller";
     $users=[
       "user1","user2","user3","user4"
       ];
    
     
     echo $this->twig->render('users_liste.html', ['name' => 'Philippe','users'=>$users]);

  }
}