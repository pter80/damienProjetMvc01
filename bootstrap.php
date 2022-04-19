<?php
// bootstrap.php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
//use Entity\Product;

$paths = array("src/Entity");
$isDevMode = true;
$proxyDir=null;
$cache=null;
// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'damien',
    'password' => 'bts2020',
    'dbname'   => 'damien_rdv',
);
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Entity"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

//$driverImpl = $config->newDefaultAnnotationDriver('entity');
//$config->setMetadataDriverImpl($driverImpl);
//var_dump($config);
//$result=$config->getAllClassNames();

