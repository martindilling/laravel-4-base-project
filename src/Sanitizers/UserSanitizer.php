<?php namespace MDH\Base\Sanitizers;

class UserSanitizer extends BaseSanitizer
{
    protected $rules = [
        'name'     => 'trim',
        'email'    => 'trim|strtolower',
        'password' => '',
    ];
}
