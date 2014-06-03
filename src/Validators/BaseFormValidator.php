<?php namespace MDH\Base\Validators;

use MDH\Base\Exceptions\FormValidationException;

abstract class BaseFormValidator extends BaseValidator
{
    /**
     * @throws \MDH\Base\Exceptions\FormValidationException
     */
    protected function throwValidationException()
    {
        throw new FormValidationException('Validation failed', $this->getValidationErrors());
    }
}
