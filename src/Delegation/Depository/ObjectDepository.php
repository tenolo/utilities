<?php

namespace Tenolo\Utilities\Delegation\Depository;

use Tenolo\Utilities\Delegation\Model\MetaDataInterface;
use Tenolo\Utilities\Exception\InvalidArgumentTypeException;

/**
 * Class ObjectDepository
 *
 * @package Tenolo\Utilities\Delegation\Depository
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
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
        $this->validateValue($default);

        parent::setDefault($default);
    }

    /**
     * @inheritDoc
     */
    public function set($name, MetaDataInterface $meta)
    {
        $this->validateValue($meta->getValue());

        return parent::set($name, $meta);
    }

    /**
     * @param $value
     *
     * @throws \ReflectionException
     */
    protected function validateValue($value)
    {
        $reflection = new \ReflectionClass($value);

        if (!$reflection->implementsInterface($this->interfaceName)) {
            throw new InvalidArgumentTypeException($value, $this->interfaceName);
        }
    }
}
