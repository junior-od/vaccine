<?php

namespace App\Http\Controllers;

use Alert;
use App\Services\DbService;
use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Services\ChartService;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{

    protected $db;
    protected $api;
    protected $chart;

    public function __construct(DbService $db, ChartService $chart, ApiService $api)
    {
        $this->db = $db;
        $this->api = $api;
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

    public function api_calls()
    {
        return view('sup-admin.api');
    }

    public function apiCall($type, Request $request)
    {
        if ($request->ajax()) {

            try {

                $call = $this->api->$type();

            } catch (\Exception $e) {

                return response()->json(['status' => 'error'], 400);

            }

            $html = view('sup-admin.partials.response', compact('call', 'type'))->render();

            return response()->json(['status' => 'success', 'html' => $html], 200);
        }
    }
}
