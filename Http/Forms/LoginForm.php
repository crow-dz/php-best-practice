<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected  $errors = [];
    public function validate($email, $password)
    {
        // Validate User Input

        if (!Validator::email($email)) {
            $this->errors['email'] = 'Enter Valid Email';
        }
        if (!Validator::string($password)) {
            $this->errors['password'] = 'Password lenght must be more then seven';
        }
        return  empty($this->errors);
    }
    public function errors()
    {
        return $this->errors;
    }
}
