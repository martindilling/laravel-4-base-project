<?php namespace MDH\Base\Sanitizers;

use Rees\Sanitizer\Sanitizer;

abstract class BaseSanitizer
{
    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @var \Illuminate\Validation\Factory
     */
    protected $sanitizer;

    /**
     * @param \Rees\Sanitizer\Sanitizer $sanitizer
     */
    function __construct(Sanitizer $sanitizer)
    {
        $this->sanitizer = $sanitizer;
    }

    /**
     * @param array $data
     * @return array
     * @throws FormValidationException
     */
    public function sanitize(array $data)
    {
        $this->sanitizer->sanitize($this->getSanitizingRules(), $data);

        return $data;
    }

    /**
     * @return array
     */
    protected function getSanitizingRules()
    {
        return $this->rules;
    }
}
