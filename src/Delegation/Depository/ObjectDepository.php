<?php

namespace Tenolo\Utilities\Delegation\Depository;

use Tenolo\Utilities\Exception\InvalidArgumentTypeException;

/**
 * Class ObjectDepository
 *
 * @package Tenolo\Utilities\Delegation\Depository
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class ObjectDepository extends AbstractDepository
{

    /** @var string $interfaceName */
    protected $interfaceName;

    /**
     * @param string $interfaceName
     */
    public function __construct($interfaceName)
    {
        parent::__construct();

        $this->interfaceName = $interfaceName;
    }

    /**
     * @inheritDoc
     */
    public function setDefault($default)
    {
        $reflection = new \ReflectionClass($default);
        if (!$reflection->implementsInterface($this->interfaceName)) {
            throw new InvalidArgumentTypeException($default, $this->interfaceName);
        }

        parent::setDefault($default);
    }

    /**
     * @inheritDoc
     */
    public function set($name, $value)
    {
        $reflection = new \ReflectionClass($value);
        if (!$reflection->implementsInterface($this->interfaceName)) {
            throw new InvalidArgumentTypeException($value, $this->interfaceName);
        }

        return parent::set($name, $value);
    }

}
