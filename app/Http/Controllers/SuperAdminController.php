<?php

namespace App\Http\Controllers;

use Alert;
use App\Services\DbService;
use App\Services\ChartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{

    protected $db;
    protected $chart;

    public function __construct(DbService $db, ChartService $chart)
    {
        $this->db = $db;
        $this->chart = $chart;
        $this->middleware('auth');
        $this->middleware('permission:Super Admin')->except(['index']);
    }

    public function index()
    {
        if (get_user_role() == 'Admin') {
            return Redirect::route('admin.home');
        }

        $vaccinated = $this->db->getVaccinated();

        return view('sup-admin.home', compact('vaccinated'));
    }

    public function dashboard()
    {
        $vaccinated = $this->db->vaccine_given();
        $vaccinated_male = $this->db->vaccine_given_male();
        $vaccinated_female = $this->db->vaccine_given();

        return view('sup-admin.dashboard', compact('vaccinated', 'vaccinated_male',
                                                   'vaccinated_female'));
    }
}
