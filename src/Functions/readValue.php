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