<?php

namespace App\Http\Controllers;

use Alert;
use App\Services\DbService;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;

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
        $vaccinated = $this->db->getVaccinated();

        return view('admin.home', compact('vaccinated'));
    }

    public function register()
    {
        return view('admin.register');
    }

    public function saveRegisterForm(RegisterRequest $request)
    {
        $this->db->register($request->all());

        Alert::success('Child Registration Successfull');

        return Redirect::Back();
    }

    public function vaccinated()
    {
        $vaccinated = $this->db->getVaccinated();

        return view('admin.vaccinated', compact('vaccinated'));
    }
}
