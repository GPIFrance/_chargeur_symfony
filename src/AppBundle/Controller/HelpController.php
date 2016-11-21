<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelpController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Help:index.html.twig', array(
            // ...
        ));
    }

}
