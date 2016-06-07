<?php

namespace Tenolo\Utilities\Delegation;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface AbstractDelegatorInterface
 *
 * @package Tenolo\Utilities\Delegation
 * @author  Nikita Loges
 * @company tenolo GbR
 */
interface AbstractDelegatorInterface
{

    /**
     * @return DelegateInterface
     */
    public function getDefault();

    /**
     * @return ArrayCollection|DelegateInterface[]
     */
    public function getDelegates();

    /**
     * @param                   $name
     * @param DelegateInterface $builder
     */
    public function add($name, DelegateInterface $builder);
}