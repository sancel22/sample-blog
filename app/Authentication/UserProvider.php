<?php

namespace App\Authentication;

use Hash;
use App\Authentication\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;

//use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Contracts\Auth\UserProvider as IlluminateUserProvider;

class UserProvider implements IlluminateUserProvider
{
    protected $user;

    /**
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        // Get and return a user by their unique identifier
        $request = Request::create("http://blog.dev/user/{$identifier}",'GET');
        $data = json_decode($request);
        if(count($data) > 0){
            $this->user = new User();
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->email = $data['email'];
            $this->password = $data['password'];

            return $this->$user;
        }
        return 'id';
    }

    /**
     * @param  mixed   $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        // Get and return a user by their unique identifier and "remember me" token
        return $this->user;
    }

    /**
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Save the given "remember me" token for the given user
        return $user->remember_me = $token;
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        // Get and return a user by looking up the given credentials
        $this->user = new User();
        $this->user->id = 123;
        $this->user->email= 'admin1@yopmail.com';
        $this->user->password = '123456';
        $this->user->name= 'Cel';
        $this->user->remember_me = bcrypt(time());
        return $this->user;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // Check that given credentials belong to the given user
        $cred = $credentials['password'];
        $user_cred = $user->getAuthPassword();
        return ($cred === $user_cred);

    }
}
