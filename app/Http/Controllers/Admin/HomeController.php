<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exhibitor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    
    public function index()
    {
        $persons = Exhibitor::orderBy('id', 'DESC')
        ->take(10)
        ->get();
    	return view('back.index', ['persons' => $persons]);
    }
}
