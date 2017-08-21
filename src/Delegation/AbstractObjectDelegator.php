<?php

namespace Tenolo\Utilities\Delegation;

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
     * @param object $object
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
        while ($parent = $parentRef->getParentClass()) {
            $parentRef = $parent;
            $className = $parent->getName();

            if ($this->hasDelegate($className)) {
                return $this->getDelegate($className);
            }
        }

        // try to get delegate bei interface
        foreach ($ref->getInterfaces() as $interface) {
            $className = $interface->getName();

            if ($this->hasDelegate($className)) {
                return $this->getDelegate($className);
            }
        }

        return $this->getDefaultDelegate();
    }
}
