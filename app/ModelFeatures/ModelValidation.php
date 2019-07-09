<?php

namespace App\ModelFeatures;

use Illuminate\Support\Facades\Validator;

trait ModelValidation
{
    protected static $errors = [];

    public static function validate(array $data)
    {
        if (!isset(self::$rules)) {
            return true;
        }

        $v = Validator::make($data, self::$rules);

        if ($v->fails()) {
            self::$errors = $v->errors()->all();
            return false;
        }
        return true;
    }

    public function getErrors()
    {
        return self::$errors;
    }

    public static function getRules()
    {
        return self::$rules;
    }
}
