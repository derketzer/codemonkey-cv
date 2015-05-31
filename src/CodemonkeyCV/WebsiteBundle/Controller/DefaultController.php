<?php

namespace CodemonkeyCV\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CodemonkeyCVWebsiteBundle:Default:index.html.twig');
    }
}
