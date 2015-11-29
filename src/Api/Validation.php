<?php

namespace ComicVine\Api;

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
     * @param array $input
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
     * @param string $input
     *
     * @return bool
     */
    protected function validLimit($input)
    {
        if (isset($this->enabledFilters['limit']) === false
            || $this->enabledFilters['limit'] === false
        ) {
            return false;
        }

        if (is_int($input) === false) {
            return false;
        }

        if ($input < 0 || $input > 100) {
            return false;
        }

        return true;
    }

    /**
     * Validation for OFFSET parameter.
     *
     * @param string $input
     *
     * @return bool
     */
    protected function validOffset($input)
    {
        if (isset($this->enabledFilters['offset']) === false
            || $this->enabledFilters['offset'] === false
        ) {
            return false;
        }

        if (is_int($input) === false) {
            return false;
        }

        if ($input < 0) {
            return false;
        }

        return true;
    }

    /**
     * Validation for FILTER parameter.
     *
     * @param array $input
     *
     * @return bool
     */
    protected function validFilter($input)
    {
        if (isset($this->enabledFilters['filter']) === false
            || $this->enabledFilters['filter'] === false
        ) {
            return false;
        }

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

        return true;
    }

    /**
     * Validation for SORT parameter.
     *
     * @param array $input
     *
     * @return bool
     */
    protected function validSort($input)
    {

        if (isset($this->enabledFilters['sort']) === false
            || $this->enabledFilters['sort'] === false
        ) {
            return false;
        }

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

        return true;
    }
}