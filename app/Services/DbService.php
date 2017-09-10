<?php

namespace App\Services;

use DB;
use Auth;
use App\User;
use Carbon\Carbon;
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

    public function vaccine_choice($vaccine, $choice)
    {
        if ($vaccine == "" && $choice == true) {
            return false;
        }

        return true;
    }

    public function vaccine_age_below($age, $choice)
    {
        if ($age < 10 && $choice == false) {
            return false;
        }

        return true;
    }

    public function vaccine_age_above($age, $choice)
    {
        if ($age > 10 && $choice == true) {
            return false;
        }

        return true;
    }

    public function registered_today()
    {
        $today = Carbon::today()->format('Y-m-d');

        $children = VaccinatedChild::where('created_at', 'LIKE', "%$today%")
                    ->get();

        if (empty($children->toArray())) {
            $children = collect();
        }

        return $children;
    }

    public function registered_yesterday()
    {
        $day = Carbon::today()->subdays(1)->format('Y-m-d');

        $children = VaccinatedChild::where('created_at', 'LIKE', "%$day%")
                    ->get();

        if (empty($children->toArray())) {
            $children = collect();
        }

        return $children;
    }

    public function registered_two_days_ago()
    {
        $day = Carbon::today()->subdays(2)->format('Y-m-d');

        $children = VaccinatedChild::where('created_at', 'LIKE', "%$day%")
                    ->get();

        if (empty($children->toArray())) {
            $children = collect();
        }

        return $children;
    }
}
