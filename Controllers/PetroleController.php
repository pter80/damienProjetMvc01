<?php
namespace Controllers;


//require 'bootstrap.php';
use Entity\Petrole;
use Tools\Gauss;

class PetroleController extends Controller

{
  
  public function liste($params)
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
      $petrole->setProdConv(0.0);
      $em->persist($petrole);
      $em->flush();
      
    }
    
    $qb="select p from Entity\Petrole p";
    $query = $em->createQuery($qb);
    $petroles=$query->getResult();
     
    
     
    echo $this->twig->render('petrole.twig', ['name' => 'Philippe','petroles'=>$petroles,'datas'=>$datas]);

  }
}