<?php
namespace Controllers;

use Entity\Product;

class ProductController extends Controller

{
  
  public function liste($params)
  {
     
     //$pr = new Product();
     //var_dump($pr);die;
     $em=$params["em"];
     
     
     $dql = "select p from Entity\Product p";
     $query = $em->createQuery($dql);
     $result=$query->getResult();
     var_dump($result);
     $products=$result;
     
     
     $qb=$em->createQueryBuilder();
     $qb->select('p')
        ->from('Entity\Product', 'p');
     $query = $qb->getQuery();
     //var_dump($query->getSql());
     $products = $query->getResult();    
     
     echo $this->twig->render('product_liste.twig', ['name' => 'Philippe','products'=>$products]);

  }
}