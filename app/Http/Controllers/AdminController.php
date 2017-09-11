<?php

namespace App\Http\Controllers;

use Alert;
use App\Services\DbService;
use Illuminate\Http\Request;
use App\Services\HelperService;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    protected $db;
    protected $helper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DbService $db, HelperService $helper)
    {
        $this->db = $db;
        $this->helper = $helper;
        $this->middleware('auth');
        $this->middleware('permission:Admin')->except(['registered']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registered = $this->db->getRegistered();

        return view('admin.home', compact('registered'));
    }

    public function register()
    {
        return view('admin.register');
    }

    public function saveRegisterForm(RegisterRequest $request)
    {
        $this->db->register($request->all());

        if ($this->helper->vaccine_choice($request->vaccine_name, $request->vaccine_given) == false) {

            Alert::error('You have to enter a vaccine name')->persistent('Okay');

            return Redirect::back();
        }

        if ($this->helper->vaccine_age_below($request->child_age, $request->vaccine_given) == false) {

            Alert::error('This child has to be given a vaccine')->persistent('Okay');

            return Redirect::back();

        }

        if ($this->helper->vaccine_age_above($request->child_age, $request->vaccine_given) == false) {

            Alert::error('This child does not need a vaccine')->persistent('Okay');

            return Redirect::back();

        }

        Alert::success('Child Registration Successful');

        return Redirect::route('registered.child.view');
    }

    public function registered()
    {
        $registered = $this->db->getRegistered();

        return view('admin.registered', compact('registered'));
    }

    public function edit($id)
    {
        $child = $this->db->find_child($id);

        return view('admin.edit', compact('child'));
    }

    public function editRegisterForm($id, RegisterRequest $request)
    {
        $this->db->updateChild($id, $request->all());

        if ($this->helper->vaccine_choice($request->vaccine_name, $request->vaccine_given) == false) {

            Alert::error('You have to enter a vaccine name')->persistent('Okay');

            return Redirect::back();

        }

        if ($this->helper->vaccine_age_below($request->child_age, $request->vaccine_given) == false) {

            Alert::error('This child has to be given a vaccine')->persistent('Okay');

            return Redirect::back();

        }

        if ($this->helper->vaccine_age_above($request->child_age, $request->vaccine_given) == false) {

            Alert::error('This child does not need a vaccine')->persistent('Okay');

            return Redirect::back();

        }

        Alert::success('Child Detail Updated');

        return Redirect::route('registered.child.view');
    }
}
