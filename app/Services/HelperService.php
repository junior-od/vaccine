<?php

namespace App\Services;

use DB;
use Auth;
use App\User;
use Carbon\Carbon;
use App\VaccinatedChild;

class HelperService {


    public function __construct()
    {

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

    public function work_hour_limit($request)
    {
        if (abs(strtotime($request->shift_to) - strtotime($request->shift_from)) / 60 > 120) {
            return false;
        }

        return true;
    }

}
