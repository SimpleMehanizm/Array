<?php

declare(strict_types=1);

namespace SimpleMehanizm\Array\Functions;

if(!function_exists('readValue'))
{
    function readValue(array $input, string|null $path = null, mixed $default = null, string $delimiter = '.'): mixed
    {
        if(empty($path)) return $input;

        if(isset($input[$path])) return $input[$path];

        if(!str_contains($path, $delimiter)) return $default;

        $items = $input;

        $paths = explode($delimiter, $path);

        foreach($paths as $segment)
        {
            if(isset($items[$segment]))
            {
                $items = &$items[$segment];
            }
            else
            {
                return $default;
            }
        }

        return $items;
    }
}

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