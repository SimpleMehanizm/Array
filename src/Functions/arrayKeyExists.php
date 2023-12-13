<?php

declare(strict_types=1);

namespace SimpleMehanizm\Array\Functions;

if(!function_exists('keyExists'))
{
    function arrayKeyExists(array $input, string|null $path, string $delimiter = '.'): bool
    {
        if(empty($path)) return false;

        if(isset($input[$path])) return true;

        $items = $input;

        $paths = explode($delimiter, $path);

        $result = false;

        foreach($paths as $i => $segment)
        {
            if(isset($items[$segment]))
            {
                $items = &$items[$segment];

                $result = true;
            }
            else
            {
                return false;
            }
        }

        return $result;
    }
}