<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/home/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    public function signinAction(Request $request)
    {
        if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATE_REMEMBERED')){
            return $this->redirectToRoute('app_home_index');
        }

        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('@App/home/signin.html.twig', array(
          'last_username' => $authenticationUtils->getLastUsername(),
          'error' => $authenticationUtils->getLastAuthenticationError()
        ));
    }
}
