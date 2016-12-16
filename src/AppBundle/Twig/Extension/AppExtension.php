<?php

namespace AppBundle\Twig\Extension;

use AppBundle\Services\TableSchemaService;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AppExtension extends \Twig_Extension
{
    protected $doctrine;
    protected $schemaService;

    public function __construct(RegistryInterface $doctrine, TableSchemaService $schemaService)
    {
        $this->doctrine = $doctrine;
        $this->schemaService = $schemaService;
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
          new \Twig_SimpleFunction('getPropsOfEntity', array($this, 'getPropsOfEntityFunction')),
        );
    }

    /**
     * Retourne les éléments du menu de la table param_menu.<br>
     *
     * @return \AppBundle\Entity\ParamMenu[]|array
     */
    public function getMenuFunction()
    {
        return $this->doctrine->getRepository('AppBundle:ParamMenu')->findAll();
    }

    /**
     * Retourne la liste des propriétés/attributs d'une entité.<br>
     *
     * @param $entity
     * @return array
     */
    public function getPropsOfEntityFunction($entity)
    {
        return $this->schemaService->getPropsOf($entity);
    }

    /**
     * Convertion d'un chiffre int en lettre.</br>
     * <b>1 => 'one'</b></br>
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
