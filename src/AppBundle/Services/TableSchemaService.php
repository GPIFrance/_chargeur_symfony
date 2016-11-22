<?php

namespace AppBundle\Services;


class TableSchemaService
{
    private $nameSpace;

    /**
     * TableSchema constructor.
     * @param string $nameSpace
     */
    public function __construct($nameSpace)
    {
        $this->nameSpace = $nameSpace;
    }

    /**
     * Retourne un tableau de chaine de chaque attributs de $tableName<br>
     *
     * @param $tableName
     * @return array
     */
    public function getPropsOf($tableName)
    {
        $className = $this->nameSpace.$tableName;
        $reflect = new \ReflectionClass(new $className());
        $props = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED);
        $propsList = array();

        foreach ($props as $prop) {
            $propsList[] = $prop->getName();
        }

        return $propsList;
    }
}