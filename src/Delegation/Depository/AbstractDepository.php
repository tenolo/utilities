<?php

namespace Tenolo\Utilities\Delegation\Depository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractDepository
 *
 * @package Tenolo\Utilities\Delegation\Depository
 * @author  Nikita Loges
 * @company tenolo GbR
 */
abstract class AbstractDepository implements DepositoryInterface
{

    /** @var mixed */
    protected $default;

    /** @var ArrayCollection|mixed[] */
    protected $collection;

    /**
     *
     */
    public function __construct()
    {
        $this->collection = new ArrayCollection();
    }
    /**
     * @inheritdoc
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @inheritdoc
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @inheritdoc
     */
    public function hasDefault()
    {
        return !is_null($this->default);
    }

    /**
     * @inheritdoc
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @inheritdoc
     */
    public function get($name)
    {
        return $this->getCollection()->get($name);
    }

    /**
     * @inheritdoc
     */
    public function set($name, $value)
    {
        return $this->getCollection()->set($name, $value);
    }

    /**
     * @inheritdoc
     */
    public function has($name)
    {
        return $this->getCollection()->contains($name);
    }
}
