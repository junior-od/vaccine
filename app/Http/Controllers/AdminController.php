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
        $this->middleware('permission:Admin')->except(['vaccinated']);
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

        return Redirect::route('vaccinated.child.view');
    }

    public function vaccinated()
    {
        $vaccinated = $this->db->getVaccinated();

        return view('admin.vaccinated', compact('vaccinated'));
    }

    public function edit($id)
    {
        $child = $this->db->find_child($id);

        return view('admin.edit', compact('child'));
    }

    public function editRegisterForm($id, RegisterRequest $request)
    {
        $this->db->updateChild($id, $request->all());

        Alert::success('Child Detail Updated');

        return Redirect::route('vaccinated.child.view');
    }
}
