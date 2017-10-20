<?php

namespace Tenolo\Utilities\Options;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class OptionsCollection
 *
 * @package Tenolo\Utilities\Options
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class OptionsCollection implements OptionsCollectionInterface
{

    /** @var ArrayCollection */
    protected $collection;

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->collection = new ArrayCollection($options);
    }

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->collection->set($name, $value);
    }

    /**
     * @param $name
     *
     * @return mixed|null
     */
    public function get($name)
    {
        return $this->collection->get($name);
    }

    /**
     * @param $name
     */
    public function remove($name)
    {
        $this->collection->remove($name);
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function has($name)
    {
        return $this->collection->containsKey($name);
    }

    /**
     * @param       $name
     * @param array $value
     */
    public function merge($name, array $value)
    {
        $this->append($name, $value);
    }

    /**
     * @param       $name
     * @param array $value
     */
    public function replace($name, array $value)
    {
        $previous = ($this->has($name)) ? $this->get($name) : [];
        $value = array_replace_recursive($previous, $value);

        $this->set($name, $value);
    }

    /**
     * @param       $name
     * @param array $value
     */
    public function append($name, array $value)
    {
        $previous = ($this->has($name)) ? $this->get($name) : [];
        $value = array_merge_recursive($previous, $value);

        $this->set($name, $value);
    }

    /**
     * @param       $name
     * @param array $value
     */
    public function prepend($name, array $value)
    {
        $previous = ($this->has($name)) ? $this->get($name) : [];
        $value = array_merge_recursive($value, $previous);

        $this->set($name, $value);
    }

    /**
     * @param array $value
     */
    public function appendOptions(array $value)
    {
        $previous = $this->options();
        $value = array_merge_recursive($previous, $value);

        $this->collection = new ArrayCollection($value);
    }

    /**
     * @param array $value
     */
    public function prependOptions(array $value)
    {
        $previous = $this->options();
        $value = array_merge_recursive($value, $previous);

        $this->collection = new ArrayCollection($value);
    }

    /**
     * @return array
     */
    public function options()
    {
        return $this->collection->toArray();
    }
}
