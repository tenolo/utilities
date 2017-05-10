<?php

namespace Tenolo\Utilities\Creation\Builder;

/**
 * Class AbstractDirector
 *
 * @package Tenolo\Utilities\Creation\Builder
 * @author  Nikita Loges
 * @company tenolo GbR
 */
abstract class AbstractDirector
{

    /** @var AbstractBuilder */
    protected $builder;

    /**
     * @param AbstractBuilder $builder
     */
    public function __construct(AbstractBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @return object
     */
    public function getObject()
    {
        return $this->getBuilder()->getObject();
    }

    /**
     * @param null|mixed $data
     */
    abstract public function build($data = null);

    /**
     * @return AbstractBuilder
     */
    protected function getBuilder()
    {
        return $this->builder;
    }
}
