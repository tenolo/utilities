<?php

namespace Tenolo\Utilities\Delegation\Depository;

use Tenolo\Utilities\Delegation\Model\MetaDataInterface;

/**
 * Interface DepositoryInterface
 *
 * @package Tenolo\Utilities\Delegation\Depository
 * @author  Nikita Loges
 * @company tenolo GmbH & Co. KG
 */
interface DepositoryInterface
{

    /**
     * @return mixed
     */
    public function getDefault();

    /**
     * @param $default
     */
    public function setDefault($default);

    /**
     * @return bool
     */
    public function hasDefault();

    /**
     * @return array
     */
    public function getCollection();

    /**
     * @param $name
     *
     * @return mixed|null
     */
    public function get($name);

    /**
     * @inheritdoc
     */
    public function getByMeta(MetaDataInterface $meta);

    /**
     * @param                   $name
     * @param MetaDataInterface $meta
     */
    public function set($name, MetaDataInterface $meta);

    /**
     * @param $name
     *
     * @return bool
     */
    public function has($name);
}
