<?php

namespace App\Authentication;

use DB;
use Hash;
use App\Authentication\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;

//use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Contracts\Auth\UserProvider as IlluminateUserProvider;

class UserProvider implements IlluminateUserProvider
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * @param  mixed  $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        // Get and return a user by their unique identifier
        $data = json_decode(file_get_contents("http://blog.dev/user/{$identifier}"), true);
        if (count($data) > 0) {
            $this->user->id = $data['id'];
            $this->user->name = $data['name'];
            $this->user->email = $data['email'];
            return $this->user;
        }
        return null;
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
        $user->remember_token = $token;
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
        $data = DB::table('users')->where(['email' => $credentials['email']])->first();
        if (count($data) > 0) {
            $this->user->id = $data->id;
            $this->user->name = $data->name;
            $this->user->email = $data->email;
            $this->user->password = $data->password;
            $this->user->remember_token = $data->remember_token;
            return $this->user;
        }
        return null;
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
        return Hash::check($credentials['password'], $user->getAuthPassword());
    }
}
