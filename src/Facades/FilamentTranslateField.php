<?php

namespace CodeWithDennis\FilamentTranslateField\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodeWithDennis\FilamentTranslateField\FilamentTranslateField
 */
class FilamentTranslateField extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \CodeWithDennis\FilamentTranslateField\FilamentTranslateField::class;
    }
}
