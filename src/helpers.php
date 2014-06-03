<?php

if ( ! function_exists('set_active'))
{
    /**
     * If route matches given route (or array of routes) return active.
     *
     * @param  mixed  $route
     * @param  string $activeClass
     * @param  bool   $onlyClass
     * @return string
     */
    function set_active($route, $activeClass = 'active', $onlyClass = false)
    {
        $current = Route::currentRouteName();

        if ( ! is_array($route) ) {
            $route = explode(' ', $route);
        }

        $match = false;

        foreach ($route as $value) {
            if ( compare_dot_arrays($value, $current) ) {
                $match = true;
                break;
            }
        }

        if (!$match) {
            return '';
        }

        if ($onlyClass) {
            return $activeClass;
        }

        return ' class="' . $activeClass . '"';
    }
}

if ( ! function_exists('compare_dot_arrays'))
{
    /**
     * Compare two dot notation values.
     * Accepts '*' as wildcard
     *
     * @param  string  $dot1
     * @param  string  $dot2
     * @return string
     */
    function compare_dot_arrays($dot1, $dot2)
    {
        $array1 = explode('.', $dot1);
        $array2 = explode('.', $dot2);

        if ( count($array1) > count($array2) ) {
            $count = count($array1);
        } else {
            $count = count($array2);
        }

        $match = true;

        for ($i=0; $i < $count; $i++) {
            if ( ! isset($array2[$i]) ) {
                if ( $array1[$i] !== '*' ) $match = false;
                break;
            }

            if ( ! isset($array1[$i]) ) {
                if ( $array1[$i-1] !== '*' ) $match = false;
                break;
            }

            if ( $array1[$i] !== $array2[$i] && $array1[$i] !== '*') {
                $match = false;
            }
        }

        return $match;
    }
}


function set_error($key, $errors)
{
    return $errors->has($key) ? 'has-error' : '';
}


function get_error($key, $errors)
{
    return $errors->has($key) ? $errors->first($key, '<span class="help-block">:message</span>'): '';
};
