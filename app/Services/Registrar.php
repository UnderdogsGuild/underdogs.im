<?php namespace App\Services;

use App\User;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Validator;

class Registrar implements RegistrarContract {

    public function __construct()
    {
    }
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make(
            $data,
            [
			    'username' => 'required|max:255',
			    'email' => 'required|email|max:255|unique:users',
			    'password' => 'required|confirmed|min:6',
                'g-recaptcha-response' => 'required|recaptcha',
		    ],
            ['g-recaptcha-response.required' => 'You must prove your humanity.']
        );

	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        $user = new User();
        $user->username = $data['username'];
        $user->setPassword($data['password']);
        $user->email = $data['email'];
        $user->service_email_id = null;
        $user->save();
        return $user;
	}

}