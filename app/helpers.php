<?php

if (!function_exists('lang')) {
    /**
     * Translate the given message.
     *
     * @param  string|null  $key
     * @param  array  $replace
     * @param  string|null  $locale
     * @return string|array|null
     */
    function lang($key = null, $replace = [], $locale = null)
    {
        return __('messages.' . $key, $replace, $locale);
    }
}

