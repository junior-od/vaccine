<?php

namespace App\Services;

use DB;
use Auth;
use App\User;
use Carbon\Carbon;
use App\WorkingHour;
use App\VaccinatedChild;

class DbService {


    public function __construct()
    {

    }


    public function register($request = [])
    {
        $request = array_merge($request, ['reported_by' => Auth::id()]);

        VaccinatedChild::create($request);

        return true;
    }

    public function getRegistered()
    {
        if (get_user_role() == 'Admin') {
            $vaccinated = VaccinatedChild::where('reported_by', Auth::id())
                          ->get();
        } else {
            $vaccinated = VaccinatedChild::all();
        }

        return $vaccinated;
    }

    public function vaccine_given()
    {
        $vaccinated = VaccinatedChild::where('vaccine_given', true)
                      ->get();

        return $vaccinated;
    }

    public function vaccine_given_male()
    {
        $vaccinated = VaccinatedChild::where('vaccine_given', true)
                      ->where('sex', 'male')
                      ->get();

        return $vaccinated;
    }


    public function vaccine_given_female()
    {
        $vaccinated = VaccinatedChild::where('vaccine_given', true)
                      ->where('sex', 'female')
                      ->get();

        return $vaccinated;
    }

    public function male()
    {
        $male = VaccinatedChild::where('sex', 'male')
                ->get();

        return $male;
    }

    public function female()
    {
        $female = VaccinatedChild::where('sex', 'female')
                  ->get();

        return $female;
    }

    public function find_child($id)
    {
        $child = VaccinatedChild::findOrFail($id);

        return $child;
    }

    public function updateChild($id, $request)
    {
        $child = $this->find_child($id);

        unset($request['_token']);

        VaccinatedChild::where('id', $id)
        ->update($request);
    }

    public function registered_today()
    {
        $today = Carbon::today()->format('Y-m-d');

        $children = VaccinatedChild::whereDate('created_at', "$today")
                    ->get();

        return $children;
    }

    public function registered_yesterday()
    {
        $day = Carbon::today()->subdays(1)->format('Y-m-d');

        $children = VaccinatedChild::whereDate('created_at', "$day")
                    ->get();

        return $children;
    }

    public function registered_two_days_ago()
    {
        $day = Carbon::today()->subdays(2)->format('Y-m-d');

        $children = VaccinatedChild::whereDate('created_at', "$day")
                    ->get();

        return $children;
    }

    public function adminUsers()
    {
        $users = User::where('role_id', 2)
                 ->get();

        return $users;
    }

    public function find_user($id)
    {
        $user = User::findOrFail($id);

        if ($user->role_id == 1) {
            return false;
        }

        return $user;
    }

    public function user_shift($id)
    {
        $shift = WorkingHour::where('user_id', $id)
                 ->get();

        return $shift[0];
    }

    public function updateUser($id, $request)
    {
        User::where('id', $id)
        ->update([
          'first_name' => $request->first_name,
          'last_name'  => $request->last_name,
          'email'      => $request->email,
          'telephone'  => $request->telephone
        ]);
    }

    public function updateWorkHr($id, $request)
    {
        WorkingHour::where('user_id', $id)
        ->update([
          'wage_per_hour' => $request->wages,
          'from'          => $request->shift_from,
          'to'            => $request->shift_to
        ]);
    }

}
