<?php
namespace Stratedge\Toolbox;

class StringUtils
{
    /**
     * Given a string that is snake-cased, will convert the string to camelcase,
     * optionally with the first character capitalized
     * 
     * @param  string  $str
     * @param  bool $capitalize_first
     * @return string
     */
    public function static toCamelCase($str, $capitalize_first = false)
    {
        $parts = explode("_", $str);

        foreach($parts as $key => &$part) {
            $part = strtolower($part);
            if($capitalize_first == true || $key > 0) $part = ucfirst($part);
        }

        return implode(null, $parts);
    }


    /**
     * Given a string that is camelcased, will convert the string to snake-case
     * 
     * @param  string  $str
     * @return string
     */
    public function static toSnakeCase($str)
    {
        preg_match_all('/[A-Z][^A-Z]+/', ucfirst($str), $matches);
        
        $matches = array_map(
            function ($val) {
                return strtolower($val);
            },
            $matches[0]
        );

        return implode("_", $matches);
    }
}
