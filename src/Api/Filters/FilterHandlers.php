<?php

namespace ComicVine\Api\Filters;

/**
 * Trait FilterHandlers
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
trait FilterHandlers
{
    /**
     * Validation for setted filters to stay
     * clean URL.
     *
     * @param array $filters Setted filters.
     * @param array $enabled Enabled filters.
     *
     * @return bool
     */
    protected function flushDisabledFilters(array $filters, array $enabled)
    {
        array_walk($filters, function (&$param, $field) use ($enabled) {
            if ($this->isApiKey($field) === true) {
                return $param;
            }
            if ($this->isFieldList($field) === true) {
                return $param = $this->validFieldList($field, $param);
            }
            if ($this->isFilter($field, $enabled) === true) {
                return $param = $this->validFilter($param);
            }

            return $param = [];
        });

        return $filters;
    }

    /**
     * Checking if current position of array_walk is
     * 'api_key'.
     *
     * @param string $field Key of field.
     *
     * @return bool
     */
    protected function isApiKey($field)
    {
        if ($field === "api_key") {
            return true;
        }

        return false;
    }

    /**
     * Checking if current position of array_walk
     * is 'api_key'.
     *
     * @param string $field Key of field.
     *
     * @return bool
     */
    protected function isFieldList($field)
    {
        if ($field === "field_list") {
            return true;
        }

        return false;
    }

    /**
     * Valid for 'field_list' key.
     *
     * @param string       $field Key of field.
     * @param string|array $param Param of field.
     *
     * @return array
     */
    protected function validFieldList($field, $param)
    {
        if ($field === 'field_list' && $param !== "") {
            return $param;
        }

        return [];
    }

    /**
     * Check if current position is enabled.
     *
     * @param string $field   Key of field
     * @param array  $enabled Array of enabled filters.
     *
     * @return bool
     */
    protected function isFilter($field, $enabled)
    {
        if (array_key_exists($field, $enabled) === false) {
            return false;
        }

        if ($enabled[$field] === true) {
            return true;
        }

        return false;
    }

    /**
     * Check if params are valid.
     *
     * @param string|array $param Params of filter.
     *
     * @return string|array
     */
    protected function validFilter($param)
    {
        if ($param !== "") {
            return $param;
        }

        return [];
    }

}