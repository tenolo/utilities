<?php

namespace Tenolo\Utilities\Options;

/**
 * Interface OptionsCollectionInterface
 *
 * @package Tenolo\Utilities\Options
 * @author  Nikita Loges
 * @company tenolo GbR
 */
interface OptionsCollectionInterface
{

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value);

    /**
     * @param $name
     *
     * @return mixed|null
     */
    public function get($name);

    /**
     * @param $name
     */
    public function remove($name);

    /**
     * @param $name
     *
     * @return bool
     */
    public function has($name);

    /**
     * @param       $name
     * @param array $value
     */
    public function merge($name, array $value);

    /**
     * @param       $name
     * @param array $value
     */
    public function replace($name, array $value);

    /**
     * @param       $name
     * @param array $value
     */
    public function append($name, array $value);

    /**
     * @param       $name
     * @param array $value
     */
    public function prepend($name, array $value);

    /**
     * @param array $value
     */
    public function appendOptions(array $value);

    /**
     * @param array $value
     */
    public function prependOptions(array $value);

    /**
     * @return array
     */
    public function options();
}
