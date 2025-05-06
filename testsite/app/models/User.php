<?php

class User
{
    use Model;

    protected $table = 'users';

    protected $allowedColumns = 
    [
        'email',
        'password',
    ];
      public function validate($data)
      {
        $this->errors = [];

        if(empty($data['email']))
        {
            $this->errors['email'] = "email is required";
        }else
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "email is not valid";
        }

        if(empty($data['password']))
        {
            $this->errors['password'] = "password is required";
        }

        if(empty($data['terms']))
        {
            $this->errors['terms'] = "Please accept the terms and conditions";
        }

        if(empty($this->errors))
        {
            return true;
        }
        return false;
      }
}