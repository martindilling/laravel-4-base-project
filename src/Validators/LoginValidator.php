<?php namespace MDH\Base\Validators;

class LoginValidator extends BaseFormValidator
{
    protected $rules = [
        'email'    => 'required',
        'password' => 'required',
    ];
}
