<?php

namespace Tenolo\Utilities\Registry\Exception;

/**
 * Class NonExistingServiceException
 * @package Tenolo\Utilities\Registry\Exception
 * @author Nikita Loges, tenolo GbR
 */
class NonExistingServiceException extends \InvalidArgumentException
{

    /**
     * @inheritdoc
     */
    public function __construct($type)
    {
        parent::__construct(sprintf('Service of type "%s" does not exist.', $type));
    }
}