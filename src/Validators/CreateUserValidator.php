<?php namespace MDH\Base\Validators;

class CreateUserValidator extends BaseFormValidator
{
    protected $rules = [
        'name'     => 'required',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required',
    ];
}
