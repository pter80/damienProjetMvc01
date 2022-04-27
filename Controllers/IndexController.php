<?php
namespace Controllers;


//require 'bootstrap.php';

class IndexController extends Controller

{
    public function index()
    {
    echo $this->twig->render('base.html');
    }
}