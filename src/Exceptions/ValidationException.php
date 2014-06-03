<?php namespace MDH\Base\Exceptions;

use Illuminate\Support\MessageBag;

class ValidationException extends BaseException
{
    /**
     * @var MessageBag
     */
    protected $errors;

    function __construct($message, MessageBag $errors)
    {
        $this->errors = $errors;
        
        parent::__construct($message);
    }
    
    public function getErrors()
    {
        return $this->errors;
    }

}
