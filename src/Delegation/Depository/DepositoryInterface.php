<?php

namespace Tenolo\Utilities\Delegation\Depository;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface DepositoryInterface
 *
 * @package Tenolo\Utilities\Delegation\Depository
 * @author  Nikita Loges
 * @company tenolo GbR
 */
interface DepositoryInterface
{

    /**
     * @return mixed
     */
    public function getDefault();

    /**
     * @param $default
     */
    public function setDefault($default);

    /**
     * @return bool
     */
    public function hasDefault();

    /**
     * @return ArrayCollection|\mixed[]
     */
    public function getCollection();

    /**
     * @param $name
     *
     * @return mixed|null
     */
    public function get($name);

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value);

    /**
     * @param $name
     *
     * @return bool
     */
    public function has($name);
}
