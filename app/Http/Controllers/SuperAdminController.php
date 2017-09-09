<?php

namespace App\Http\Controllers;

use Alert;
use App\Services\DbService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{

    protected $db;

    public function __construct(DbService $db)
    {
        $this->db = $db;
        $this->middleware('auth');
        $this->middleware('permission:Super Admin')->except(['index']);
    }

    public function index()
    {
        if (get_user_role() == 'Admin') {
            return Redirect::route('admin.dash');
        }

        $vaccinated = $this->db->getVaccinated();

        return view('sup-admin.home', compact('vaccinated'));
    }
}
