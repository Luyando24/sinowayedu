<?php

/**
 * Translate the given message.
 *
 * @param  string|null  $key
 * @param  array  $replace
 * @param  string|null  $locale
 * @return string|array|null
 */
function t($key = null, $replace = [], $locale = null)
{
    if (is_null($key)) {
        return $key;
    }
    
    return trans('messages.' . $key, $replace, $locale);
}



