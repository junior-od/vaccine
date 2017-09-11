<?php

namespace App\Services;

use DB;
use Auth;
use App\User;
use Carbon\Carbon;

class ApiService {

    public function __construct()
    {
        $this->app_url = route('guest');
    }

    public function register_status()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://vaccine-algorism.herokuapp.com/api/v1/registrations/status");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_token=y9ntVwhwC1wBulTzHMSIFwnLeiIFoybWAmhnivfqxP2BlNeLe7aLB59rJuOX");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/x-www-form-urlencoded",
          "Accept: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

    public function registered_male()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://vaccine-algorism.herokuapp.com/api/v1/registrations/male");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_token=y9ntVwhwC1wBulTzHMSIFwnLeiIFoybWAmhnivfqxP2BlNeLe7aLB59rJuOX");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/x-www-form-urlencoded",
          "Accept: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

    public function registered_female()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://vaccine-algorism.herokuapp.com/api/v1/registrations/female");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_token=y9ntVwhwC1wBulTzHMSIFwnLeiIFoybWAmhnivfqxP2BlNeLe7aLB59rJuOX");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/x-www-form-urlencoded",
          "Accept: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

    public function total_registrations_today()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://vaccine-algorism.herokuapp.com/api/v1/registrations/today");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_token=y9ntVwhwC1wBulTzHMSIFwnLeiIFoybWAmhnivfqxP2BlNeLe7aLB59rJuOX");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/x-www-form-urlencoded",
          "Accept: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

    public function vaccinated_children()
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://vaccine-algorism.herokuapp.com/api/v1/registrations/vaccine_given");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_token=y9ntVwhwC1wBulTzHMSIFwnLeiIFoybWAmhnivfqxP2BlNeLe7aLB59rJuOX");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/x-www-form-urlencoded",
          "Accept: application/json"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }


}
