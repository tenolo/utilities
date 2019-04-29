<?php

namespace Tenolo\Utilities\Registry\Exception;

/**
 * Class InvalidInterfaceException
 * @package Tenolo\Utilities\Registry\Exception
 * @author Nikita Loges, tenolo GbR
 */
class InvalidInterfaceException extends \InvalidArgumentException
{

    /**
     * @inheritdoc
     */
    public function __construct($type)
    {
        parent::__construct(sprintf('Service for this registry needs to implement "%s".', $type));
    }
}
