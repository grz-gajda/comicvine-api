<?php

namespace ComicVine\Api\Filters;

/**
 * Trait FilterCheck
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
trait FilterValidation
{
    /**
     * Check if input is integer and stay
     * in range between $min and $max.
     *
     * @param mixed      $input Input field
     * @param int        $min   Min range of input
     * @param int|string $max   Max range of input
     *
     * @return bool
     */
    public function isIntAndBetween($input, $min, $max = "")
    {
        if (is_int($input) === false) {
            return false;
        }

        if ($input < $min
            || ($input > $max && is_int($max) === true)
        ) {
            return false;
        }

        return true;
    }

    /**
     * Check if key or value is not of any described types.
     *
     * @param string       $key         Value of key
     * @param string       $keyParams   Not-Types of key
     * @param string       $value       Value of value
     * @param string|array $valueParams Not-Types of value
     *
     * @return bool
     */
    public function isKeyAndValueAre($key, $keyParams, $value, $valueParams)
    {
        if (is_array($valueParams) === true) {
            if ($this->isParamOfTypeMultiple($value, $valueParams) === false
                || $this->isParamOfTypeSingle($key, $keyParams) === false
            ) {
                return false;
            }
        }

        if (is_array($valueParams) === false) {
            if ($this->isParamOfTypeSingle($key, $keyParams) === false
                || $this->isParamOfTypeSingle($value, $valueParams) === false
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if value is any of these types.
     *
     * @param string $param Value to check
     * @param array  $types List of types
     *
     * @return bool
     */
    public function isParamOfTypeMultiple($param, $types)
    {
        array_walk($types, function (&$type) use ($param) {
            $type = $this->isParamOfTypeSingle($param, $type);
        });
        
        return in_array(true, $types);
    }

    /**
     * Check if value is not that type.
     *
     * @param string $param Value
     * @param string $type  Type
     *
     * @return bool
     */
    public function isParamOfTypeSingle($param, $type)
    {
        return call_user_func("is_$type", $param);
    }
}