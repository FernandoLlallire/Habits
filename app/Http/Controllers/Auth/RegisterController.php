<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';/*redireccion al crear usuario*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      return Validator::make($data, [
            'firstName' => 'required|string|max:255',
            'lastName' =>  'required|string|max:255',
            'userName' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'country' => 'required',
            'province' => 'string',
            'avatar' => 'required',
            'password' => 'required|string|min:4|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *$data = $request->all()
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      // Necesito el archivo en una variable esta vez
        		$file = $data["avatar"];

        		// Nombre final de la imagen
        		$finalName = strtolower(str_replace(" ", "_", $data["userName"]));

        		// Armo un nombre único para este archivo
        		$name = $finalName . uniqid('_image_') . "." . $file->extension();

        		// Guardo el archivo en la carpeta
        		$file->storePubliclyAs("public/avatars", $name);

        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'userName' => $data['userName'],
            'email' => $data['email'],
            'country' => $data['country'],
            'avatar' => $name,
            'password' => Hash::make($data['password']),
            'province' => $data['province'],
        ]);

    }
}
