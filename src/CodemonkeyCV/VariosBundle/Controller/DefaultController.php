<?php

namespace CodemonkeyCV\VariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction
    {
		echo "Funciono";
		
		return new Response();
        //return $this->render('CodemonkeyCVVariosBundle:Default:index.html.twig');
    }
}
