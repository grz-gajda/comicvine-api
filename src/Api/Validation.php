<?php

namespace ComicVine\Api;

use ComicVine\Api\Filters\FilterCheck;

/**
 * Check validation of inputs for ControllerQuery.
 *
 * Class Validation
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
class Validation
{
    use FilterCheck;

    /**
     * Mock for enabled filters.
     *
     * @var array
     */
    protected $enabledFilters = [];

    /**
     * Validation constructor.
     *
     * @param array $filters
     */
    public function __construct($filters = [])
    {
        if ($filters !== []) {
            $this->enabledFilters = $filters;
        }
    }

    /**
     * Check validation for $input
     *
     * @param string       $type
     * @param string|array $input
     *
     * @return bool
     */
    public function validation($type = "", $input)
    {
        switch ($type) {
            case 'field_list':
                return $this->validFieldList($input);
            case 'limit':
                return $this->validLimit($input);
            case 'offset':
                return $this->validOffset($input);
            case 'filter':
                return $this->validFilter($input);
            case 'sort':
                return $this->validSort($input);
            default:
                return false;
        }
    }

    /**
     * Validation for FIELD_LIST parameter.
     *
     * @param string|array $input
     *
     * @return bool
     */
    protected function validFieldList($input)
    {
        if (is_array($input) === false) {
            return false;
        }

        foreach ($input as $key => $value) {
            if (is_int($key) === false) {
                return false;
            }
            if (is_string($value) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validation for LIMIT parameter.
     *
     * @param string|array $input
     *
     * @return bool
     */
    protected function validLimit($input)
    {
        if (is_int($input) === false) {
            return false;
        }

        if ($input < 0 || $input > 100) {
            return false;
        }

        return $this->isEnabledFilter('limit', $this->enabledFilters);
    }

    /**
     * Validation for OFFSET parameter.
     *
     * @param string|array $input
     *
     * @return bool
     */
    protected function validOffset($input)
    {
        if (is_int($input) === false) {
            return false;
        }

        if ($input < 0) {
            return false;
        }

        return $this->isEnabledFilter('offset', $this->enabledFilters);
    }

    /**
     * Validation for FILTER parameter.
     *
     * @param string|array $input
     *
     * @return bool
     */
    protected function validFilter($input)
    {
        if (is_array($input) === false) {
            return false;
        }

        foreach ($input as $key => $value) {
            if (is_string($key) === false) {
                return false;
            }
            if (is_array($value) === true) {
                return false;
            }
            if (is_object($value) === true) {
                return false;
            }
        }

        return $this->isEnabledFilter('filter', $this->enabledFilters);
    }

    /**
     * Validation for SORT parameter.
     *
     * @param string|array $input
     *
     * @return bool
     */
    protected function validSort($input)
    {
        if (is_array($input) === false) {
            return false;
        }

        foreach ($input as $key => $value) {
            if (is_string($key) === false) {
                return false;
            }
            if ($value !== 'asc' && $value !== 'desc') {
                return false;
            }
        }

        return $this->isEnabledFilter('sort', $this->enabledFilters);
    }
}