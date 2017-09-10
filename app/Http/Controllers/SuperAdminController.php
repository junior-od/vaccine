<?php

namespace App\Http\Controllers;

use Alert;
use App\Services\DbService;
use Illuminate\Http\Request;
use App\Services\ChartService;
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

        $registered = $this->db->getRegistered();

        return view('sup-admin.home', compact('registered'));
    }

    public function dashboard()
    {
        $male = $this->db->male();
        $female = $this->db->female();
        $vaccinated = $this->db->vaccine_given();
        $registered_today_count = $this->db->registered_today();
        $performanceByGender = $this->chart->performanceByGender();
        $performanceByTotalReg = $this->chart->performanceByTotalReg();
        $performanceByDailyTarget = $this->chart->performanceByDailyTarget();
        $performanceForLastThreeDays = $this->chart->performanceForLastThreeDays();

        return view('sup-admin.dashboard', compact('vaccinated', 'male',
                                                   'female', 'performanceByGender',
                                                   'registered_today',
                                                   'performanceByTotalReg',
                                                   'performanceByDailyTarget',
                                                   'performanceForLastThreeDays'));
    }
}
