<?php

namespace Controllers;
use \Twig\src\Loader;
use \Twig_Environment;

class Controller
{
    public $twig;


    function __construct()

    {
      $className = substr(get_class($this), 12, -10);
      // Twig Configuration
     if ($className) {
        $path=strtolower($className);
      }
      else {
        $path="";
      }
      //$loader = new Twig_Loader_Filesystem('./views/' . strtolower($className));
      $loader= new \Twig\Loader\FilesystemLoader('./views');
      
      $this->twig = new \Twig\Environment($loader, array(
          'cache' => false,
          'debug' => true,
      ));
      $this->twig->addExtension(new \Twig\Extension\DebugExtension());

    }

}