<?php

namespace Tenolo\Utilities\Utils;

/**
 * Class Classes
 * @package Tenolo\Utilities\Utils
 * @author Nikita Loges
 * @company tenolo GmbH & Co. KG
 * @date 29.07.14
 */
class ClassUtil extends BaseUtil
{

    /**
     * @param $class
     * @param $trait
     * @return bool
     */
    public static function hasTrait($class, $trait)
    {
        $traits = static::getUsesTraits($class);
        $trait = StringUtil::removeFromStart('\\', $trait);

        foreach ($traits as $t) {
            if ($t->getName() == $trait || $t->getShortName() == $trait) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $class
     * @return array|\ReflectionClass[]
     */
    public static function getUsesTraits($class)
    {
        $ref = new \ReflectionClass($class);

        // get traits used in class traits
        $traits = $ref->getTraits();
        foreach ($traits as $dt) {
            $traits = array_merge($traits, static::getUsesTraits($dt->getName()));
        }

        // get traits of class parents
        while ($ref = $ref->getParentClass()) {
            $deeptraits = $ref->getTraits();
            $traits = array_merge($traits, $deeptraits);

            foreach ($deeptraits as $dt) {
                $traits = array_merge($traits, static::getUsesTraits($dt->getName()));
            }
        }

        return $traits;
    }
}
