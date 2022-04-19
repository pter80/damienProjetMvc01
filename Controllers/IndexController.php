<?php
namespace Controllers;


//require 'bootstrap.php';
use Tools\Gauss;
use Entity\Petrole;

class IndexController extends Controller

{
  
  public function index($params)
  {
    $em=$params["em"];
    $gauss=new Gauss();
    $datas=array();
    
    for ($x=-4;$x<4;$x+=0.010) {
      //2008 est supposé être le point haut de la production conventionnelle
      $data=[($x*25)+2008,$gauss->courbe(0,1,$x)*100];
      $datas[]= $data;
      $petrole=new Petrole;
      $petrole->setAnnee(($x*25)+2008);
      
    }
    
    //var_dump($datas);
    echo $this->twig->render('index.html', ['datas' => json_encode($datas)]);

  }
}