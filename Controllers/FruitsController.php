<?php
namespace Controllers;

use \Entity\Fruits;

class FruitsController extends Controller

{
  public function init() {
    $_SESSION["fruits"]=["pommme","poire","abricot","raisin","peche"];
    $this->liste();
  }
  public function liste()
  {
    $fruits=$_SESSION["fruits"];
    echo $this->twig->render('fruits_liste.html', ['name' => 'Philippe','fruits'=>$fruits]);

  }
  
  public function create(){
    echo $this->twig->render('fruits_create.html', ['name' => 'Philippe']);
  }
  
  public function add(){
    $fruits = new \Entity\Fruits;
    var_dump($_POST);
    var_dump($fruits->getAll());
    die;
  }
}