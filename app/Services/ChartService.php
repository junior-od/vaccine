<?php

namespace App\Services;

use DB;
use Auth;
use App\User;
use Carbon\Carbon;
use App\VaccinatedChild;
use App\Services\DbService;

class ChartService {

    protected $db;

    public function __construct(DbService $db)
    {
        $this->db = $db;
    }

    public function performanceByGender()
    {
        $male_count = count($this->db->male());
        $female_count = count($this->db->female());

        $chart = app()->chartjs
                 ->name('performanceByGender')
                 ->type('pie')
                 ->size(['width' => 400, 'height' => 200])
                 ->labels(['male', 'female'])
                 ->datasets([
                     [
                         "label" => "Gender",
                         'backgroundColor' => ['#dd4b39 ', '#3c8dbc'],
                         'data' => [$male_count, $female_count]
                     ]
                 ])
                 ->options([
                   'showScale' => true,
                      'scaleShowGridLines' => false,
                      'scaleGridLineColor' => 'rgba(0,0,0,.05)',
                      'scaleGridLineWidth' => 1,
                      'scaleShowHorizontalLines' => true,
                      'scaleShowVerticalLines' => true,
                      'scaleStartValue' => 10,
                 ]);

        return $chart;
    }

    public function performanceByDailyTarget()
    {
        $target = day_register_target();
        $reg_today = count($this->db->registered_today());

        $chart = app()->chartjs
                 ->name('performanceByDailyTarget')
                 ->type('doughnut')
                 ->size(['width' => 400, 'height' => 200])
                 ->labels(['Today\'s Target', 'Actual Registration'])
                 ->datasets([
                     [
                         "label" => "Target",
                         'backgroundColor' => ['#f39c12 ', '#26a69a'],
                         'data' => [$target, $reg_today]
                     ]
                 ])
                 ->options([
                   'showScale' => true,
                      'scaleShowGridLines' => false,
                      'scaleGridLineColor' => 'rgba(0,0,0,.05)',
                      'scaleGridLineWidth' => 1,
                      'scaleShowHorizontalLines' => true,
                      'scaleShowVerticalLines' => true,
                      'scaleStartValue' => 10,
                 ]);

        return $chart;
    }

    public function performanceByTotalReg()
    {
        $reg = count($this->db->getRegistered());

        $chart = app()->chartjs
                 ->name('performanceByTotalReg')
                 ->type('doughnut')
                 ->size(['width' => 400, 'height' => 200])
                 ->labels(['Population', 'Total Registration'])
                 ->datasets([
                     [
                         "label" => "Total",
                         'backgroundColor' => ['#3BAF89', '#E56A9D'],
                         'data' => [120000, $reg]
                     ]
                 ])
                 ->options([
                   'showScale' => true,
                      'scaleShowGridLines' => false,
                      'scaleGridLineColor' => 'rgba(0,0,0,.05)',
                      'scaleGridLineWidth' => 1,
                      'scaleShowHorizontalLines' => true,
                      'scaleShowVerticalLines' => true,
                      'scaleStartValue' => 10,
                 ]);

        return $chart;
    }

    public function performanceForLastThreeDays()
    {
        $registered_today = count($this->db->registered_today());
        $registered_yesterday = count($this->db->registered_yesterday());
        $registered_two_days_ago = count($this->db->registered_two_days_ago());

        $chart = app()->chartjs
                 ->name('performanceForLastThreeDays')
                 ->type('bar')
                 ->size(['width' => 400, 'height' => 200])
                 ->labels(['Two Days Ago', 'Yesterday',
                           'Today'])
                 ->datasets([
                       [
                           "label" => '',
                           'backgroundColor' => ['#3c8dbc', '#3c8dbc'],
                           'data' => [0, 0, 0]
                       ],
                       [
                           "label" => '',
                           'backgroundColor' => ['#3c8dbc', '#3c8dbc'],
                           'data' => [$registered_two_days_ago, $registered_yesterday, $registered_today ]
                       ],
                       [
                           "label" => '',
                           'backgroundColor' => ['#3c8dbc', '#3c8dbc'],
                           'data' => [0, 0, 0 ]
                       ],
                 ])
                 ->options([]);

          return $chart;
    }
}
