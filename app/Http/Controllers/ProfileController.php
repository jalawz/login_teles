<?php
/**
 * Classe Controller para atualizacao do Perfil do Usuario
 */
namespace Teles\Http\Controllers;

use Illuminate\Http\Request;

//use Teles\Http\Requests;
use Teles\Http\Controllers\Controller;
use Teles\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Metodo que verifica a autenticacao do usuario e retorna a view de Edicao de Perfil
     * @param integer $id
     * @return view
     */
    public function getProfile($id)
    {
        // Se o usuario nao estiver logado, redireciona para a home com uma mensagem na Session
        if(Auth::guest()) {
            return redirect()->route('home')->with('info', 'Acesso negado. Voce nao tem permissao para acessar essa pagina.');
        }
        
        // Busca o usuario no banco de dados pelo seu id
        $user = User::find($id);
        
        // Se esse usuario nao existir, redireciona para a home com uma mensagem na Session
        if(!$user) {
            return redirect()->route('home')->with('info', 'Perfil inexistente');
        }
        
        // Se o usuario tentar editar outro perfil que nao seja o seu, redireciona para a home com uma mensagem na Session
        if(Auth::user()->getId() != $id) {
            return redirect()->route('home')->with('info', 'Acesso negado. Voce nao tem permissao para editar este perfil.');
        }
        
        // Retorna a view de edicao de perfil com os dados do usuario logado
        return view('profile.profile')->with('user', $user);
    }

    /**
     * Metodo que efetua o update do perfil do usuario no banco de dados
     * @param Request $request
     * @return redirect
     */
    public function postProfile(Request $request)
    {
        // Busca o usuario no banco pelo seu id
        $user = User::find($request->input('id'));
        
        // Executa o update do usuario pelo seu id
        User::where('id', $request->input('id'))->update([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'location' => $request->input('location'),
            'company' => $request->input('company'),
            'password' => (empty($request->input('password'))) ? $user->password : $request->input('password')
        ]);
        
        // Redireciona o usuario para a home com uma mensagem na Session
        return redirect()->route('home')->with('info', 'Perfil atualizado com sucesso!');
    }
}
