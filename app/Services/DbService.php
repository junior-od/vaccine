<?php

namespace App\Services;

use DB;
use Auth;
use App\User;
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

    public function getVaccinated()
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
}
