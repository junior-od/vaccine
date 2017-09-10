<?php

use App\User;
use Auth as Auth;

if (!function_exists('get_user_role')) {

	function get_user_role()
	{
      if (! Auth::guest()) {

         return Auth::user()->role->name;

      }
  }

}

if (!function_exists('checkPermission')) {

	function checkPermission($perm)
	{
      if (!Auth::guest()) {

          if (Auth::user()->role->name == $perm) {
              return true;
          }

      }

      return false;
	}

}

if (!function_exists('func_username')) {

	function func_username($id)
	{
      try {

          $user = User::find($id);

      } catch(\Exception $e) {

          return 'User does not exist';
      }

      return $user->first_name . ' ' . $user->last_name;
	}

}

if (!function_exists('func_perc_vac')) {

		function func_perc_vac($value)
		{
				$perc = $value * 100 / 83567;

				return $perc;
		}

}

if (!function_exists('func_perc_gender')) {

		function func_perc_gender($value)
		{
				$perc = $value * 100 / 60000;

				return $perc;
		}

}

if (!function_exists('day_register_target')) {

		function day_register_target()
		{
				return 100;
		}
}
