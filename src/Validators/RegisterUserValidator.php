<?php namespace MDH\Base\Validators;

class RegisterUserValidator extends BaseFormValidator
{
    protected $rules = [
        'name'     => 'required',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',
    ];
}
