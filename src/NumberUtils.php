<?php
namespace Stratedge\Toolbox;

class NumberUtils
{
    /**
     * Determines if a given value is comprised entirely of numbers
     * 
     * @param  mixed  $value
     * @return bool
     */
    public static function isOnlyNumbers($value)
    {
        if (is_numeric($value)) {
            return preg_match('/^\d+$/', $value) === 1;
        }

        return false;
    }
}
