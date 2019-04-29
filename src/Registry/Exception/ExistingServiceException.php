<?php

namespace Tenolo\Utilities\Registry\Exception;

/**
 * Class ExistingServiceException
 * @package Tenolo\Utilities\Registry\Exception
 * @author Nikita Loges, tenolo GbR
 */
class ExistingServiceException extends \InvalidArgumentException
{

    /**
     * @inheritdoc
     */
    public function __construct($type)
    {
        parent::__construct(sprintf('Service of type "%s" already exist.', $type));
    }
}
