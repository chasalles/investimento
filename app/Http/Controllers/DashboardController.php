<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Exception;


class DashboardController extends Controller
{
    //
	public function index(){
		return view('user.dashboard');
	}

    public function auth(Request $request){
    	
    	$data = [
    		'email'		=> $request->get('username'),
    		'password'	=> $request->get('password'),
    	];

    	try {

            if (env('PASSWORD_HASH')) {

                Auth::attempt($data, false);
            
            } else {
                $user = User::where('email', $data['email'])->first();

                if (!$user) {
                    throw new Exception('Usuário não encontrado');
                }

                if ($user->password != $data['password']) {
                    throw new Exception('Senha Inválida'); 
                }

                Auth::login($user);
            }
            
    		

    		return redirect()->route('user.dashboard');

    	} catch (Exception $e) {
    		return $e->getMessage();
    	}
    }
}
