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
    public function __construct(DelegateInterface $default = null)
    {
        $this->defaultDelegate = $default;
        $this->delegates = new ArrayCollection();
    }

    /**
     * @return DelegateInterface
     */
    public function getDefault()
    {
        return $this->defaultDelegate;
    }

    /**
     * @return ArrayCollection|DelegateInterface[]
     */
    public function getDelegates()
    {
        return $this->delegates;
    }

    /**
     * @inheritdoc
     */
    public function add($name, DelegateInterface $builder)
    {
        if (!$this->getDelegates()->containsKey($name)) {
            $this->getDelegates()->set($name, $builder);
        }
    }

    /**
     * @param string $name
     *
     * @return DelegateInterface
     */
    protected function get($name)
    {
        // fallback
        if (!$this->getDelegates()->containsKey($name)) {
            return $this->getDefault();
        }

        return $this->getDelegates()->get($name);
    }

}