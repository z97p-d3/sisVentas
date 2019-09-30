<?php

namespace sisGoTrade\Http\Controllers;

use Illuminate\Http\Request;

class inicioController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('almacen/indice/index');
    }
}
