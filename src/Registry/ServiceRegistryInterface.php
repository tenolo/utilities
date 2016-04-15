<?php

namespace Tenolo\Utilities\Registry;

/**
 * Class ServiceRegistryInterface
 * @package Tenolo\Utilities\Registry
 * @author Nikita Loges, tenolo GbR
 */
interface ServiceRegistryInterface
{

    /**
     * @return array
     */
    public function all();

    /**
     * @param string $name
     * @param object $service
     */
    public function register($name, $service);

    /**
     * @param string $name
     */
    public function unregister($name);

    /**
     * @return boolean
     */
    public function has($name);

    /**
     * @param string $name
     *
     * @return object
     */
    public function get($name);
}