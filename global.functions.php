<?php


if (! function_exists('routeIs')) {

    /**
     * routeIs function.
     *
     * @access public
     * @param bool $key (default: false)
     * @return void
     */
    function routeIs($arg, $class = null)
    {
        return \Route::is($arg) ? (!is_null($class) ? $class : true) : false;
    }
}
