<?php
namespace Controllers;


//require 'bootstrap.php';


class HomeController extends Controller

{
  
  public function accueil()
  {
  echo $this->twig->render('home.twig', ['name' => 'Damien']);
  }
}