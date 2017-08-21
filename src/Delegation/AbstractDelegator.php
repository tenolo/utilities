<?php

namespace Tenolo\Utilities\Delegation;

use Doctrine\Common\Collections\ArrayCollection;
use Tenolo\Utilities\Delegation\Depository\DefaultDepository;
use Tenolo\Utilities\Delegation\Depository\DepositoryInterface;

/**
 * Class AbstractDelegator
 *
 * @package Tenolo\Utilities\Delegation
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class AbstractDelegator implements AbstractDelegatorInterface
{

    /** @var DepositoryInterface */
    protected $depository;

    /**
     * @param null                     $default
     * @param DepositoryInterface|null $depository
     */
    public function __construct($default = null, DepositoryInterface $depository = null)
    {
        if ($depository == null) {
            $depository = new DefaultDepository();
        }

        if (!is_null($default)) {
            $depository->setDefault($default);
        }

        $this->depository = $depository;
    }

    /**
     * @return mixed
     */
    public function getDefaultDelegate()
    {
        return $this->getDepository()->getDefault();
    }

    /**
     * @return ArrayCollection
     */
    public function getDelegates()
    {
        return $this->getDepository()->getCollection();
    }

    /**
     * @inheritdoc
     */
    public function hasDelegate($name)
    {
        return $this->getDepository()->has($name);
    }

    /**
     * @inheritdoc
     */
    public function addDelegate($name, $delegate)
    {
        if (!$this->hasDelegate($name)) {
            $this->getDepository()->set($name, $delegate);
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
        if (!$this->hasDelegate($name)) {
            return $this->getDefaultDelegate();
        }

        return $this->getDepository()->get($name);
    }

    /**
     * @return DepositoryInterface
     */
    protected function getDepository()
    {
        return $this->depository;
    }

}