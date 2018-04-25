<?php

namespace Tenolo\Utilities\Delegation;

use Tenolo\Utilities\Delegation\Model\MetaDataInterface;

/**
 * Class AbstractObjectDelegator
 *
 * @package Tenolo\Utilities\Delegation
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class AbstractObjectDelegator extends AbstractDelegator
{

    /**
     * @param $object
     *
     * @return mixed
     */
    protected function getDelegateByObject($object)
    {
        $ref = new \ReflectionClass($object);

        // try to get direct class delegate
        $className = $ref->getName();
        if ($this->hasDelegate($className)) {
            return $this->getDelegate($className);
        }

        // try to get parent delegate
        $parentRef = $ref->getParentClass();
        if ($parentRef) {
            while ($parent = $parentRef->getParentClass()) {
                $parentRef = $parent;
                $className = $parent->getName();

                if ($this->hasDelegate($className)) {
                    return $this->getDelegate($className);
                }
            }
        }

        $metas = [];

        // try to get delegate bei interface
        foreach ($ref->getInterfaces() as $interface) {
            $className = $interface->getName();

            if ($this->hasDelegate($className)) {
                $metas = array_merge($metas, $this->getDelegateAll($className));
            }
        }

        if (count($metas)) {
            $metas = $this->sortMetas($metas);

            return $this->getDelegateByMeta($metas[0]);
        }

        return $this->getDefaultDelegate();
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
