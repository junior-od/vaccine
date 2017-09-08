<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        if (get_user_role() == 'Admin') {
            return Redirect::route('admin.dash');
        }

        return Redirect::route('super.dash');
    }
}
