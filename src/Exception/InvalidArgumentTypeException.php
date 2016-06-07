<?php

namespace Tenolo\Utilities\Exception;

/**
 * Class InvalidArgumentTypeException
 *
 * @package Tenolo\Utilities\Exception
 * @author  Nikita Loges
 * @company tenolo GbR
 * @date    20.04.2015
 */
class InvalidArgumentTypeException extends \RuntimeException
{

    /**
     * @param mixed      $argument
     * @param int        $neededType
     * @param int        $code
     * @param \Exception $previous
     */
    public function __construct($argument, $neededType, $code = 0, \Exception $previous = null)
    {
        $type = (gettype($argument) == 'object') ? get_class($argument) : gettype($argument);
        $message = 'argument has to be type of ' . $neededType . ', ' . $type . ' given';

        parent::__construct($message, $code, $previous);
    }
}
