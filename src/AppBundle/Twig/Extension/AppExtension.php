<?php

namespace AppBundle\Twig\Extension;

use Symfony\Bridge\Doctrine\RegistryInterface;

class AppExtension extends \Twig_Extension
{
    protected $doctrine;

    public function __construct(RegistryInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'app';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('numberTranslate', array($this, 'numberTranslateFilter')),
        );
    }

    public function getFunctions()
    {
        return array(
          new \Twig_SimpleFunction('getMenu', array($this, 'getMenuFunction')),
        );
    }

    /**
     * Retourne les éléments du menu de la table param_menu.
     *
     * @return \AppBundle\Entity\ParamMenu[]|array
     */
    public function getMenuFunction()
    {
        return $this->doctrine->getRepository('AppBundle:ParamMenu')->findAll();
    }

    /**
     * Convertion d'un chiffre int en lettre.</br>
     * 1 => 'one'</br>
     * Retourne null si $number > 16 ou < 1.
     *
     * @param $number
     * @return mixed|null
     */
    public function numberTranslateFilter($number)
    {
        $tabStringNumber = array(
            'one', 'two', 'three', 'four', 'five',
            'six', 'seven', 'eight', 'nine', 'ten',
            'eleven', 'twelve', 'thirteen', 'fourteen',
            'fifteen', 'sixteen'
        );
        if(isset($tabStringNumber[$number-1])) {
            return $tabStringNumber[$number-1];
        }
        return null;
    }
}
