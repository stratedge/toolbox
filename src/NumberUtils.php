<?php
namespace Stratedge\Toolbox;

class NumberUtils
{
    public static function isOnlyNumbers($value)
    {
        if (is_numeric($value)) {
            return preg_match('/^\d+$/', $value) === 1;
        }

        return false;
    }
}
