<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UIController extends Controller
{
    public function indexAction()
    {
        return $this->render('@App/ui/index.html.twig');
    }

    public function searchAction(Request $request)
    {
        return $this->render('@App/ui/search.html.twig');
    }
}
