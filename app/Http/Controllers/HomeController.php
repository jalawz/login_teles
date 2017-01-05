<?php
/**
 * Classe Controller para exibicao da tela inicial
 */
namespace Teles\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Metodo que retorna a view home
     * @return view
     */
    public function index()
    {
        return view('home');
    }
}
