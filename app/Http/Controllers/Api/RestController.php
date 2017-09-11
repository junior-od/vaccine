<?php

namespace App\Http\Controllers\Api;

use App\Services\DbService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestController extends Controller
{
    protected $db;

    public function __construct(DbService $db)
    {
        $this->db = $db;
        $this->middleware('auth:api');
    }

    public function total_registrations_today()
    {
        $count = count($this->db->registered_today());

        return response()->json(['status' => 'success', 'count' => $count], 200);
    }

    public function completion_status()
    {
        $count = count($this->db->getRegistered());

        return response()->json(['status' => 'success', 'registered' => $count,
                                 'pending' => 120000 - $count], 200);
    }

    public function vaccinated_children()
    {
        $count = count($this->db->vaccine_given());

        return response()->json(['status' => 'success', 'count' => $count], 200);
    }

    public function registered_male()
    {
        $count = count($this->db->male());

        return response()->json(['status' => 'success', 'registered' => $count,
                                 'pending' => 60000 - $count], 200);
    }

    public function registered_female()
    {
        $count = count($this->db->female());

        return response()->json(['status' => 'success', 'registered' => $count,
                                 'pending' => 60000 - $count], 200);
    }
}
