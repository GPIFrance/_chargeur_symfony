<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ParamMenu;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class AdminController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function setDefaultDataAction()
    {
        $em = $this->getDoctrine()->getManager();
        $encoder = $this->get('security.password_encoder');
        $kernel = $this->get('kernel');

        //
        // Création de l'utilisateur admin par défaut
        //
        $userAdmin = $em->getRepository('AppBundle:User')->findOneBy(array(
            'username' => 'admin'
        ));
        if (!$userAdmin) {
            $userAdmin = new User();
            $userAdmin->setRoles(array('ROLE_ADMIN'));
            $userAdmin->setUsername('admin');
            $userAdmin->setPassword($encoder->encodePassword($userAdmin, 'gpi21400'));

            $em->persist($userAdmin);
            $em->flush();
            $this->addFlash('notice', "Utilisateur admin ajouté à la base de données.");
        } else {
            $this->addFlash('notice', "Utilisateur admin déjà présent dans la base de données.");
        }

        //
        // Création du menu par défaut
        //
        $paramMenu = $em->getRepository('AppBundle:ParamMenu')->findAll();
        if (!$paramMenu) {
            try {
                $menu = Yaml::parse(file_get_contents($kernel->getRootDir() . '/../src/AppBundle/DefaultsValues/menu_item.yml'));
                $i = 0;
                foreach ($menu['menu'] as $item) {
                    $menuItem = $em->getRepository('AppBundle:ParamMenu')->findBy(array('pmLibel' => $item['libel']));
                    if (!$menuItem) {
                        $menuItem = new ParamMenu();
                        $menuItem->setPmLibel($item['libel']);
                        if(isset($item['href'])) $menuItem->setPmHref($item['href']);
                        if(isset($item['msg_content'])) $menuItem->setPmMsgContent($item['msg_content']);
                        $menuItem->setPmMsgPosition(ParamMenu::RIGHT_CENTER);
                        $menuItem->setPmOrder(++$i);
                        $em->persist($menuItem);
                        $em->flush();
                        $this->addFlash('success', "Ajout de l'item {$menuItem->getPmLibel()} dans la table ParamMenu.");
                    }
                }
            } catch (ParseException $exception) {
                $this->addFlash('error', "Une erreur est survenue lors de l'ajout des données par défaut du fichier menu_item.yml", $exception->getMessage());
            }
        }

        if($this->getUser()) {
            return $this->redirectToRoute('app_ui_index');
        }
        return $this->redirectToRoute('app_home_signin');
    }
}
