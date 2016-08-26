<?php

namespace Tenolo\Utilities\Delegation;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractDelegator
 *
 * @package Tenolo\Utilities\Delegation
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class AbstractDelegator implements AbstractDelegatorInterface
{

    /** @var ArrayCollection|DelegateInterface[] */
    protected $delegates;

    /** @var DelegateInterface */
    protected $defaultDelegate;

    /**
     * @param DelegateInterface $default
     */
    public function __construct($default = null)
    {
        $this->defaultDelegate = $default;
        $this->delegates = new ArrayCollection();
    }

    /**
     * @return DelegateInterface
     */
    public function getDefaultDelegate()
    {
        return $this->defaultDelegate;
    }

    /**
     * @return ArrayCollection
     */
    public function getDelegates()
    {
        return $this->delegates;
    }

    /**
     * @inheritdoc
     */
    public function hasDelegate($name)
    {
        return $this->getDelegates()->containsKey($name);
    }

    /**
     * @inheritdoc
     */
    public function addDelegate($name, $builder)
    {
        if (!$this->getDelegates()->containsKey($name)) {
            $this->getDelegates()->set($name, $builder);
        }
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    protected function getDelegate($name)
    {
        // fallback
        if (!$this->getDelegates()->containsKey($name)) {
            return $this->getDefaultDelegate();
        }

        return $this->getDelegates()->get($name);
    }

}