<?php

/**
 * Controller de Autenticacao de Usuarios
 */

namespace Teles\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Teles\User;

class AuthController extends Controller {

    /**
     * Metodo que retorna a view de registro no sistema
     * @return view
     */
    public function getSignup() {
        return view('auth.signup');
    }

    /**
     * Metodo que recebe os parametros do formulario e cadastra o usuario no sistema
     * @param Request $request
     * @return redirect
     */
    public function postSignup(Request $request) {
        // Validacao dos dados do usuario vindos do formulario
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:30',
            'password' => 'required|min:6|confirmed',
            'password_confirm' => 'required|min:6'
        ]);
        
        // Insercao no banco de dados
        User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        
        // Retorna para a home com uma mensagem na Session
        return redirect()->route('home')->with('info', 'Seu cadastro foi efetuado com sucesso!');
    }
    
    /**
     * Metodo que retorna a view de login
     * @return view
     */
    public function getSignin() {
        return view('auth.signin');
    }
    
    /**
     * Metodo que executa o login no sistema
     * @param Request $request
     * @return redirect
     */
    public function postSignin(Request $request) {
        // Validacao dos dados do formulario de login
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        // Se os dados inseridos nao estiverem no banco de dados o usuario e' redirecionado para a home com uma mensagem na Session
        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('info', 'Credenciais Inválidas.');
        }
        
        // Se os dados inseridos estiverem no banco de dados o usuario e' redirecionado para a home com uma mensagem na Session
        return redirect()->route('home')->with('info', 'Você está logado!');
    }
    
    /**
     * Metodo para logout do usuario
     * @return redirect
     */
    public function getSignout() {
        Auth::logout();

        return redirect()->route('home')->with('info', 'Deslogado com sucesso!');
    }

}
