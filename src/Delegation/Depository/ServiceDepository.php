<?php

namespace Tenolo\Utilities\Delegation\Depository;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Tenolo\Utilities\Delegation\Model\MetaDataInterface;

/**
 * Class ServiceDepository
 *
 * @package Tenolo\Utilities\Delegation\Depository
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class ServiceDepository extends AbstractDepository
{

    /** @var ContainerInterface */
    protected $container;

    /**
     * @param $container
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct();

        $this->container = $container;
    }

    /**
     * @inheritDoc
     */
    public function setDefault($default)
    {
        if (!$this->getContainer()->has($default)) {
            throw new ServiceNotFoundException($default);
        }

        parent::setDefault($default);
    }

    /**
     * @inheritDoc
     */
    public function set($name, MetaDataInterface $meta)
    {
        $value = $meta->getValue();

        if (!$this->getContainer()->has($value)) {
            throw new ServiceNotFoundException($value);
        }

        return parent::set($name, $meta);
    }

    /**
     * @inheritDoc
     */
    public function getDefault()
    {
        $default = parent::getDefault();

        return $this->getContainer()->get($default);
    }

    /**
     * @inheritDoc
     */
    public function get($name)
    {
        $get = parent::get($name);

        return $this->getContainer()->get($get);
    }

    /**
     * @inheritdoc
     */
    public function getByMeta(MetaDataInterface $meta)
    {
        return $this->getContainer()->get($meta->getValue());
    }

    /**
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        return $this->container;
    }

}
