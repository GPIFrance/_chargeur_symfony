<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
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

    public function ptsChgtDlryAction()
    {
        /** @var User $user */
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $addresses = null;

        if($user->getName() == 'admin') $addresses = $em->getRepository('AppBundle:Address')->findAll();
        else $addresses = $em->getRepository('AppBundle:Address')->findBy(array('user' => $user));

        return $this->render('@App/ui/point_chgt_dlry.html.twig', array(
            'addresses' => $addresses
        ));
    }

    public function orderEntryAction()
    {
        /** @var User $user */
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $addresses = null;

        // On récupère les adresses en fonction de l'utilisateur
        if($user->getUsername() == 'admin') $addresses = $em->getRepository('AppBundle:Address')->findAll();
        else $addresses = $em->getRepository('AppBundle:Address')->findBy(array('user' => $user));

        return $this->render('@App/ui/order_entry.html.twig', array(
            'addresses' => $addresses
        ));
    }
}
