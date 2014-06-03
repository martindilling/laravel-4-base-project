<?php namespace MDH\Base\Validators;

class UpdateUserValidator extends BaseFormValidator
{
    protected $rules = [
        'name'     => '',
        'email'    => 'email|unique:users,email,{id}',
        'password' => 'min:8',
    ];
}
