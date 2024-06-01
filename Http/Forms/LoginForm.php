<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;

class LoginForm
{
    protected  $errors = [];
    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Enter Valid Email';
        }
        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Password lenght must be more then seven';
        }
    }
    public static function validate($attributes)
    {

        // Validate User Input
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }
    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }
    public function failed()
    {
        return count($this->errors);
    }
    public function errors()
    {
        return $this->errors;
    }
    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
}
