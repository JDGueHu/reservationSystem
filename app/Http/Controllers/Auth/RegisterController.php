<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\role;
use App\customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Client;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    protected function registrarseStore(Request $request)
    {
        //dd();

        $token = $request->input('g-recaptcha-response');

        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify',[
            'body' => [
                'secret' => '6LcfFhcUAAAAAJXLULs4lL4r12WDd2CXYycVNrKZ',
                'response' => $token
            ]
        ]);

        $response = json_decode($response->getBody());

        $role = role::where('name','=',"User")->first();

        $url=$_SERVER['HTTP_HOST'];
        $customer = customer::where('domain','=',$url)->first();        

        if($response->success == true){

            $user = new user();
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $role->id;
            $user->customer_id = $customer->id;
            $user->save();

            flash('Usuario <b>'.$request->email.'</b> registrado correctamente', 'success')->important();
            return redirect()->route('login');

        }else{

            flash('El <b>Captcha</b> no es válido. Por favor intente registrarse nuevamente', 'danger')->important();
            return redirect()->route('registrarse');

        }


    }
}
