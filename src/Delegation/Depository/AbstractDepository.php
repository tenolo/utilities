<?php

namespace Tenolo\Utilities\Delegation\Depository;

use Tenolo\Utilities\Delegation\Model\MetaDataInterface;

/**
 * Class AbstractDepository
 *
 * @package Tenolo\Utilities\Delegation\Depository
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 */
abstract class AbstractDepository implements DepositoryInterface
{

    /** @var mixed */
    protected $default;

    /** @var mixed[] */
    protected $collection = [];

    /**
     */
    public function __construct()
    {
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
        return $this->default !== null;
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
    public function getByMeta(MetaDataInterface $meta)
    {
        return $meta->getValue();
    }

    /**
     * @inheritdoc
     */
    public function get($name)
    {
        $metas = $this->collection[$name];

        if (count($metas)) {
            $metas = $this->sortMetas($metas);
        }

        return $this->getByMeta($metas[0]);
    }

    /**
     * @inheritdoc
     */
    public function getAll($name)
    {
        return $this->collection[$name];
    }

    /**
     * @inheritdoc
     */
    public function set($name, MetaDataInterface $meta)
    {
        return $this->collection[$name][] = $meta;
    }

    /**
     * @inheritdoc
     */
    public function has($name)
    {
        return isset($this->collection[$name]);
    }

    /**
     * @param array $metas
     *
     * @return array
     */
    protected function sortMetas(array $metas)
    {
        usort($metas, function (MetaDataInterface $a, MetaDataInterface $b) {
            if ($a->getPriority() > $b->getPriority()) {
                return -1;
            } elseif ($a->getPriority() < $b->getPriority()) {
                return 1;
            }

            return 0;
        });

        return $metas;
    }
}
