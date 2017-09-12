<?php

namespace App\Http\Middleware;

use Alert;
use Closure;
use Auth as Auth;
use Illuminate\Session\Store;

class WorkingTimeMiddleware
{

    protected $ssession;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (func_is_my_work_time() == false) {

            Auth::logout();

            Alert::info('It\'s not your working hour')->persistent('OKAY');

            return redirect()->route('login');
        }

        return $next($request);
    }
}
