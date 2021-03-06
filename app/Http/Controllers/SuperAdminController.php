<?php

namespace App\Http\Controllers;

use Alert;
use Auth as Auth;
use App\Services\DbService;
use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Services\ChartService;
use App\Services\HelperService;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{

    protected $db;
    protected $api;
    protected $chart;
    protected $helper;

    public function __construct(DbService $db, ChartService $chart, ApiService $api,
                                HelperService $helper)
    {
        $this->db = $db;
        $this->api = $api;
        $this->chart = $chart;
        $this->helper = $helper;
        $this->middleware('auth');
        $this->middleware('permission:Super Admin')->except(['index']);
    }

    public function index()
    {
        if (get_user_role() == 'Admin') {

            $target = round(day_register_target() / 50);

            Alert::info('Hi ' .Auth::user()->first_name.', your outstanding target for today is '. $target . ' registrations')->persistent('Got It');

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

    public function adminUsers()
    { 
        $users = $this->db->adminUsers();

        return view('sup-admin.users', compact('users'));
    }

    public function editUser($id)
    {
        $user = $this->db->find_user($id);
        $shift = $this->db->user_shift($id);

        return view('sup-admin.edit-user', compact('user', 'shift'));
    }

    public function update_user($id, EditUserRequest $request)
    {
        if (func_check_if_over_budget($request->id, $request->wages)) {

            Alert::info('Adding this wage amount exceeds the overall budget. Please reduce')->persistent('Okay');

            return Redirect::back();
        }

        if ($this->helper->work_hour_limit($request) == false) {

            Alert::info('An Admin is only allowed a 2 hour work time')->persistent('Okay');

            return Redirect::back();
        }

        $this->db->updateUser($id, $request);
        $this->db->updateWorkHr($id, $request);

        Alert::success('User Successfully Updated');

        return Redirect::route('admin.users');
    }

    public function toogle_user_status($id, Request $request)
    {
        if ($request->ajax()) {
    
            if (! is_numeric($id) || empty($id)) {
                return response()->json(['status' =>'error'],401); 
            }
            
            if ($this->db->user_exist($id) == false) {
                return response()->json(['status' =>'error'],401);     
            }

            $this->db->toogle_user_status($id);
            
            return response()->json(['status' =>'success'],200);
        }
    }
}
