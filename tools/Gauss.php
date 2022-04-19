<?php

namespace Tools;

class Gauss 
{
    function courbe($mu,$sigma,$x ) {
        
        $exposant=exp((-1/2)*((($x-$mu)/$sigma)**2));
        $y=(1/($sigma*((2*pi())**(1/2))))*$exposant;
        return $y;
    }
}