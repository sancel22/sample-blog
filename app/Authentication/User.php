<?php

namespace App\Authentication;

use Illuminate\Contracts\Auth\Authenticatable;

class User implements Authenticatable
{
    protected $id;
    protected $email;
    protected $password;
    protected $name;

    public function __construct()
    {
        $this->id = 123;
        $this->email = 'admin@yopmail.com';
        $this->password = bcrypt('123456');
        $this->name = 'Dummy User';
    }
    /**
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // Return the name of unique identifier for the user (e.g. "id")
        return 'id';
    }

    /**
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        // Return the unique identifier for the user (e.g. their ID, 123)
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        // Returns the (hashed) password for the user
        return $this->password;
    }

    /**
     * @return string
     */
    public function getRememberToken()
    {
        // Return the token used for the "remember me" functionality
    }

    /**
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // Store a new token user for the "remember me" functionality
    }

    /**
     * @return string
     */
    public function getRememberTokenName()
    {
        // Return the name of the column / attribute used to store the "remember me" token
    }
}
