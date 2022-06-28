<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Uppercase implements Rule
{
    private $attribute = null;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;
        //
        if($value==mb_strtoupper($value,'UTF-8')){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // return 'trường :attribute không hợp lệ';
        if(trans('validation.custom.product_name.uppercase')!= 'validation.custom.product_name.uppercase'){
            return trans('validation.custom.product_name.uppercase');
        }
        return trans('validation.uppercase');
    }
}
