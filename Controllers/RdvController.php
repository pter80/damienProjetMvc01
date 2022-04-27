<?php
namespace Controllers;


//require 'bootstrap.php';

use Entity\Contact;
use Entity\Rdv;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class RdvController extends Controller

{
  public function listeContact($params)
  {
    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer()];
    $serializer = new Serializer($normalizers, $encoders);
    $em=$params['em'];
    //$objetPdo = new \PDO('mysql:host=localhost;dbname=damien_rdv','damien','bts2020');
    //$doStat = $objetPdo->prepare('SELECT * FROM contact');
    //$executeIsOk = $pdoStat->execute();
    $qb = $em->createQueryBuilder();
    $qb->select('c')
       ->from('Entity\Contact', 'c')
       ;
    $contacts = $qb->getQuery()->getResult();
    //var_dump($contacts);
    echo $this->twig->render('rdv_listeContact.twig', ['contacts' => $serializer->serialize($contacts, 'json')]);
  }
  
  public function listeRendezVous($params)
  {
    $encoders = [new JsonEncoder()];
    $normalizers = [new ObjectNormalizer()];
    $serializer = new Serializer($normalizers, $encoders);
    $em=$params['em'];
    //$objetPdo = new \PDO('mysql:host=localhost;dbname=damien_rdv','damien','bts2020');
    //$doStat = $objetPdo->prepare('SELECT * FROM contact');
    //$executeIsOk = $pdoStat->execute();
    $qb = $em->createQueryBuilder();
    $qb->select('r')
       ->from('Entity\Rdv', 'r')
       ;
    $rendezvous = $qb->getQuery()->getResult();
    //var_dump($rendezvous);
    echo $this->twig->render('rdv_listeRendezVous.twig', ['rendezvous' => $serializer->serialize($rendezvous, 'json')]);
  }
  
  public function createRendezVous($params) {
    $em = $params["em"];
    $qb = $em->createQueryBuilder();
    $qb->select('c')
       ->from('Entity\Contact', 'c')
       ;
    $contacts = $qb->getQuery()->getResult();
    echo $this->twig->render('rdv_createRendezVous.twig', ['contacts' => $contacts]);
  }
  
  public function addRendezVous($params) {
    $em = $params["em"];
    //var_dump($params['post']['contact']);die;
    //recherche du contact dans la base de données
    $contact = $em->find('Entity\Contact', $params['post']['contact']);
      $rdv= new Rdv();
      $rdv->setContact($contact);
      $rdv->setDateDebut($params['post']['dateDebut']);
      $rdv->setDateFin($params['post']['dateFin']);
      $em->persist($rdv);
      $em->flush();
      header('Location: /damien/html/projectMvc01/?c=rdv&t=listeRendezVous');
  }
  
  public function createContact($params) {
    $em = $params["em"];
    echo $this->twig->render('rdv_createContact.twig');
  }
  
  public function addContact($params) {
    $em = $params["em"];
    //var_dump($params['post']);die;
    //Vérification de l'existence du contact par le nom/prénom
    $qb = $em->createQueryBuilder();
    $qb->select('c')
      ->from('Entity\Contact', 'c')
      ->where('c.nom = :nom')
      ->andWhere('c.prenom=:prenom')
      ->setParameter('nom', $params['post']['nom'])
      ->setParameter('prenom', $params['post']['prenom'])
    ;
    $query = $qb->getQuery();
    //var_dump($query->getSql());die;
    $result=$query->getResult();
    //var_dump($params['post']);die;
    if (!$result) {
      $contact = new Contact();
    }
    else if (!$result[0]->getNom() || !$result[0]->getPrenom()) {
      $contact = new Contact();    
      }
    else {
      $contact=$result[0];
    }  
    if (array_key_exists('externe', $params['post'])) {
      $contact->setExterne(true);
    } else {
      $contact->setExterne(false);
    }
    if (array_key_exists('interne', $params['post'])) {
      $contact->setInterne(true);
    } else {
      $contact->setInterne(false);
    }
      
    $contact->setNom($params['post']['nom']);
    $contact->setPrenom($params['post']['prenom']);
    $contact->setEmail($params['post']['email']);
    $contact->setGenre($params['post']['genre']);
    $contact->setNationalite($params['post']['nationalite']);
    //$contact->setExterne($params['post']['externe']);
    //$contact->setInterne($params['post']['interne']);
    $em->persist($contact);
    $em->flush();
  
  
    echo $this->twig->render('rdv_createContact.twig');
   
    //if(!$result) {
  //  $rdv= new Rdv();
    //$rdv->setContact=$contact->getId();
    //$rdv->setEmail($params['post']['email']);
  //  $rdv->setDateDebut($params['post']['dateDebut']);
  //  $rdv->setDateFin($params['post']['dateFin']);
    //$rdv->setInterne($params['post']['Interne']);
    //$rdv->setExterne($params['post']['Externe']);
  //  $em->persist($rdv);
  //  $em->flush();
//}
//else {
//  $rdv=$result[0];
//}
    header('Location: /damien/html/projectMvc01/?c=rdv&t=listeContact');

  }
}