<?php

namespace Tenolo\Utilities\Registry;

use Doctrine\Common\Collections\ArrayCollection;
use Tenolo\Utilities\Registry\Exception\ExistingServiceException;
use Tenolo\Utilities\Registry\Exception\InvalidInterfaceException;
use Tenolo\Utilities\Registry\Exception\NonExistingServiceException;
use Tenolo\Utilities\Registry\Exception\NoObjectException;

/**
 * Class ServiceRegistry
 *
 * @package Tenolo\Utilities\Registry
 * @author  Nikita Loges, tenolo GbR
 */
class ServiceRegistry implements ServiceRegistryInterface
{

    /** @var ArrayCollection */
    protected $services;

    /** @var string */
    protected $interface;

    /**
     * @param string $interface
     */
    public function __construct($interface)
    {
        $this->interface = $interface;
        $this->services = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    protected function getServices()
    {
        return $this->services;
    }

    /**
     * @inheritdoc
     */
    public function all()
    {
        return $this->getServices()->toArray();
    }

    /**
     * @inheritdoc
     */
    public function register($name, $service)
    {
        if ($this->has($name)) {
            throw new ExistingServiceException($name);
        }

        if (!is_object($service)) {
            throw new NoObjectException(gettype($service));
        }

        if (!in_array($this->interface, class_implements($service))) {
            throw new InvalidInterfaceException($this->interface);
        }

        $this->getServices()->set($name, $service);
    }

    /**
     * @inheritdoc
     */
    public function unregister($name)
    {
        if (!$this->has($name)) {
            throw new NonExistingServiceException($name);
        }

        $this->getServices()->remove($name);
    }

    /**
     * @inheritdoc
     */
    public function has($name)
    {
        return $this->getServices()->containsKey($name);
    }

    /**
     * @inheritdoc
     */
    public function get($name)
    {
        if (!$this->has($name)) {
            throw new NonExistingServiceException($name);
        }

        return $this->getServices()->get($name);
    }
}
