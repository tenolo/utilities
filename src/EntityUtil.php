<?php

namespace Tenolo\Utils;

/**
 * Class Entity
 * @package Tenolo\Utils
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 29.07.14
 */
class EntityUtil extends BaseUtil
{

    /**
     * @param string|object $entity
     * @return string
     * @throws \RuntimeException
     */
    public static function getMarkerName($entity)
    {
        if (is_object($entity) || (is_string($entity) && class_exists($entity))) {
            $entityName = (new \ReflectionClass($entity))->getShortName();
        } else {
            throw new \RuntimeException("class " . $entity . " not found");
        }

        $markerName = $entityName . ":marker";

        return $markerName;
    }
} 