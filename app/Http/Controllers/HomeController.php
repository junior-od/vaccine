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
            return Redirect::route('admin.home');
        }

        return Redirect::route('super.home');
    }
}
