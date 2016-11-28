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
     * @param $exception
     * @return array
     */
    public function getPropsOf($tableName, $exception = array())
    {
        $className = $this->nameSpace.$tableName;
        $reflect = new \ReflectionClass(new $className());
        $props = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED);
        $propsList = array();

        foreach ($props as $prop) {
            if(array_search($prop->getName(), $exception) === false) {
                $propsList[] = $prop->getName();
            }
        }

        return $propsList;
    }
}