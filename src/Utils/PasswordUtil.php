<?php

namespace Tenolo\Utilities\Utils;

use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PasswordUtil
 *
 * @package Tenolo\Utilities\Utils
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class PasswordUtil extends BaseUtil
{

    /**
     * @param       $length
     * @param array $params
     *
     * @return string
     */
    public static function getSimplePassword($length, array $params = [])
    {
        $resolver = new OptionsResolver();

        $resolver->setDefaults([
            'length'                                     => $length,
            ComputerPasswordGenerator::OPTION_UPPER_CASE => true,
            ComputerPasswordGenerator::OPTION_LOWER_CASE => true,
            ComputerPasswordGenerator::OPTION_NUMBERS    => true,
            ComputerPasswordGenerator::OPTION_SYMBOLS    => false,
        ]);

        $resolver->setAllowedTypes('length', ['integer']);
        $resolver->setAllowedTypes(ComputerPasswordGenerator::OPTION_UPPER_CASE, ['boolean']);
        $resolver->setAllowedTypes(ComputerPasswordGenerator::OPTION_LOWER_CASE, ['boolean']);
        $resolver->setAllowedTypes(ComputerPasswordGenerator::OPTION_NUMBERS, ['boolean']);
        $resolver->setAllowedTypes(ComputerPasswordGenerator::OPTION_SYMBOLS, ['boolean']);

        $resolver->setNormalizer('length', function (Options $options, $value) {
            if ($value < 3) {
                $value = 3;
            }

            return $value;
        });
        
        $options = $resolver->resolve($params);
        $generator = new ComputerPasswordGenerator();

        $generator->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, $options[ComputerPasswordGenerator::OPTION_UPPER_CASE]);
        $generator->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, $options[ComputerPasswordGenerator::OPTION_LOWER_CASE]);
        $generator->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, $options[ComputerPasswordGenerator::OPTION_NUMBERS]);
        $generator->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, $options[ComputerPasswordGenerator::OPTION_SYMBOLS]);
        $generator->setLength($options['length']);

        return $generator->generatePassword();
    }
}
