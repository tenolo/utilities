<?php

namespace Tenolo\Utilities\Registry\Exception;

/**
 * Class NoObjectException
 * @package Tenolo\Utilities\Registry\Exception
 * @author Nikita Loges, tenolo GbR
 */
class NoObjectException extends \InvalidArgumentException
{

    /**
     * @inheritdoc
     */
    public function __construct($type)
    {
        parent::__construct(sprintf('Service needs to be an object, %s given.', $type));
    }
}
