<?php
namespace Stratedge\Toolbox;

class FileUtils
{
    /**
     * Returns the fully-qualified class name based upon the contents of the
     * file found at the given path
     * 
     * @param  string $path
     * @return string
     */
    public static function getClassFromPath($path)
    {
        $code = file_get_contents($path);

        $namespace = $class = "";

        $getting_namespace = $getting_class = false;

        foreach (token_get_all($code) as $token) {
            if (is_array($token) && $token[0] == T_NAMESPACE) {
                $getting_namespace = true;
            }

            if (is_array($token) && $token[0] == T_CLASS) {
                $getting_class = true;
            }

            if ($getting_namespace === true) {
                if(is_array($token) && in_array($token[0], [T_STRING, T_NS_SEPARATOR])) {
                    $namespace .= $token[1];
                }
                else if ($token === ';') {
                    $getting_namespace = false;
                }
            }

            if ($getting_class === true) {
                if(is_array($token) && $token[0] == T_STRING) {
                    $class = $token[1];
                    break; //Got what we need, stop here
                }
            }
        }

        return $namespace . '\\' . $class;
    }
}
