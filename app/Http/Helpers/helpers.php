<?php

use App\User;
use Auth as Auth;
use App\WorkingHour;

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

if (!function_exists('user_working_hours')) {

		function user_working_hours($id)
		{
				$wr = WorkingHour::where('user_id', $id)
							->get();

				return $wr[0]->from . ' - ' . $wr[0]->to;
		}
}

if (!function_exists('func_check_if_over_budget')) {

		function func_check_if_over_budget($user_id, $amount)
		{
				$total = WorkingHour::where('user_id', $user_id)
								 ->sum('wage_per_hour');

				$sum = ($total * 2) + ($amount * 2) * 50 * 60;

				if ($sum > 50000) {
						return true;
				}

				return false;
		}
}

if (!function_exists('func_user_wage')) {

		function func_user_wage($user_id)
		{
				$w = WorkingHour::where('user_id', $user_id)
						 ->get();

				return $w[0]->wage_per_hour;
		}
}

if (!function_exists('func_is_my_work_time')) {

		function func_is_my_work_time()
		{
				if (Auth::user()->role_id == 2) {
						$w = WorkingHour::where('user_id', Auth::id())
								 ->get();

						if (date('H:i:s') >= $w[0]->from && date('H:i:s') <= $w[0]->to) {
								return true;
						}

						return false;
				}

				return true;
		}
}
