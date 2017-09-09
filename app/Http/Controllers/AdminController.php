<?php

namespace App\Http\Controllers;

use Alert;
use App\Services\DbService;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class AdminController extends Controller
{
    protected $db;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DbService $db)
    {
        $this->db = $db;
        $this->middleware('auth');
        $this->middleware('permission:Admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function register()
    {
        //Alert::error('yes');
        return view('admin.register');
    }

    public function saveRegisterForm(RegisterRequest $request)
    {

    }
}
