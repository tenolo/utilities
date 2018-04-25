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
     * @return mixed
     */
    public function getDefaultDelegate();

    /**
     * @return array
     */
    public function getDelegates();

    /**
     * @param $name
     *
     * @return bool
     */
    public function hasDelegate($name);

    /**
     * @param     $name
     * @param     $delegate
     * @param int $priority
     */
    public function addDelegate($name, $delegate, $priority = 0);
}