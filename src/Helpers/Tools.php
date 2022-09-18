<?php

namespace App\Helpers;

class Tools
{
    public static function stringifyErrors(array $errors): string
    {
        $result = array_reduce($errors, function ($acc, $errorField) {
            $errorsMsg = array_values($errorField);
            return array_merge($acc, $errorsMsg);
        }, []);
        return implode(PHP_EOL, $result);
    }

}
