<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
class Uppercase implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->email = $email;
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
        // Banned words
        $words = array('@vku.udn.vn');
        foreach ($words as $word)
        {
            if (stripos($value, $word) !== false) return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Bạn chọn người thuê mà lại nhập email trường 😾';
    }
}
