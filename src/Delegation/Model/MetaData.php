<?php

namespace Tenolo\Utilities\Delegation\Model;

/**
 * Class MetaData
 *
 * @package Tenolo\Utilities\Delegation\Model
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class MetaData implements MetaDataInterface
{

    /** @var mixed */
    protected $value;

    /** @var int */
    protected $priority;

    /**
     * @param mixed $value
     * @param int   $priority
     */
    public function __construct($value, $priority)
    {
        $this->value = $value;
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }
}
