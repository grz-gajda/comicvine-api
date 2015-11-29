<?php

namespace ComicVine\Api\Filters;

/**
 * Trait FilterCheck
 *
 * @package grzgajda/comicvine-api
 * @author  Grzegorz Gajda <grz.gajda@outlook.com>
 */
trait FilterCheck
{
    /**
     * Check if field $field is enabled for
     * making queries.
     *
     * @param string $field   Name of filters' field.
     * @param array  $filters Array of enabled filters for query.
     * @param mixed  $object  Return false or $this.
     *
     * @return $this
     */
    protected function isEnabledFilter($field, array $filters, $object = null)
    {
        if (array_key_exists($field, $filters) === false) {
            return ($object === null) ? false : $object;
        }

        if ($filters[$field] === false) {
            return ($object === null) ? false : $object;
        }

        return true;
    }
}