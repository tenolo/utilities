<?php

namespace Tenolo\Utilities\Delegation\Model;

/**
 * Interface MetaDataInterface
 *
 * @package Tenolo\Utilities\Delegation\Model
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 */
interface MetaDataInterface
{

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return int
     */
    public function getPriority();
}
