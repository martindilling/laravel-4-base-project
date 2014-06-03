<?php namespace MDH\Base\Validators;

use Illuminate\Validation\Factory;
use MDH\Base\Exceptions\ValidationException;

abstract class BaseValidator
{
    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var \Illuminate\Validation\Factory
     */
    protected $validationFactory;

    /**
     * @var \Illuminate\Validation\Validator
     */
    protected $validator;

    /**
     * @param \Illuminate\Validation\Factory $validationFactory
     */
    function __construct(Factory $validationFactory)
    {
        $this->validationFactory = $validationFactory;
    }

    /**
     * @param array    $formData
     * @param integer  $id
     * @return bool
     */
    public function validate(array $formData, $id = null)
    {
        $this->validator = $this->validationFactory->make($formData, $this->getValidationRules($id));

        if ($this->validator->fails()) {
            $this->throwValidationException();
        }

        return true;
    }

    /**
     * @param integer  $id
     * @return array
     */
    protected function getValidationRules($id = null)
    {
        $rules = $this->rules;

        if ($id) {
            $rules = str_replace('{id}', $id, $rules);
        }

        return $rules;
    }

    /**
     * @return \Illuminate\Support\MessageBag
     */
    protected function getValidationErrors()
    {
        return $this->validator->errors();
    }

    /**
     * @throws \MDH\Base\Exceptions\ValidationException
     */
    protected function throwValidationException()
    {
        throw new ValidationException('Validation failed', $this->getValidationErrors());
    }
}
