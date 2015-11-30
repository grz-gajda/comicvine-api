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

        if ($input < $min) {
            return false;
        }

        if ($input > $max && is_int($max) === true) {
            return false;
        }

        return true;
    }

    /**
     * Check if key or value is not of any described types.
     *
     * @param string       $key         Value of key
     * @param string|array $keyParams   Not-Types of key
     * @param string       $value       Value of value
     * @param string|array $valueParams Not-Types of value
     *
     * @return bool
     */
    public function isKeyAndValueAre($key, $keyParams, $value, $valueParams)
    {
        if ($this->isParamOfType($key, $keyParams) === false) {
            return false;
        }

        if ($this->isParamOfType($value, $valueParams) === false) {
            return false;
        }

        return true;
    }

    /**
     * Check if values is any of these types.
     *
     * @param string       $param Value
     * @param string|array $types Type or array of types
     *
     * @return bool
     */
    public function isParamOfType($param, $types)
    {
        if (is_array($types) === true) {
            return $this->isParamOfTypeMultiple($param, $types);
        }

        return $this->isParamOfTypeSingle($param, $types);
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
        array_walk($types, function(&$type) use ($param) {
            $type = $this->isParamOfTypeSingle($param, $type);
        });

        if (in_array(true, $types) === true) {
            return true;
        }

        return false;
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