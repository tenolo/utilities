<?php

namespace Tenolo\Utilities\Delegation;

use Tenolo\Utilities\Delegation\Depository\DefaultDepository;
use Tenolo\Utilities\Delegation\Depository\DepositoryInterface;
use Tenolo\Utilities\Delegation\Model\MetaData;
use Tenolo\Utilities\Delegation\Model\MetaDataInterface;

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
        if ($depository === null) {
            $depository = new DefaultDepository();
        }

        if ($default !== null) {
            $depository->setDefault($default);
        }

        $this->depository = $depository;
    }

    /**
     * @inheritdoc
     */
    public function getDefaultDelegate()
    {
        return $this->getDepository()->getDefault();
    }

    /**
     * @inheritdoc
     */
    public function getDelegates()
    {
        $collection = $this->getDepository()->getCollection();
        $all = [];

        foreach ($collection as $main) {
            foreach ($main as $delegate) {
                $all[] = $this->depository->getByMeta($delegate);
            }
        }

        return $all;
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
    public function addDelegate($name, $delegate, $priority = 0)
    {
        if (!$this->hasDelegate($name) && $name !== $this->depository->getDefault()) {
            $meta = new MetaData($delegate, $priority);

            $this->getDepository()->set($name, $meta);
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
     * @param string $name
     *
     * @return mixed
     */
    protected function getDelegateByMeta(MetaDataInterface $meta)
    {
        return $this->getDepository()->getByMeta($meta);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    protected function getDelegateAll($name)
    {
        // fallback
        if (!$this->hasDelegate($name)) {
            return [];
        }

        return $this->getDepository()->getAll($name);
    }

    /**
     * @return DepositoryInterface
     */
    protected function getDepository()
    {
        return $this->depository;
    }

}