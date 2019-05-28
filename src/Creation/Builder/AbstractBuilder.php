<?php

namespace Tenolo\Utilities\Creation\Builder;

/**
 * Class AbstractBuilder
 *
 * @package Tenolo\Utilities\Creation\Builder
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 */
abstract class AbstractBuilder
{

    /** @var object */
    protected $object;

    /**
     */
    public function __construct()
    {
        $this->object = $this->create();
    }

    /**
     * @return object
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @return object
     */
    public function create()
    {
        $className = $this->getClassName();

        return new $className;
    }

    /**
     * @return string
     */
    abstract protected function getClassName();
}
